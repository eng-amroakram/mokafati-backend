<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark "style="background: linear-gradient(45deg, #5299FF, #B2659D);">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarRightAlignExample"
            aria-controls="navbarRightAlignExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarRightAlignExample">
            {{-- <a class="navbar-brand fs-4 fw-bold" href="{{ route('admin.panel.index') }}">
                <i class="fas fa-users-gear pr-4 me-2"></i><span>الصفحة الرئيسية</span>
            </a> --}}
            <button style="display: inline;" class="navbar-toggler" type="button" aria-expanded="true"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="{{ asset('panel/images/logo/logo-white.svg') }}" height="28" alt="Munagasatcom Brand"
                    loading="lazy" />
            </a>
            <!-- Navbar brand -->
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-6 fw-bold" href="#">الرئيسية</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="#">
                <i class="fas fa-shopping-cart"></i>
            </a>

            <!-- Notifications -->
            <div class="dropdown">
                <a data-mdb-dropdown-init data-mdb-toggle="dropdown"
                    class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </div>
            <!-- Avatar -->
            <div class="dropdown">
                <a data-mdb-dropdown-init data-mdb-toggle="dropdown"
                    class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                    id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25"
                        alt="Black and White Portrait of a Man" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item fw-bold" href="{{ route('admin.panel.logout') }}">تسجيل الخروج</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Right elements -->

    </div>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
