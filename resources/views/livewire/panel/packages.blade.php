<div class="container-fluid">
    <div class="p-4 mb-4">

        <div class="row mb-4" wire:ignore>
            @livewire('panel.page-header', ['title' => 'الباقات', 'label' => 'باقة', 'model' => false, 'user' => false, 'perm' => true])
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
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading wire:target='search'>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead>
                    <tr>
                        <th class="th-sm">ID</th>
                        <th data-mdb-sort="true" class="th-sm">الاسم</th>
                        <th data-mdb-sort="false" class="th-sm">سعرالباقة</th>
                        <th data-mdb-sort="false" class="th-sm">نسبة الكاش باك</th>
                        <th data-mdb-sort="false" class="th-sm">عدد المكافئات</th>
                        <th data-mdb-sort="false" class="th-sm">الحد الادنى للشراء</th>
                        <th data-mdb-sort="false" class="th-sm">المبيعات المتوقعة</th>
                        <th data-mdb-sort="false" class="th-sm">مدة صلاحية الباقة</th>
                        <th data-mdb-sort="false" class="th-sm">الحالة</th>
                        <th data-mdb-sort="false" class="th-sm">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($packages as $package)
                        <tr>
                            <td>{{ $package->id }}</td>
                            <td>{{ $package->title }}</td>
                            <td>{{ $package->price }} ريال</td>
                            <td>{{ $package->cash_back }} %</td>
                            <td>{{ $package->rewards }} مكافئة</td>
                            <td>{{ $package->minimum_purchase }} ريال</td>
                            <td>{{ $package->expected_sales }} ريال</td>
                            <td>
                                <span class='{{ badge('employee') }}'>حتى نفاذ عدد المكافئات</span>
                            </td>
                            <td>
                                <div class="switch">
                                    <label>
                                        نشط
                                        <input wire:click="changeStatus({{ $package->id }})" type="checkbox"
                                            {{ $package->status == 'active' ? 'checked' : '' }}>
                                        <span class="lever"></span>
                                        غير نشط
                                    </label>
                                </div>
                            </td>
                            <x-actions delete="delete_package" edit="edit_package" :show="false" :link="'#'"
                                :id="$package->id"></x-actions>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class=" fs-6">لا يوجد نتائج !!</td>
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

    <div class="modal fade" id="user-modal" tabindex="-1" data-mdb-backdrop="static" data-mdb-keyboard="false"
        aria-labelledby="Creator" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg cascading-modal" style="margin-top: 4%">
            <div class="modal-content">
                <div class="modal-c-tabs">


                    <!-- Tabs navs -->
                    <ul class="nav md-tabs nav-tabs icon-background" id="create-new-user" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active fs-6" id="create-new-user-tab-1" href="#create-new-user-tabs-1"
                                role="tab" aria-controls="create-new-user-tabs-1" aria-selected="true"
                                data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i>
                                <strong>
                                    بيانات الباقة
                                </strong>
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content" id="ex1-content">

                        <div class="tab-pane fade show active" id="create-new-user-tabs-1" role="tabpanel"
                            aria-labelledby="create-new-user-tab-1">

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forTitle">اسم الباقة</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-heading"></i>
                                            </span>
                                            <input type="text" wire:model.defer="title" maxlength="50"
                                                class="form-control" placeholder="ادخل عنوان الباقة" />
                                        </div>
                                        <div class="form-helper text-danger title-validation reset-validation"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forPrice">سعر الباقة</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-hand-holding-dollar"></i>
                                            </span>
                                            <input type="number" wire:model.defer="price" class="form-control"
                                                max="5000" placeholder="سعر الباقة" />
                                            <span class="input-group-text"
                                                style="padding-top:0px; padding-bottom:0px; ">
                                                ريال
                                            </span>
                                        </div>
                                        <div class="form-helper text-danger price-validation reset-validation">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forName">نسبة الكاش
                                            باك</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-money-bill"></i>
                                            </span>
                                            <input type="number" wire:model.defer="cash_back" max="2000"
                                                class="form-control" placeholder="ادخل نسبة الكاش باك" />
                                            <span class="input-group-text"
                                                style="padding-top:0px; padding-bottom:0px;">
                                                %
                                            </span>
                                        </div>
                                        <div class="form-helper text-danger cash_back-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forName">عدد المكافأت</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-hand-holding-heart"></i>
                                            </span>
                                            <input type="number" wire:model.live="rewards" max="5000"
                                                class="form-control" placeholder="عدد المكافأت" />
                                            <span class="input-group-text"
                                                style="padding-top:0px; padding-bottom:0px;">
                                                مكافأة
                                            </span>
                                        </div>
                                        <div class="form-helper text-danger rewards-validation reset-validation">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forName">الحد الادنى
                                            للشراء</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-cash-register"></i>
                                            </span>
                                            <input type="number" wire:model.live="minimum_purchase" max="2000"
                                                class="form-control" placeholder="ادخل الحد الادنى للشراء" />
                                            <span class="input-group-text"
                                                style="padding-top:0px; padding-bottom:0px;">
                                                ريال
                                            </span>
                                        </div>
                                        <div
                                            class="form-helper text-danger minimum_purchase-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forExpectedSales">المبيعات المتوقعة</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-people-carry-box"></i>
                                            </span>
                                            <input type="number" wire:model.defer="expected_sales" max="10000"
                                                class="form-control" placeholder="عدد المكافات * الحد الأدنى للشراء"
                                                disabled />

                                            <span class="input-group-text"
                                                style="padding-top:0px; padding-bottom:0px;">
                                                ريال
                                            </span>
                                        </div>
                                        <div
                                            class="form-helper text-danger expected_sales-validation reset-validation">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forName">مدة صلاحية
                                            الباقة</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="far fa-hourglass-half"></i>
                                            </span>
                                            <input type="text" wire:model.defer="validity_period"
                                                class="form-control" placeholder="مدة صلاحية الباقة" disabled />
                                        </div>
                                        <div
                                            class="form-helper text-danger validity_period-validation reset-validation">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn bg-blue-color closePackageButton"
                                    data-mdb-dismiss="modal">
                                    إغلاق
                                </button>

                                {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                <button type="button" class="btn text-white icon-background addPackageButton fw-bold"
                                    wire:click='addPackage()'>
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='addPackage'></span>
                                    حفظ</button>

                                <button type="button"
                                    class="btn text-white icon-background editPackageButton fw-bold"
                                    wire:click='updatePackage()'>
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='updatePackage'></span>
                                    تحديث</button>

                                {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('scripts')
    <script>
        $(document).ready(function() {

            const $editButton = $(".editButton");
            const $addButton = $(".addButton");
            const $addPackageButton = $(".addPackageButton");
            const $editPackageButton = $(".editPackageButton");
            const $closePackageButton = $(".closePackageButton");

            $addPackageButton.show();
            $editPackageButton.hide();

            $editButton.on('click', function() {
                $addPackageButton.hide();
                $editPackageButton.show();
            });

            $addButton.on('click', function() {
                $addPackageButton.show();
                $editPackageButton.hide();
                @this.dispatch("reset-properties");
                $(".reset-validation").text("");
            });

            $closePackageButton.on('click', function() {
                $addPackageButton.show();
                $editPackageButton.hide();
                $(".reset-validation").text("");
            });

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#user-modal").modal('hide');
                $addPackageButton.show();
                $editPackageButton.hide();
            });

            // Livewire.on("singleSelectInput", function(selected) {
            //     const singleSelect = document.querySelector("#user-role");
            //     const singleSelectInstance = mdb.Select.getInstance(singleSelect);
            //     singleSelectInstance.setValue(selected[0]);
            // });

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
