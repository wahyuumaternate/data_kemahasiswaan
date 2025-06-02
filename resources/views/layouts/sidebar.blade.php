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
                <i class="bi bi-people-fill"></i> <!-- Icon untuk pengurus/people -->
                <span>Pengurus</span>
            </a>
        </li><!-- End Pengurus Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('program-kerja.index') ? '' : 'collapsed' }}"
                href="{{ route('program-kerja.index') }}">
                <i class="bi bi-list-check"></i> <!-- Icon checklist, cocok untuk program kerja -->
                <span>Program Kerja</span>
            </a>
        </li><!-- End Program Kerja Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('mahasiswa.index') ? '' : 'collapsed' }}"
                href="{{ route('mahasiswa.index') }}">
                <i class="bi bi-person-badge-fill"></i> <!-- Icon mahasiswa/identitas -->
                <span>Data Mahasiswa</span>
            </a>
        </li><!-- End Data Mahasiswa Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dokumentasi.index') ? '' : 'collapsed' }}"
                href="{{ route('dokumentasi.index') }}">
                <i class="bi bi-folder2-open"></i> <!-- Icon folder terbuka untuk dokumentasi -->
                <span>Dokumentasi</span>
            </a>
        </li><!-- End Dokumentasi Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('bem.index') ? '' : 'collapsed' }}"
                href="{{ route('bem.index') }}">
                <i class="bi bi-journal-text"></i> <!-- Icon buku catatan/pendaftaran -->
                <span>Pendaftaran BEM</span>
            </a>
        </li><!-- End Pendaftaran BEM Nav -->



    </ul>

</aside><!-- End Sidebar-->
