@extends('layout.main')
@section('container')

    <div class="row justify-content-center">
        <h2>Absensi Siswa</h2>
        <div class="pt-2">
            <div class="card card-info card-outline">
                <div class="card-header">Absensi {{ $today }}</div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <center>
                        
                        <div class="form-group">
                            <div class="d-grid gap-2 col-5 mx-auto pb-2">
                                <p>Absen Tidak Masuk Berhasil</p>
                                <div class="card border-success">                                    
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><h6>Keterangan : {{ $ket }}</h6></li>
                                        <li class="list-group-item"><h6>Foto/bukti : {{ $bukti }}</h6></li>
                                        <li class="list-group-item"><img src="{{ url('img/bukti_ket/'.$bukti) }} " height="200px" alt="foto/bukti"></li>
                                    </ul>
                                </div>
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </div>
                        </div>
                    </center>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

@endsection