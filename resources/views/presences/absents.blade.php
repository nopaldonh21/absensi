@extends('layout.main')
@section('container')

    <div class="row justify-content-center">
        <h2>Absensi Siswa</h2>
        
        <div class="pt-2">
            <div class="card card-info card-outline">
                <div class="card-header">Keterangan Tidak Masuk {{ $today }}</div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('input-absents') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <center>
                    <div class="form-group pb-2">                            
                        <div class="d-grid gap-2 col-5 mx-auto pb-4">
                            <div class="card border-dark">                                    
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Keterangan : </strong>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ket" id="sakit" value="Sakit">
                                            <label class="form-check-label" for="sakit">Sakit</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ket" id="ijin" value="Ijin">
                                            <label class="form-check-label" for="ijin">Ijin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ket" id="alfa" value="Alfa">
                                            <label class="form-check-label" for="alfa">Alfa</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card border-dark">                                    
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="mb-3">
                                            <label for="bukti" class="form-label">Upload foto/bukti</label>
                                            <input class="form-control" type="file" name="bukti" id="bukti">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>                                
                        </div>
                        <p>
                            <i>*klik <span style="color: blue">Submit</span> untuk menyimpan keterangan tidak masuk</i>
                        </p>
                    </div>
                    </center>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection