<section class="mt-md-4 pt-md-2 mb-5 p-5">
    <div class="row">
        <a class="col-xl-3 col-md-6 mb-5" href="{{ route('admin.panel.users') }}">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-users green-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">المشتركين</p>
                        <h4 class="font-weight-bold text-dark">{{ models_count('User') }}</h4>
                    </div>
                </div>
            </div>
        </a>

        <a class="col-xl-3 col-md-6 mb-5" href="{{ route('admin.panel.stores') }}">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-store green-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">المتاجر</p>
                        <h4 class="font-weight-bold text-dark">{{ models_count('Store') }}</h4>
                    </div>
                </div>
            </div>
        </a>

        <a class="col-xl-3 col-md-6 mb-5" href="#">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-user-tag green-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">موظفين المتاجر</p>
                        <h4 class="font-weight-bold text-dark">{{ models_count('Employee') }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="row">
        <a class="col-xl-3 col-md-6 mb-5" href="{{ route('admin.panel.packages') }}">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-cubes green-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">الباقات</p>
                        <h4 class="font-weight-bold text-dark">{{ models_count('Package') }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="row">

    </div>

</section>
