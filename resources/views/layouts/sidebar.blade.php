<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('pengurus.index') ? '' : 'collapsed' }}"
                href="{{ route('pengurus.index') }}">
                <i class="bi bi-file-earmark-arrow-down"></i>
                <span>Pengurus</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('program-kerja.index') ? '' : 'collapsed' }}"
                href="{{ route('program-kerja.index') }}">
                <i class="bi bi-file-earmark-arrow-down"></i>
                <span>Program Kerja</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('mahasiswa.index') ? '' : 'collapsed' }}"
                href="{{ route('mahasiswa.index') }}">
                <i class="bi bi-file-earmark-arrow-down"></i>
                <span>Data Mahasiswa</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dokumentasi.index') ? '' : 'collapsed' }}"
                href="{{ route('dokumentasi.index') }}">
                <i class="bi bi-file-earmark-arrow-down"></i>
                <span>Dokumentasi</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('bem.index') ? '' : 'collapsed' }}"
                href="{{ route('bem.index') }}">
                <i class="bi bi-file-earmark-arrow-down"></i>
                <span>Pendaftaran BEM</span>
            </a>
        </li><!-- End Blank Page Nav -->


    </ul>

</aside><!-- End Sidebar-->
