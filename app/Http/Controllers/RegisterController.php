<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all($columns = ['rayon']);

        return view('register.index', compact(['rombels', $rombels], ['rayons', $rayons]));
    }

    public function create()
    {
        // $rombels = Rombel::all();
        // $rayons = Rayon::all($columns = ['rayon']);
        // return view('students.create',compact(['rombels', $rombels], ['rayons', $rayons]));
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'username' => 'required|unique:users|min:3|max:255',
        //     'password' => 'required|min:5|max:255',
        // ]);

        // // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['password'] = Hash::make($validatedData['password']);

        // User::create($validatedData);

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

        return redirect()->intended('/login')->with('success', 'Registrasi berhasil! Silahkan login.');
    }
}
