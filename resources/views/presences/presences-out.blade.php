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
                    
                    <form action="{{ route('input-presences-out') }}" method="POST">
                    @csrf

                    <center>
                    <div class="form-group pb-4">
                        <label for="" id="clock" style="font-size: 100px;
                                    color: #1f3984;
                                    font-weight: 400;
                                    text-shadow: 4px 4px 10px rgb(31, 57, 132, 0.4),
                                    4px 4px 20px rgb(31, 37, 122, 0.4),
                                    4px 4px 30px rgb(31, 17, 112, 0.4),
                                    4px 4px 40px rgb(31, 7, 102, 0.4);">
                        </label>
                    </div>
                    <div class="form-group pb-2">                            
                        <div class="d-grid gap-2 col-5 mx-auto pb-4">
                            <div class="card border-success">                                    
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><h6>Jam Kedatangan : {{ $jam_dtng }}</h6></li>
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-primary">Pulang</button>
                        </div>
                        <p>
                            <i>*klik <span style="color: blue">Pulang</span> untuk mengisi absensi kepulangan</i>
                        </p>
                    </div>
                    </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection