{{-- @extends('layout.main')
@section('container')

    <div class="row justify-content-center">
        <h2>Dashboard Admin</h2>
        <p>Halaman admin</p>
    </div>

@endsection --}}

@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-3">
            <div class="pull-left">
                <h2>Dashboard Admin</h2>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
        
@endsection
