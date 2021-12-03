<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {   
        // if (! Gate::allows('role', 'admin')) {
        //     abort(403);
        // }
        
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        
        return view('dashboard',compact('today'));
    }

    // public function lp()
    // {
    //     if (Auth::guard('user')->check()->$role == "student") {

    //         return redirect()->intended('/dashboard');
    //     }

    //     $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        
    //     return view('dashboard',compact('today'));
    // }
    


    // public function show(Request $request)
    // {
    //     return redirect('/dashboard')->with('error', "Opps, You're not Admin.");
    // }

    public function profile()
    {
        $students = Student::where('username','=', auth()->user()->username)->first();

        return view('dashboard.profiles',compact('students'));
    }
} 
