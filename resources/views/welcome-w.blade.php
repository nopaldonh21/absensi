@extends('layout.main-w')

@section('container')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="background-image: url('img/cover-wk.png'); background-attachment: fixed; height: 80vh;">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Selamat datang di <span>Absensi Online</span></h1>
      <h2></h2>
      <a href="/register" class="btn-get-started" style="background-color: green">Register</a>
      <span style="color: white">Or</span>
      <a href="/login" class="btn-get-started">Login</a>
    </div>
</section><!-- End Hero -->

@endsection