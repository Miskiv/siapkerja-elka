<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">

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
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">Navigasi Utama</div>

    <!-- Akses Admin -->
    @role('Admin')
    <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Daftar Mahasiswa</span></a>
    </li>
    <li class="nav-item {{ request()->is('analisis-mahasiswa*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('analisis-mahasiswa.index') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Analisis Mahasiswa</span></a>
    </li>

    <div class="sidebar-heading">Data Master</div>

    <li class="nav-item {{ request()->is('kriteria*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kriteria.index') }}">
            <i class="fas fa-fw fa-database"></i>
            <span>Master Kriteria</span></a>
    </li>
    <li class="nav-item {{ request()->is('pertanyaan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pertanyaan.index') }}">
            <i class="fas fa-fw fa-question"></i>
            <span>Master Pertanyaan</span></a>
    </li>
    @endrole

    @role('Staff Departemen|TIM UHI')
    <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Daftar Mahasiswa</span></a>
    </li>
    <li class="nav-item {{ request()->is('analisis-mahasiswa*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('analisis-mahasiswa.index') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Analisis Mahasiswa</span></a>
    </li>
    @endrole
    @role('User')
    <li class="nav-item {{ request()->is('isi-kuesioner*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('isi-kuesioner.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Isi Kuesioner</span></a>
    </li>
    @endrole

</ul>
<!-- End of Sidebar -->
