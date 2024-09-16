<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon" >
            <img src="{{ asset('assets/bootstrap/img/decision-making.png') }}" alt="SPK | AHP" height="50px">
        </div>
        <div class="sidebar-brand-text mx-3">SPK <sup>AHP</sup></div>
    </a>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">Navigasi Utama</div>
    <!-- Akses Admin -->
    @role('Admin')
    <li class="nav-item @if(isset($title) && $title === 'Daftar Mahasiswa') active @endif">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Daftar Mahasiswa</span></a>
    </li>
    {{-- <li class="nav-item @if(isset($title) && $title === 'Jawaban') active @endif">
        <a class="nav-link" href="{{ route('jawaban.index') }}">
            <i class="fas fa-fw fa-comment"></i>
            <span>Jawaban</span></a>
    </li> --}}
    <li class="nav-item @if(isset($title) && $title === 'Analisis Mahasiswa') active @endif">
        <a class="nav-link" href="{{ route('analisis-mahasiswa.index') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Analisis Mahasiswa</span></a>
    </li>

    <div class="sidebar-heading">Data Master</div>

    <li class="nav-item @if(isset($title) && $title === 'Master Kriteria') active @endif">
        <a class="nav-link" href="{{ route('kriteria.index') }}">
            <i class="fas fa-fw fa-database"></i>
            <span>Master Kriteria</span></a>
    </li>
    <li class="nav-item @if(isset($title) && $title === 'Pertanyaan') active @endif">
        <a class="nav-link" href="{{ route('pertanyaan.index') }}">
            <i class="fas fa-fw fa-question"></i>
            <span>Master Pertanyaan</span></a>
    </li>
    @endrole

    @role('Staff Departemen|TIM UHI')
    <li class="nav-item @if(isset($title) && $title === 'Daftar Mahasiswa') active @endif">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Daftar Mahasiswa</span></a>
    </li>
    {{-- <li class="nav-item @if(isset($title) && $title === 'Jawaban') active @endif">
        <a class="nav-link" href="{{ route('jawaban.index') }}">
            <i class="fas fa-fw fa-comment"></i>
            <span>Jawaban</span></a>
    </li> --}}
    <li class="nav-item @if(isset($title) && $title === 'Analisis Mahasiswa') active @endif">
        <a class="nav-link" href="{{ route('analisis-mahasiswa.index') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Analisis Mahasiswa</span></a>
    </li>
    @endrole
    @role('User')
    <li class="nav-item @if(isset($title) && $title === 'Kuesioner') active @endif">
        <a class="nav-link" href="{{ route('isi-kuesioner.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Isi Kuesioner</span></a>
    </li>
    {{-- <li class="nav-item @if(isset($title) && $title === 'Hasil Analisis') active @endif">
        <a class="nav-link" href="{{ route('hasil-analisis.index') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Hasil Analisis</span></a>
    </li> --}}
    @endrole

</ul>
<!-- End of Sidebar -->