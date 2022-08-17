<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">MENU</li>
        <li class="nav-item">
            <a href="/beranda" class="nav-link {{Request::is('beranda') ? 'active' : ''}}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    HOME
                </p>
            </a>
        </li>
        <li class="nav-header">PENGATURAN JADWAL</li>
        <li class="nav-item">
            <a href="/lampu" class="nav-link {{Request::is('lampu*') ? 'active' : ''}}">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                    LAMPU AQUARIUM
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/pakan" class="nav-link {{Request::is('pakan*') ? 'active' : ''}}">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                    PAKAN IKAN
                </p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="/galeri" class="nav-link {{Request::is('galeri*') ? 'active' : ''}}">
                <i class="nav-icon fa fa-image"></i>
                <p>
                    GALERI
                </p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="/tentang" class="nav-link {{Request::is('tentang*') ? 'active' : ''}}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    TENTANG KAMI
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/gantipassword" class="nav-link {{Request::is('gantipassword*') ? 'active' : ''}}">
                <i class="nav-icon fa fa-key"></i>
                <p>
                    GANTI PASSWORD
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    LOGOUT
                </p>
            </a>
        </li>
    </ul>
</nav>