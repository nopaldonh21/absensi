@extends('layout.main')

@section('container')

<!-- ======= Hero Section ======= -->
{{-- <div id="" class="container-fluid justify-content-center align-items-center" style="background-image: url('img/cover-wk.png'); background-attachment: fixed; height: 90vh;">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1 style="color: white">Selamat datang di <span>Absensi Online</span></h1>
      <h2></h2>
      <a href="/register" class="btn btn-success">Register</a>
      <span style="color: white">Or</span>
      <a href="/login" class="btn btn-primary">Login</a>
    </div>
</div><!-- End Hero --> --}}

<div class="container py-4">

    <div class="p-5 mb-4 bg-light rounded-3" 
    {{-- style="background-image: url('img/cover.png'); background-attachment: fixed;" --}}
    >
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold pb-2">Absensi</h1>
        <p class="col-md-8 fs-4">Daftar untuk menggunakan, login jika sudah memiliki akun.</p>
        <a href="/register" class="btn btn-success btn-lg pr-4" type="button">Register</a>
        <a href="/login" class="btn btn-primary btn-lg" type="button">Login</a>
      </div>
    </div>

    {{-- <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021
    </footer> --}}
  </div>
  
@endsection