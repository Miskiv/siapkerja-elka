<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <br>
        <a href="{{ url('/') }}" class="logo logo-dark">
               <span class="logo-sm">
                <h1 style="color: white">SPK | AHP</h1>
               {{-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="30"> --}}
               </span>
            <span class="logo-lg">
                <h1 style="color: white">SPK | AHP</h1>
               {{-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="50"> --}}
               </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ url('/') }}" class="logo logo-light">
               <span class="logo-sm">
                <h1 style="color: white">SPK | AHP</h1>
               {{-- <img src="{{ asset('assets/images/logo-sm-white.png') }}" alt="" height="30"> --}}
               </span>
            <span class="logo-lg">
                <h1 style="color: white">SPK | AHP</h1>
               {{-- <img src="{{ asset('assets/images/logo-white.png') }}" alt="" height="50"> --}}
               </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <!-- end Dashboard Menu -->
                @role('Admin')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/') }}" role="button"
                       aria-expanded="true" aria-controls="Dashboard">
                        <i class="ri-dashboard-line"></i> <span data-key="t-layouts">Jurusan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('dokumen') }}" role="button"
                       aria-expanded="true" aria-controls="Dashboard">
                        <i class="ri-file-list-line"></i> <span data-key="t-layouts">Daftar Mahasiswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @if(isset($title) && $title === 'Pertanyaan') active @endif" href="{{ route('pertanyaan.index') }}" role="button"
                       aria-expanded="true" aria-controls="Menu1">
                        <i class=" ri-history-line"></i> <span data-key="t-layouts">Pertanyaan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('users') }}" aria-expanded="false">
                        <i class="ri-shield-user-line"></i> <span data-key="t-dashboards">Jawaban</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('users') }}" aria-expanded="false">
                        <i class="ri-shield-user-line"></i> <span data-key="t-dashboards">Analisis Mahasiswa</span>
                    </a>
                </li>
                @endrole
                @role('user')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('isi-kuesioner') }}" aria-expanded="false">
                        <i class="ri-shield-user-line"></i> <span data-key="t-dashboards">Isi Kuesioner</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('hasil-analisis') }}" aria-expanded="false">
                        <i class="ri-shield-user-line"></i> <span data-key="t-dashboards">Hasil Analisis</span>
                    </a>
                </li>
                @endrole
                <li class="menu-title"><span data-key="t-menu">Tentang</span></li>
                <li class="nav-item">
                    <a href="{{ url('version') }}" class="nav-link menu-link">
                        <i class="ri-flag-line"></i> <span data-key="t-dashboards">Version</span>
                    </a>
                </li>
                <!-- end Dashboard Menu -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
