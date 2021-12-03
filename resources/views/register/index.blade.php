@extends('layout.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session ('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container">
                <main class="form-register">
                    <form action="/register" method="POST">
                        @csrf

                        <h1 class="h3 mb-3 fw-normal">Register</h1>
                        <div class="form-floating">
                            <input type="text" name="nis" class="form-control mt-2
                                    @error('nis') is-invalid @enderror
                                    " id="nis" placeholder="NIS" required value="{{ old('nis') }}">
                            <label for="nis">NIS</label>
                            @error('nis')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" name="nama" class="form-control mt-2
                                    @error('nama') is-invalid @enderror
                                    " id="nama" placeholder="Nama" required value="{{ old('nama') }}">
                            <label for="nama">Nama</label>
                            @error('nama')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            {{-- <strong>Rombel:</strong> --}}
                            <select class="form-control mt-2  
                                @error('rombel') is-invalid @enderror
                                " name="rombel">
                                <option disabled selected>Pilih Rombel</option>
                                @foreach($rombels as $rombel)
                                <option value="{{$rombel->rombel}}">{{$rombel->rombel}}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="rombel" class="form-control mt-2
                                    @error('rombel') is-invalid @enderror
                                    " id="rombel" placeholder="Rombel" required value="{{ old('rombel') }}">
                            <label for="rombel">Rombel</label> --}}
                            @error('rombel')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            {{-- <strong>Rayon:</strong> --}}
                            <select class="form-control mt-2 
                                @error('rayon') is-invalid @enderror
                                " name="rayon">
                                <option disabled selected>Pilih Rayon</option>
                                @foreach($rayons as $rayon)
                                <option value="{{$rayon->rayon}}">{{$rayon->rayon}}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="rayon" class="form-control mt-2
                                    @error('rayon') is-invalid @enderror
                                    " id="rayon" placeholder="Rayon" required value="{{ old('rayon') }}">
                            <label for="rayon">Rayon</label> --}}
                            @error('rayon')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" name="username" class="form-control mt-2
                                    @error('username') is-invalid @enderror
                                    " id="username" placeholder="Username" required value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control mt-2
                                    @error('password') is-invalid @enderror
                                    " id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>                                
                            @enderror
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Submit</button>
                    </form>
                    <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login">Login</a></small>
                </main>
            </div>
        </div>
    </div>
@endsection