@extends('layout.main')
@section('container')

    @can('role', 'student')
    <div class="row justify-content-center">
        <h2>Dashboard Siswa</h2>
        {{-- <p>Halaman siswa</p> --}}
        <p>{{ $today }}</p>
        <a href="/presences-in">Absen</a>
        {{-- <a href="/presences-in">Absensi Kedatangan</a>
        <a href="/presences-out">Absensi Kepulangan</a>
        <a href="/absents">Tidak Hadir</a> --}}
        
        {{-- <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div> --}}

    </div>
    @endcan

@endsection