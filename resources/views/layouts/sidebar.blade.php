<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if (Auth::user()->role == 1)
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(2) == 'dashboard' ? '' : 'collapsed' }}"
                    href="{{ url('admin/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::segment(2) == 'tamu' ? '' : 'collapsed' }}" data-bs-target="#tamu-nav"
                    data-bs-toggle="collapse" href="#">
                    <i class="bi bi-database"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tamu-nav" class="nav-content {{ Request::segment(2) == 'tamu' ? '' : 'collapse' }}"
                    data-bs-parent="#tamu-nav">
                    <li>
                        <a class="{{ Request::segment(2) == 'tamu' ? 'active' : 'collapsed' }}"
                            href="{{ url('admin/tamu/list') }}">
                            <i class="bi bi-circle"></i><span>Tamu</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->


            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'bulanan' ? '' : 'collapsed' }}"
                    data-bs-target="#bulanan-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-card-checklist"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="bulanan-nav" class="nav-content {{ Request::segment(1) == 'bulanan' ? '' : 'collapse' }}"
                    data-bs-parent="#bulanan-nav">
                    <li>
                        <a class="{{ Request::segment(1) == 'bulanan' ? 'active' : 'collapsed' }}"
                            href="{{ url('bulanan') }}">
                            <i class="bi bi-circle"></i><span>Bulanan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::segment(2) == 'user' ? '' : 'collapsed' }}"
                    data-bs-target="#pengguna-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>Autentikasi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="pengguna-nav" class="nav-content {{ Request::segment(2) == 'user' ? '' : 'collapse' }}"
                    data-bs-parent="#pengguna-nav">
                    <li>
                        <a class="{{ Request::segment(2) == 'user' ? 'active' : 'collapsed' }}"
                            href="{{ url('admin/user/list') }}">
                            <i class="bi bi-circle"></i><span>Pengguna</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        @elseif (Auth::user()->role == 2)
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(2) == 'dashboard' ? '' : 'collapsed' }}"
                    href="{{ url('petugas/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::segment(2) == 'tamu' ? '' : 'collapsed' }}" data-bs-target="#tamu-nav"
                    data-bs-toggle="collapse" href="#">
                    <i class="bi bi-database"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tamu-nav" class="nav-content {{ Request::segment(2) == 'tamu' ? '' : 'collapse' }}"
                    data-bs-parent="#tamu-nav">
                    <li>
                        <a class="{{ Request::segment(2) == 'tamu' ? 'active' : 'collapsed' }}"
                            href="{{ url('petugas/tamu/list') }}">
                            <i class="bi bi-circle"></i><span>Tamu</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'bulanan' ? '' : 'collapsed' }}"
                    data-bs-target="#bulanan-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-card-checklist"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="bulanan-nav" class="nav-content {{ Request::segment(1) == 'bulanan' ? '' : 'collapse' }}"
                    data-bs-parent="#bulanan-nav">
                    <li>
                        <a class="{{ Request::segment(1) == 'bulanan' ? 'active' : 'collapsed' }}"
                            href="{{ url('bulanan') }}">
                            <i class="bi bi-circle"></i><span>Bulanan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        @endif

    </ul>

</aside>
