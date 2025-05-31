<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('pendaftars') ? '' : 'collapsed' }}"
                href="{{ route('pengurus.index') }}">
                <i class="bi bi-file-earmark-arrow-down"></i>
                <span>Pengurus</span>
            </a>
        </li><!-- End Blank Page Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('kategoris') ? '' : 'collapsed' }}"
                href="{{ route('program-kerja.index') }}">
                <i class="bi bi-file-earmark-arrow-down"></i>
                <span>Program Kerja</span>
            </a>
        </li><!-- End Blank Page Nav -->
        {{-- <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/judul-masuk') ? '' : 'collapsed' }}"
                    href="{{ route('judulMasuk') }}">
                    <i class="bi bi-file-earmark-arrow-down"></i>
                    <span>Judul Masuk</span>
                </a>
            </li><!-- End Blank Page Nav -->


            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/judul-diterima') ? '' : 'collapsed' }}"
                    href="{{ route('judulDiterima') }}">
                    <i class="bi bi-file-earmark-check"></i>
                    <span>Judul Diterima</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/judul-ditolak') ? '' : 'collapsed' }}"
                    href="{{ route('judulDitolak') }}">
                    <i class="bi bi-file-earmark-excel"></i>
                    <span>Judul Ditolak</span>
                </a>
            </li><!-- End Error 404 Page Nav -->


            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/dosen') ? '' : 'collapsed' }}"
                    href="{{ route('dosen') }}">
                    <i class="bi bi-people"></i>
                    <span>Dosen</span>
                </a>
            </li><!-- End Profile Page Nav --> --}}
        {{-- <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="users-profile.html">
                    <i class="bi bi-gear"></i>
                    <span>Pengaturan</span>
                </a>
            </li><!-- End Profile Page Nav --> --}}

    </ul>

</aside><!-- End Sidebar-->
