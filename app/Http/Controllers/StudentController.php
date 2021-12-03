<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);
        
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all($columns = ['rayon']);
        return view('students.create',compact(['rombels', $rombels], ['rayons', $rayons]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|unique:students',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'username' => 'required|unique:users|min:3|max:255',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $create = Student::create($validatedData);

        if ($create) {
            $name = $request->nama;
            $username = $request->username;
            $password = $validatedData['password'];

            User::create([
                'name' => $name,
                'username' => $username,
                'password' => $password,
            ]);
        }

        return redirect()->route('students.index')
            ->with('success', 'Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all($columns = ['rayon']);
        return view('students.edit',compact('student','rombels', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, User $user, $username)
    {
        // $validatedData = $request->validate([
        //     'nama' => 'required',
        //     'username' => 'required|min:3|max:255',
        //     'password' => 'required|min:5|max:255',
        // ]);
        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:5|max:255',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = Student::findOrFail($username);
        // $admin->update($validatedData);
        $name = $request->nama;
        $username = $request->username;
        $password = $validatedData['password'];
        $update = $user->update([
            'name' => $name,
            'username' => $username,
            'password' => $password,
        ]);

        // $update = $student->update($validatedData);
        // if ($update) {
        //     $name = $request->nama;
        //     $username = $request->username;
        //     $password = $validatedData['password'];
        //     $user->where('username', $username)->update([
        //         'name' => $name,
        //         'username' => $username,
        //         'password' => $password,
        //     ]);
        // }

        return redirect()->route('students.index')
            ->with('success', 'Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Berhasil Hapus !');
    }
}
