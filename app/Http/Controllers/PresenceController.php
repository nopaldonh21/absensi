<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Presence;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('presences.index');
    }

    public function presenceIn()
    {
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        

        $presence = Presence::where([
            ['student_id', auth()->user()->id],
            ['tgl', $tanggal],
        ])->first();

        if ($presence) {
            return redirect()->intended('presences-out');
        }
        
        return view('presences.presences-in', compact('today'));
    }
    
    public function presenceOut()
    {
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');

        $presence = Presence::where([
            ['student_id', auth()->user()->id],
            ['tgl', $tanggal],
        ])->first();

        if ($presence) {
            $jam_dtng = $presence->jam_dtng;
            $jam_plng = $presence->jam_plng;
            $ket = $presence->ket;

            if ($ket == 'Hadir') {
                if ($jam_plng == '') {
                    // return redirect('presences-out');
                    return view('presences.presences-out', compact('today', 'jam_dtng'));
                }
            } 
            
            return redirect()->intended('presences-success');
        }

        return redirect()->intended('presences-in');
    }
    
    public function presenceSuccess()
    {
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');

        $presence = Presence::where([
            ['student_id', auth()->user()->id],
            ['tgl', $tanggal],
        ])->first();

        if ($presence) {
            $jam_dtng = $presence->jam_dtng;
            $jam_plng = $presence->jam_plng;
            $ket = $presence->ket;
            $bukti = $presence->bukti;

            if ($ket == 'Hadir') {
                if ($jam_plng == '') {
                    return redirect('presences-out');
                }

                return view('presences.presences-success', compact('today', 'jam_dtng', 'jam_plng'));
            } else {
                return view('presences.presences-absents-success', compact('today', 'ket', 'bukti'));
            }
        }

        return redirect()->intended('presences-in');
    }

    public function absent()
    {
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');

        $presence = Presence::where([
            ['student_id', auth()->user()->id],
            ['tgl', $tanggal],
        ])->first();

        if ($presence) {
            $jam_dtng = $presence->jam_dtng;
            $jam_plng = $presence->jam_plng;
            $ket = $presence->ket;
            $bukti = $presence->bukti;

            if ($ket == 'Hadir') {
                if ($jam_plng == '') {
                    return redirect('presences-out');
                }

                return redirect('presences-in');
            } else {
                return redirect('presences-success');
            }
        }

        return view('presences.absents', compact('today'));
    }

    public function history()
    {
        $historis = Presence::latest()->paginate(5);
        return view('presences.historis', compact('historis'))
            ->with('i', (request()->input('page', 1) -1) *5);;
    }

    // public function userHistory()
    // {
    //     $historis = Presence::latest()->paginate(5);
    //     return view('presences.historis', compact('historis'))
    //         ->with('i', (request()->input('page', 1) -1) *5);;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        
        $students = Student::where('username', auth()->user()->username)->first();
        $nis = $students->nis;
        $ket = 'Hadir';

        $presence = Presence::where([
            ['student_id', auth()->user()->id],
            ['tgl', $tanggal],
        ])->first();

        if ($presence) {
            // dd('sudah ada');

            return back()->with('success', 'Jam kedatangan sudah tercatat.');

        }else{
            Presence::create([
                'student_id' => auth()->user()->id,
                'nis' => $nis,
                'tgl' => $tanggal,
                'jam_dtng' => $localtime,
                'ket' => $ket,
            ]);            
        }

        return redirect()->intended('presences-out');
    }

    public function storeOut(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $ket = 'Hadir';

        $presence = Presence::where([
            ['student_id', auth()->user()->id],
            ['tgl', $tanggal],
        ])->first();

        

        $dt=[
            'jam_plng' => $localtime,
            'ket' => $ket,
        ];

        if ($presence->jam_plng == "") {
            $presence->update($dt);
            return redirect()->intended('presences-out');
        }else{
            // dd('sudah ada');

            return back()->with('success', 'Data Kepulangan sudah tercatat.');

        }
    }

    public function storeAbsent(Request $request)
    {
        $request->validate([
            'ket' => 'required',
            'bukti' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H-i-s');

        $student_id = auth()->user()->id;
        $current = Carbon::now()->isoFormat('Y-MM-D');

        // menyimpan data file yang diupload ke variabel $file
        $bukti = $request->file('bukti');
        $ext = $bukti->getClientOriginalExtension();
        $nama_bukti = $current."-".$localtime."_".$student_id."_".$request->ket.".".$ext;
        $moveTo = 'img/bukti_ket';
        $bukti->move($moveTo, $nama_bukti);
        
        $students = Student::where('username', auth()->user()->username)->first();
        $nis = $students->nis;

        Presence::create([
            'student_id' => auth()->user()->id,
            'nis' => $nis,
            'tgl' => $tanggal,
            'ket'=> $request->ket,
            'bukti' => $nama_bukti,
        ]);

        return redirect()->intended('presences-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
