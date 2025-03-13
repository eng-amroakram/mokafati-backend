<section class="mt-md-4 pt-md-2 mb-5 p-5">
    <div class="row">
        @can('manage_users')
            <a class="col-xl-3 col-md-6 mb-5" href="{{ route('admin.panel.users') }}">
                <div class="card card-cascade cascading-admin-card">
                    <div class="admin-up">
                        <i class="fas fa-users icon-background  mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase fs-6 fw-bold">المشتركين</p>
                            <h4 class="font-weight-bold text-dark">{{ models_count('User') }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        @endcan

        @can('manage_stores')
            <a class="col-xl-3 col-md-6 mb-5" href="{{ route('admin.panel.stores') }}">
                <div class="card card-cascade cascading-admin-card">
                    <div class="admin-up">
                        <i class="fas fa-store icon-background  mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase fs-6 fw-bold">المتاجر</p>
                            <h4 class="font-weight-bold text-dark">{{ models_count('Store') }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        @endcan

        @can('manage_employees')
            <a class="col-xl-3 col-md-6 mb-5" href="{{ route('admin.panel.employees') }}">
                <div class="card card-cascade cascading-admin-card">
                    <div class="admin-up">
                        <i class="fas fa-user-tag icon-background  mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase fs-6 fw-bold">موظفين</p>
                            <h4 class="font-weight-bold text-dark">{{ models_count('Employee') }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        @endcan


    </div>

    <div class="row">
        @can('manage_packages')
            <a class="col-xl-3 col-md-6 mb-5" href="{{ route('admin.panel.packages') }}">
                <div class="card card-cascade cascading-admin-card">
                    <div class="admin-up">
                        <i class="fas fa-cubes icon-background  mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase fs-6 fw-bold">الباقات</p>
                            <h4 class="font-weight-bold text-dark">{{ models_count('Package') }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        @endcan
    </div>

    <div class="row">

    </div>

</section>
