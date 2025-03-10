<div class="container-fluid">
    <div class="p-4 mb-4">

        <div class="row mb-4" wire:ignore>
            @livewire('panel.page-header', ['title' => 'الباقات', 'label' => 'باقة', 'model' => false, 'user' => false, 'perm' => false])
        </div>

        <!-- Data Tables -->
        <div class="row" wire:ignore>

            <div class="row p-2 mb-3">
                <div class="col-md-3">
                    <div class="form-outline">
                        <i class="fab fa-searchengin trailing text-primary"></i>
                        <input type="search" id="search" wire:model.live="search"
                            class="form-control form-icon-trailing" aria-describedby="textExample1" />
                        <label class="form-label" for="search">البحث</label>
                    </div>
                </div>
            </div>

        </div>

        <div class="table-responsive-md text-center">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead>
                    <tr>
                        <th class="th-sm"><strong>ID</strong></th>
                        <th data-mdb-sort="true" class="th-sm"><strong>الاسم</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>سعرالباقة</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>الكاش باك</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>قمية المكافئة</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>الحد الادنى للشراء</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>البونس</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>مدة صلاحية الباقة</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($packages as $package)
                        <tr>
                            <td>{{ $package->id }}</td>
                            <td>{{ $package->name }}</td>
                            <td>{{ $package->price }}</td>
                            <td>{{ $package->cash_back }}</td>
                            <td>{{ $package->reward }}</td>
                            <td>{{ $package->minimum_purchase }}</td>
                            <td>{{ $package->bonus }}</td>
                            <td>{{ $package->validity_period }}</td>
                            <x-actions delete="delete_package" edit="edit_package" :show="true" :link="'#'"
                                :id="$package->id"></x-actions>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p>
        </div>

        <!-- Table Pagination -->
        <div class="d-flex justify-content-between mt-4">

            <nav aria-label="...">
                <ul class="pagination pagination-circle">
                    {{ $packages->withQueryString()->onEachSide(0)->links() }}
                </ul>
            </nav>

            <div class="col-md-1" wire:ignore>
                <select class="select" wire:model.live="pagination">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

        </div>
        <!-- Table Pagination -->
    </div>

    {{-- <div class="modal fade" id="user-modal" tabindex="-1" data-mdb-backdrop="static" data-mdb-keyboard="false"
        aria-labelledby="Creator" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg cascading-modal" style="margin-top: 4%">
            <div class="modal-content">
                <div class="modal-c-tabs">


                    <!-- Tabs navs -->
                    <ul class="nav md-tabs nav-tabs" id="create-new-user" role="tablist"
                        style="background-color: #303030;">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="create-new-user-tab-1" href="#create-new-user-tabs-1"
                                role="tab" aria-controls="create-new-user-tabs-1" aria-selected="true"
                                data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i>
                                <strong>
                                    بيانات الموظف
                                </strong>
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content" id="ex1-content">

                        <div class="tab-pane fade show active" id="create-new-user-tabs-1" role="tabpanel"
                            aria-labelledby="create-new-user-tab-1">

                            <div class="modal-body">

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label class="form-label" for="forName"><strong>اسم الموظف</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="far fa-user"></i>
                                            </span>
                                            <input type="text" wire:model.defer="name" maxlength="50"
                                                class="form-control" placeholder="ادخل اسم الموظف" />
                                        </div>
                                        <div class="form-helper text-danger name-validation reset-validation"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="forName"><strong>الرقم الوظيفي</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                            <input type="text" wire:model.defer="job_number" maxlength="15"
                                                class="form-control" placeholder="الرقم الوظيفي" />
                                        </div>
                                        <div class="form-helper text-danger job_number-validation reset-validation">
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label class="form-label" for="forName"><strong>المسمى
                                                الوظيفي</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="far fa-user"></i>
                                            </span>
                                            <input type="text" wire:model.defer="job_title" maxlength="30"
                                                class="form-control" placeholder="ادخل المسمى الوظيفي" />
                                        </div>
                                        <div class="form-helper text-danger job_title-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="forName"><strong>رقم الهوية</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                            <input type="name" wire:model.defer="id_number" maxlength="15"
                                                class="form-control" placeholder="رقم الهوية" />
                                        </div>
                                        <div class="form-helper text-danger id_number-validation reset-validation">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">

                                        <label class="form-label" for="forPassword"><strong>كلمة
                                                المرور</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>

                                            <input type="password" wire:model.defer="password" maxlength="25"
                                                class="form-control" placeholder="ادخل كلمة المرور" />

                                        </div>
                                        <div class="form-helper text-danger password-validation reset-validation">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn bg-blue-color" data-mdb-dismiss="modal">
                                    إغلاق
                                </button>

                                <button type="button" class="btn bg-blue-color nextCreator">السابق</button>
                                <button type="button" class="btn text-white green-color addUserButton"
                                    wire:click='addUser()'>حفظ</button>
                                <button type="button" class="btn text-white green-color editUserButton"
                                    wire:click='editUser()'>تحديث</button>
                                <button type="button" class="btn bg-blue-color nextCreator">التالي</button>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
     --}}
</div>


@push('scripts')
    <script>
        $(document).ready(function() {

            const $editButton = $(".editButton");
            const $addUserButton = $(".addUserButton");
            const $editUserButton = $(".editUserButton");

            $addUserButton.show();
            $editUserButton.hide();

            $editButton.on('click', function() {
                $addUserButton.hide();
                $editUserButton.show();
            });


            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#user-modal").modal('hide');
                $addUserButton.show();
                $editUserButton.hide();
            });

            Livewire.on("create-errors", function(errors) {
                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-validation").text(errors[0][key]);
                    }
                }
            });
        });
    </script>
@endpush
