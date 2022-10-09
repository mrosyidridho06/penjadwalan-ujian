<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/home">SIMPUN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/home">SN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ request()->segment(1) == 'sempro' || request()->segment(1) == 'kolokium' || request()->segment(1) == 'skripsi' || request()->segment(1) == 'ujiansarjana' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Ujian</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->segment(1) == 'sempro' ? 'active' : '' }}"><a class="nav-link" href="/sempro">Seminar Proposal</a></li>
                    <li class="{{ request()->segment(1) == 'kolokium' ? 'active' : '' }}"><a class="nav-link" href="/kolokium">Kolokium</a></li>
                    <li class="{{ request()->segment(1) == 'skripsi' ? 'active' : '' }}"><a class="nav-link" href="/skripsi">Ujian Naskah Skripsi</a></li>
                    <li class="{{ request()->segment(1) == 'ujiansarjana' ? 'active' : '' }}"><a class="nav-link" href="/ujiansarjana">Ujian Sarjana</a></li>
                </ul>
            </li>
            @if (auth()->user()->role == 'admin')
            <li class="dropdown {{ request()->segment(1) == 'dosen' || request()->segment(1) == 'jadwal' || request()->segment(1) == 'ruangan' || request()->segment(1) == 'prodi' || request()->segment(1) == 'ujian' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Master</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(1) == 'dosen' ? 'active' : '' }}"><a class="nav-link" href="/dosen">Master Dosen</a></li>
                        <li class="{{ request()->segment(1) == 'jadwal' ? 'active' : '' }}"><a class="nav-link" href="/jadwal">Master Jadwal</a></li>
                        <li class="{{ request()->segment(1) == 'ruangan' ? 'active' : '' }}"><a class="nav-link" href="/ruangan">Master Ruangan</a></li>
                        <li class="{{ request()->segment(1) == 'prodi' ? 'active' : '' }}"><a class="nav-link"  href="/prodi">Master Prodi</a></li>
                    </ul>
                </li>
             @endif
            </ul>
    </aside>
</div>
