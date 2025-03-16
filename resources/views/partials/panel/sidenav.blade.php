<nav id="sidenav-1" class="sidenav ps ps--active-y" data-mdb-color="light" style="background:  #B2659D;" role="navigation"
    data-mdb-mode="side" data-mdb-right="false" data-mdb-hidden="true" data-mdb-accordion="true">

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

        @can('manage_users')
            <li class="sidenav-item">
                <a class="sidenav-link fs-6 fw-bold" href="{{ route('admin.panel.users') }}">
                    <i class="fas fa-users-gear pr-4 me-2"></i><span>المشتركين</span></a>
            </li>
        @endcan

        @can('manage_employees')
            <li class="sidenav-item">
                <a class="sidenav-link fs-6 fw-bold" href="{{ route('admin.panel.employees') }}">
                    <i class="fas fa-user-tag pr-4 me-2"></i><span>الموظفين</span></a>
            </li>
        @endcan

        @can('manage_packages')
            <li class="sidenav-item">
                <a class="sidenav-link fs-6 fw-bold" href="{{ route('admin.panel.packages') }}">
                    <i class="fas fa-box pr-4 me-2"></i><span>الباقات</span></a>
            </li>
        @endcan

        @can('manage_stores')
            <li class="sidenav-item">
                <a class="sidenav-link fs-6 fw-bold" href="{{ route('admin.panel.stores') }}">
                    <i class="fas fa-store pr-4 me-2"></i><span>المتاجر</span></a>
            </li>
        @endcan

        @can('manage_invoices')
            <li class="sidenav-item">
                <a class="sidenav-link fs-6 fw-bold" href="#admin.panel.invoices">
                    <i class="fas fa-file-invoice pr-4 me-2"></i><span>الفواتير</span></a>
            </li>
        @endcan
    </ul>
</nav>
