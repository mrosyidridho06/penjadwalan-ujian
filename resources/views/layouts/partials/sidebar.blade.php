<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">SIPEDAS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">SP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ request()->segment(1) == 'internal-judul' || request()->segment(1) == 'metode-penelitian' || request()->segment(1) == 'tinjauan-pustaka' || request()->segment(1) == 'pembimbingan-naskah' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Skripsi 1</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->segment(1) == 'internal-judul' ? 'active' : '' }}"><a class="nav-link" href="/internal-judul">Sidang Internal Judul</a></li>
                    <li class="{{ request()->segment(1) == 'metode-penelitian' ? 'active' : '' }}"><a class="nav-link" href="/metode-penelitian">Ujian Metode Peneltian</a></li>
                    <li class="{{ request()->segment(1) == 'tinjauan-pustaka' ? 'active' : '' }}"><a class="nav-link" href="/tinjauan-pustaka">Ujian Tinjauan Pustaka</a></li>
                    <li class="{{ request()->segment(1) == 'pembimbingan-naskah' ? 'active' : '' }}"><a class="nav-link" href="/pembimbingan-naskah">Sidang Pembimbingan Naskah</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->segment(1) == 'internal-prosedural' || request()->segment(1) == 'kemajuan-penelitian' || request()->segment(1) == 'kelayakan-data' || request()->segment(1) == 'sidangnaskah-skripsi' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Skripsi 2</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->segment(1) == 'internal-prosedural' ? 'active' : '' }}"><a class="nav-link" href="/internal-prosedural">Sidang Internal Prosedural</a></li>
                    <li class="{{ request()->segment(1) == 'kemajuan-penelitian' ? 'active' : '' }}"><a class="nav-link" href="/kemajuan-penelitian">Sidang Kemajuan Penelitian</a></li>
                    <li class="{{ request()->segment(1) == 'kelayakan-data' ? 'active' : '' }}"><a class="nav-link" href="/kelayakan-data">Sidang Kelayakan Data</a></li>
                    <li class="{{ request()->segment(1) == 'sidangnaskah-skripsi' ? 'active' : '' }}"><a class="nav-link" href="/sidangnaskah-skripsi">Sidang Naskah Skripsi</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->segment(1) == 'ujiannaskah-skripsi' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Skripsi 3</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->segment(1) == 'ujiannaskah-skripsi' ? 'active' : '' }}"><a class="nav-link" href="/ujiannaskah-skripsi">Ujian Naskah Skripsi</a></li>
                </ul>
            </li>
            @if (auth()->user()->role == 'admin')
            <li class="dropdown {{ request()->segment(1) == 'dosen' || request()->segment(1) == 'sesi' || request()->segment(1) == 'ruangan' || request()->segment(1) == 'prodi' || request()->segment(1) == 'ujian' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Master</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(1) == 'dosen' ? 'active' : '' }}"><a class="nav-link" href="/dosen">Master Dosen</a></li>
                        <li class="{{ request()->segment(1) == 'sesi' ? 'active' : '' }}"><a class="nav-link" href="/sesi">Master Sesi</a></li>
                        <li class="{{ request()->segment(1) == 'ruangan' ? 'active' : '' }}"><a class="nav-link" href="/ruangan">Master Ruangan</a></li>
                        <li class="{{ request()->segment(1) == 'prodi' ? 'active' : '' }}"><a class="nav-link"  href="/prodi">Master Prodi</a></li>
                    </ul>
                </li>
             @endif
            </ul>
    </aside>
</div>
