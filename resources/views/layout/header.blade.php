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