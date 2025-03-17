<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark "style="background: #B2659D;">
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
            {{-- <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="{{ asset('panel/images/logo/logo-white.svg') }}" height="28" alt="Munagasatcom Brand"
                    loading="lazy" />
            </a> --}}
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
            {{-- <a class="text-reset me-3" href="#">
                <i class="fas fa-shopping-cart text-white"></i>
            </a> --}}

            <!-- Notifications -->
            <div class="dropdown">
                <a data-mdb-dropdown-init data-mdb-ripple-init class="text-reset me-3 dropdown-toggle" href="#"
                    data-mdb-toggle="dropdown" id="NotificationDropDown" role="button" data-mdb-auto-close="outside"
                    aria-expanded="false">
                    <i class="fas fa-bell text-white"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">3</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="NotificationDropDown"
                    style="width: 370px; max-height: 400px; overflow-y: auto;">

                    <!-- Notification Item -->
                    <li class="mb-2 pb-2 border-bottom">
                        <div class="row g-1 align-items-center">
                            <div class="col-3 d-flex justify-content-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="background-color: #F5E6F0; width: 50px; height: 50px;">
                                    <i class="fas fa-bell" style="color: #B2659D; font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="card-body py-1 px-2 d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">عنوان الإشعار</h6>
                                        <small class="text-muted d-block mb-1">تفاصيل قصيرة عن الإشعار.</small>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i> قبل 5 دقائق</small>
                                    </div>
                                    <button class="btn btn-sm ms-2 p-1 rounded-circle border-0"
                                        style="background-color: transparent;" title="مقروء">
                                        <i class="fas fa-check-circle" style="color: #B2659D; font-size: 18px;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Another Notification -->
                    <li class="mb-2 pb-2 border-bottom">
                        <div class="row g-1 align-items-center">
                            <div class="col-3 d-flex justify-content-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="background-color: #F5E6F0; width: 50px; height: 50px;">
                                    <i class="fas fa-envelope" style="color: #B2659D; font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="card-body py-1 px-2 d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">رسالة جديدة</h6>
                                        <small class="text-muted d-block mb-1">تفاصيل أخرى عن الإشعار.</small>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i> قبل ساعة</small>
                                    </div>
                                    <button class="btn btn-sm ms-2 p-1 rounded-circle border-0"
                                        style="background-color: transparent;" title="مقروء">
                                        <i class="fas fa-check-circle" style="color: #B2659D; font-size: 18px;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- More Notifications -->
                    <li class="mb-2 pb-2 border-bottom">
                        <div class="row g-1 align-items-center">
                            <div class="col-3 d-flex justify-content-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="background-color: #F5E6F0; width: 50px; height: 50px;">
                                    <i class="fas fa-exclamation-circle" style="color: #B2659D; font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="card-body py-1 px-2 d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">تنبيه جديد</h6>
                                        <small class="text-muted d-block mb-1">تفاصيل أخرى عن الإشعار.</small>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i> أمس</small>
                                    </div>
                                    <button class="btn btn-sm ms-2 p-1 rounded-circle border-0"
                                        style="background-color: transparent;" title="مقروء">
                                        <i class="fas fa-check-circle" style="color: #B2659D; font-size: 18px;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>





            <!-- Avatar -->
            <div class="dropdown">
                <a data-mdb-dropdown-init data-mdb-toggle="dropdown" class="dropdown-toggle d-flex align-items-center"
                    href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                    <i class="fas fa-circle-user fs-4 text-white"></i>
                    <strong class="d-none d-sm-block ms-1 text-white">{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item " href="{{ route('admin.panel.logout') }}">تسجيل الخروج</a>
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


