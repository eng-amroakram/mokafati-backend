<nav id="sidenav-1" class="sidenav ps ps--active-y" data-mdb-color="light" style="background-color: #2d2c2c"
    role="navigation" data-mdb-mode="side" data-mdb-right="false" data-mdb-hidden="true" data-mdb-accordion="true">

    <a class="ripple d-flex justify-content-center py-5" style="padding-top: 5rem !important;"
        href="{{ route('admin.panel.index') }}" data-ripple-color="primary">
        <img id="SafteyKSAMC-Logo" width="200" src="{{ asset('panel/images/logo/logo-white.svg') }}"
            alt="SafteyKSAMC-Logo" draggable="false" />
    </a>

    <ul class="sidenav-menu">
        <li class="sidenav-item">
            <a class="sidenav-link fs-6 fw-bold" href="{{ route('admin.panel.index') }}">
                <i class="fas fa-chart-area pr-4 me-2"></i><span>الصفحة الرئيسية</span></a>
        </li>

        <li class="sidenav-item">
            <a class="sidenav-link fs-6 fw-bold" href="{{ route('admin.panel.users') }}">
                <i class="fas fa-users-gear pr-4 me-2"></i><span>المشتركين</span></a>
        </li>

        <li class="sidenav-item">
            <a class="sidenav-link fs-6 fw-bold" href="{{ route('admin.panel.packages') }}">
                <i class="fas fa-box pr-4 me-2"></i><span>الباقات</span></a>
        </li>

        <li class="sidenav-item">
            <a class="sidenav-link fs-6 fw-bold" href="{{ route('admin.panel.stores') }}">
                <i class="fas fa-store pr-4 me-2"></i><span>المتاجر</span></a>
        </li>

        <li class="sidenav-item">
            <a class="sidenav-link fs-6 fw-bold" href="#admin.panel.invoices">
                <i class="fas fa-file-invoice pr-4 me-2"></i><span>الفواتير</span></a>
        </li>
    </ul>
</nav>
