@extends('layout.main')
@section('container')

    <div class="row justify-content-center">
        <h2>Profil</h2>
        
        <div >
        <table class="table table-bordered">
            <tr>
                <td width="140px">NIS</td>
                <td>{{ $students->nis }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{{ $students->nama }}</td>
            </tr>
            <tr>
                <td>Rombel</td>
                <td>{{ $students->rombel }}</td>
            </tr>
            <tr>
                <td>Rayon</td>
                <td>{{ $students->rayon }}</td>
            </tr>
            <tr>
                <td>Username</td>
                <td>{{ $students->username}}</td>
            </tr>
            <tr>
                <td>Password</td>
                {{-- <td>{{ $students->password}}</td> --}}
                <td>***</td>
            </tr>

        </table>
        </div>

    </div>

@endsection