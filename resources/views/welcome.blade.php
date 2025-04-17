@extends('master.master_home')
@section('main_home_content')
    <div class="p-5 mb-4 rounded-3">
        <div class="container-fluid px-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 jumbotron">
                    <p>Selamat Datang di Website</p>
                    <h1 class="display-1 fw-bold"  data-aos="fade-up" data-aos-duration="0900">FUAD</h1>
                    <p class="fw-bold">UIN DATOKARAMA PALU</p>
                </div>
                <div class="col-lg-6 gambar">
                    <img src="assets/custom/image/home/jumbotron.png" >
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="breadcrumb">
                <ol class="breadcrumb d-flex flex-column">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li> <br>
                    <li class="breadcrumb-item active tujuan" aria-current="page">Berita</li>
                </ol>
            </div>
            <div class="col-lg-7">
                <div class="card berita" data-aos="fade-up" data-aos-duration="900">
                    <a href="#">
                        <img src="assets/custom/image/home/berita.jpg" class="w-100 h-100 rounded">
                        {{-- <div class="text-img">Dinamika Kongres FUAD, Antara Fakta atau Desas-Desus</div> --}}
                    </a>
                 </div>
            </div>
        
            <div class="col-lg-5 m-auto">
                <h3 class="fs-5 fw-bolder mt-5 ms-1" data-aos="fade-up" data-aos-duration="900">Berita Terbaru</h3>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action" data-aos="fade-left" data-aos-duration="0900">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Dinamika Kongres FUAD, Antara Fakta atau Desas-Desus</h5>
                        </div>
                        <small>18 januari 2024</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-aos="fade-left" data-aos-duration="0900">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">OKM FUAD Gelar PMJ Bagi 2 Jurusan Baru Sebagai Bentuk Penerimaan dan Solidaritas </h5>
                        </div>
                        <small>18 januari 2024</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-aos="fade-left" data-aos-duration="0900">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">ORMAWA FUAD Laksanakan PMJ Angkatan Pertama Jurusan Akuntansi Syariah</h5>
                        </div>
                        <small>18 januari 2024</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-aos="fade-left" data-aos-duration="0900">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Seminar Technopreneur FUAD, Tingkatkan Semangat Mahasiswa Jadi Pengusaha Muda</h5>
                        </div>
                        <small>18 januari 2024</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center agenda">
            <div class="breadcrumb">
                <ol class="breadcrumb d-flex flex-column">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li> <br>
                    <li class="breadcrumb-item active tujuan" aria-current="page">Agenda</li>
                </ol>
            </div>
            <div class="col-lg-12">
                <div class="alert alert-warning" role="alert">
                    Agenda saat ini tidak tersedia!
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main.header')
    <nav class="navbar navbar-expand-lg navbar-light navbarr">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="{{ route('home')}}">
                <img src="assets/custom/image/home/Logo.png" alt="LOGO">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Fakultas Ushuluddin dan Adab
                    </a>
                    <ul class="dropdown-menu slide-down" aria-labelledby="navbarDropdown1">
                      <li><a class="dropdown-item" href="{{ route('visimisiku') }}">Visi & Misi FUAD</a></li>
                      <li><a class="dropdown-item" href="{{ route('renstrafuad')}}">Renstra FUAD</a></li>
                      <li><a class="dropdown-item" href="{{ route('renopfuad')}}">Renop FUAD</a></li>
                      <li><a class="dropdown-item" href="{{ route('struktur')}}">Struktur Organisasi</a></li>
                      <li><a class="dropdown-item" href="{{ route('sarpras')}}">Sarana dan Prasarana</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Program Studi
                    </a>
                    <ul class="dropdown-menu slide-show" aria-labelledby="navbarDropdown" >
                      <li><a class="dropdown-item" href="">Program Studi Ilmu Alquran dan Tafsir</a>
                          <ul class="dropdown-menu dropdown-submenu">
                            <li><a class="dropdown-item" href="{{ route('vimi_esy')}}">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('prolus_esy')}}">Profil Lulusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('kurlum_esy')}}">Kurikulum</a></li>
                            <li><a class="dropdown-item" href="{{ route('audit')}}">Audit Mutu Internal(AMI)</a></li>
                          </ul>
                      </li>
                      <li><a class="dropdown-item" href="">Program Studi Pengembangan Masyarakat Islam</a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li><a class="dropdown-item" href="{{ route('vimi_psy')}}">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('prolus_psy')}}">Profil Lulusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('kurlum_psy')}}">Kurikulum</a></li>
                          </ul>
                      </li>
                      <li><a class="dropdown-item" href="">Program Studi Bimbingan dan Konseling Islam</a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li><a class="dropdown-item" href="{{ route('vimi_asy')}}">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('prolus_asy')}}">Profil Lulusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('kurlum_asy')}}">Kurikulum</a></li>
                          </ul>
                      </li>
                      <li><a class="dropdown-item" href="">Program Studi Komunikasi dan Penyiaran Islam</a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li><a class="dropdown-item" href="{{ route('vimi_asy')}}">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('prolus_asy')}}">Profil Lulusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('kurlum_asy')}}">Kurikulum</a></li>
                          </ul>
                      </li>
                      <li><a class="dropdown-item" href="">Program Studi Ilmu Perpustakaan dan Informasi Islam</a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li><a class="dropdown-item" href="{{ route('vimi_asy')}}">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('prolus_asy')}}">Profil Lulusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('kurlum_asy')}}">Kurikulum</a></li>
                          </ul>
                      </li>
                      <li><a class="dropdown-item" href="">Program Studi Pemikiran Politik Islam</a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li><a class="dropdown-item" href="{{ route('vimi_asy')}}">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('prolus_asy')}}">Profil Lulusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('kurlum_asy')}}">Kurikulum</a></li>
                          </ul>
                      </li>
                      <li><a class="dropdown-item" href="">Program Studi Aqidah dan Filsafat Islam</a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li><a class="dropdown-item" href="{{ route('vimi_asy')}}">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('prolus_asy')}}">Profil Lulusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('kurlum_asy')}}">Kurikulum</a></li>
                          </ul>
                      </li>
                      <li><a class="dropdown-item" href="">Program Studi Sejarah Peradaban Islam</a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li><a class="dropdown-item" href="{{ route('vimi_asy')}}">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('prolus_asy')}}">Profil Lulusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('kurlum_asy')}}">Kurikulum</a></li>
                          </ul>
                      </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu slide-down" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="{{ route('profile')}}">Profile & Sejarah Fakultas</a></li>
                     <li><a class="dropdown-item" href="{{ route('about')}}">Tentang Kami</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('akreditas')}}">Akreditas</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Layanan
                    </a>
                    <ul class="dropdown-menu slide-down" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Akademik</a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li><a class="dropdown-item" href="">Pendidikan</a></li>
                            <li><a class="dropdown-item" href="">Penelitian</a></li>
                            <li><a class="dropdown-item" href="">Pengabdian kepada Masyarakat</a></li>
                        </ul>
                      </li>
                      <li><a class="dropdown-item" href="{{ route('nonakademik')}}">Non-Akademik</a></li>
                      <li><a class="dropdown-item" href="{{ route('doped')}}">Dokumen dan Pedoman</a></li>
                      <li><a class="dropdown-item" href="{{ route('cekplagi')}}">Cek Plagiasi</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blog')}}">Blog</a></li>
                <li class="nav-item login px-3">
                    @if (Route::has('login'))
                        @auth
                            <a class="btn btn-warning" href="{{ url('/panel') }}">Home</a>
                        @else
                            <a class="btn btn-warning" href="{{ route('login') }}">Login</a>
                    
                            @if (Route::has('register'))
                                <a class="btn btn-warning" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    @endif 
                </li>
            </ul>
            </div>
        </div>
    </nav>
@endsection

@section('header-helper')
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap5/css/bootstrap.min.css')}}" />

<!-- Font awesome -->
<link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/font-awesome.min.css')}}" />

<!-- Icon Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection