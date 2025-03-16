<div class="container-fluid">
    <div class="p-4 mb-4">

        <div class="row mb-4" wire:ignore>
            @livewire('panel.page-header', ['title' => 'المتاجر', 'label' => 'متجر', 'model' => false, 'user' => false, 'perm' => true])
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
                        <th data-mdb-sort="true" class="th-sm">اسم المتجر</th>
                        <th data-mdb-sort="false" class="th-sm">صاحب المتجر</th>
                        <th data-mdb-sort="false" class="th-sm">السجل التجاري</th>
                        <th data-mdb-sort="false" class="th-sm">الرقم الضريبي</th>
                        <th data-mdb-sort="false" class="th-sm">النوع</th>
                        <th data-mdb-sort="false" class="th-sm">الحالة</th>
                        <th data-mdb-sort="false" class="th-sm">المرفقات</th>
                        <th data-mdb-sort="false" class="th-sm">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stores as $store)
                        <tr>
                            <td>{{ $store->id }}</td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->owner->name }}</td>
                            <td>{{ $store->commercial_registration }}</td>
                            <td>{{ $store->tax_number }}</td>

                            <td>
                                <span
                                    class='{{ storeTypeBadge($store->type)['badge'] }}'>{{ storeTypeBadge($store->type)['name'] }}</span>
                            </td>
                            <td>
                                <div class="switch">
                                    <label>
                                        نشط
                                        <input wire:click="changeStatus({{ $store->id }})" type="checkbox"
                                            {{ $store->status == 'active' ? 'checked' : '' }}>
                                        <span class="lever"></span>
                                        غير نشط
                                    </label>
                                </div>
                            </td>

                            <td>
                                <div class="lightbox">
                                    <img src="{{ asset('panel/images/image.png') }}"
                                        data-mdb-img="{{ $store->commercial_image_table }}" width="30"
                                        height="30">
                                    <img src="{{ asset('panel/images/image.png') }}"
                                        data-mdb-img="{{ $store->tax_image_table }}" width="30" height="30">
                                    <img src="{{ asset('panel/images/image.png') }}"
                                        data-mdb-img="{{ $store->invoice_image_table }}" width="30" height="30">
                                    <img src="{{ asset('panel/images/image.png') }}"
                                        data-mdb-img="{{ $store->logo_image_table }}" width="30" height="30">
                                </div>
                            </td>
                            <x-actions :delete="true" edit="edit_store" :show="false" :link="'#'"
                                :id="$store->id"></x-actions>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
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
                    {{ $stores->withQueryString()->onEachSide(0)->links() }}
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
        <div class="modal-dialog modal-lg cascading-modal" style="margin-top: 5%">
            <div class="modal-content">
                <div class="modal-c-tabs">


                    <!-- Tabs navs -->
                    <ul class="nav md-tabs nav-tabs icon-background" id="create-modal" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active fs-6 tab-1" href="#tab-1" data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i><strong>بيانات التاجر</strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 tab-2" href="#tab-2" data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i><strong>بيانات المتجر</strong>
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content" id="ex1-content">

                        <div class="tab-pane fade show active content-1" id="tab-1" role="tabpanel"
                            aria-labelledby="tab-1">

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forOwnerID">مالك
                                            المتجر</label>
                                        <select class="select" id="owner-store" wire:model.live="owner_id">
                                            <option value=""></option>
                                            @foreach (users() as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-helper text-danger owner_id-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forOwnerName">اسم التاجر</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-file-signature"></i>
                                            </span>
                                            <input type="text" wire:model.defer="owner_name" maxlength="50"
                                                class="form-control" placeholder="ادخل اسم التاجر" disabled />
                                        </div>
                                        <div class="form-helper text-danger owner_name-validation reset-validation">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forOwnerEmail">الايميل</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                            <input type="text" dir="ltr" wire:model.defer="owner_email"
                                                maxlength="50" class="form-control" placeholder="Email" disabled />
                                        </div>
                                        <div class="form-helper text-danger owner_email-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forOwnerPhone">رقم الموبايل</label>
                                        <div class="input-group">
                                            <input type="text" dir="ltr" wire:model.defer="owner_phone"
                                                maxlength="9" class="form-control" placeholder="5xxx" disabled />
                                            <span class="input-group-text"
                                                style="padding-top: 0; padding-bottom:0;">966+</span>
                                        </div>
                                        <div class="form-helper text-danger owner_phone-validation reset-validation">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn bg-blue-color closeUserButton"
                                    data-mdb-dismiss="modal">
                                    إغلاق
                                </button>
                                <button type="button" class="btn bg-blue-color previousCreator">السابق</button>


                                <button type="button" class="btn text-white icon-background addStoreButton fw-bold"
                                    wire:click='addStore()'>

                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='addStore'></span>
                                    حفظ</button>

                                <button type="button" class="btn text-white icon-background editStoreButton fw-bold"
                                    wire:click='updateStore()'>
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='updateStore'></span>
                                    تحديث</button>
                                <button type="button"
                                    class="btn text-white icon-background fw-bold nextCreator">التالي</button>

                            </div>
                        </div>

                        <div class="tab-pane fade content-2" id="tab-2">

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forName">اسم المتجر</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-file-signature"></i>
                                            </span>
                                            <input type="text" wire:model.defer="name" maxlength="50"
                                                class="form-control" placeholder="ادخل اسم المتجر" />
                                        </div>
                                        <div class="form-helper text-danger name-validation reset-validation"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forStoreType">حدد نشاط المتجر</label>
                                        <select class="select" id="store-type" wire:model.defer="type">
                                            @foreach (store_types() as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-helper text-danger type-validation reset-validation">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forCommercialRegistration">رقم السجل
                                            التجاري</label>
                                        <div class="input-group">
                                            <input type="text" dir="ltr"
                                                wire:model.defer="commercial_registration" maxlength="14"
                                                class="form-control" placeholder="5xxx" />
                                            <span class="input-group-text">
                                                <i class="fas fa-receipt"></i>
                                            </span>
                                        </div>
                                        <div
                                            class="form-helper text-danger commercial_registration-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forTaxNumber">الرقم الضريبي</label>
                                        <div class="input-group">
                                            <input type="text" dir="ltr" wire:model.defer="tax_number"
                                                class="form-control" placeholder="25" maxlength="15" />
                                            <span class="input-group-text">
                                                <i class="fas fa-comment-dollar"></i>
                                            </span>
                                        </div>
                                        <div class="form-helper text-danger tax_number-validation reset-validation">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <x-file-input name="commercial_image" model="form"
                                            label="صورة السجل التجاري"></x-file-input>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <x-file-input name="tax_image" model="form"
                                            label="شهادة الرقم الضريبي"></x-file-input>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <x-file-input name="invoice" model="form" label="الفاتورة"></x-file-input>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <x-file-input name="logo" model="form"
                                            label="شعار المتجر"></x-file-input>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn bg-blue-color closeUserButton"
                                    data-mdb-dismiss="modal">
                                    إغلاق
                                </button>

                                <button type="button" class="btn bg-blue-color previousCreator">السابق</button>

                                <button type="button" class="btn text-white icon-background addStoreButton fw-bold"
                                    wire:click='addStore()'>
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='addStore'></span>
                                    حفظ
                                </button>

                                <button type="button" class="btn text-white icon-background editStoreButton fw-bold"
                                    wire:click='updateStore()'>
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='updateStore'></span>
                                    تحديث
                                </button>

                                <button type="button"
                                    class="btn text-white icon-background fw-bold nextCreator">التالي</button>
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
            const $addStoreButton = $(".addStoreButton");
            const $editStoreButton = $(".editStoreButton");
            const $closeUserButton = $(".closeUserButton");
            const $selectOwnerStore = document.getElementById("owner-store");
            const $formControl = $(".form-control");
            const $previousCreator = $(".previousCreator");
            const $nextCreator = $(".nextCreator");

            $previousCreator.hide();
            $nextCreator.show();

            $nextCreator.on('click', function() {
                $('.tab-1').removeClass('active');
                $('.content-1').removeClass('active');
                $('.content-1').removeClass('show');
                $('.tab-2').addClass('active');
                $('.content-2').addClass('active');
                $('.content-2').addClass('show');
                $previousCreator.show();
                $nextCreator.hide();
            });

            $previousCreator.on('click', function() {
                $('.tab-2').removeClass('active');
                $('.content-2').removeClass('active');
                $('.content-2').removeClass('show');
                $('.tab-1').addClass('active');
                $('.content-1').addClass('active');
                $('.content-1').addClass('show');
                $nextCreator.show();
                $previousCreator.hide();
            });


            $addStoreButton.show();
            $editStoreButton.hide();

            $editButton.on('click', function() {
                $addStoreButton.hide();
                $editStoreButton.show();
                $selectOwnerStore.disabled = !$selectOwnerStore.disabled;
            });

            $addButton.on('click', function() {
                $addStoreButton.show();
                $editStoreButton.hide();
                $formControl.val("");
                @this.dispatch("reset-properties");
                $(".reset-validation").text("");
            });

            $closeUserButton.on('click', function() {
                $addStoreButton.show();
                $editStoreButton.hide();
                $selectOwnerStore.disabled = false;
                $(".reset-validation").text("");
            });

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#user-modal").modal('hide');
                $addStoreButton.show();
                $editStoreButton.hide();
                $selectOwnerStore.disabled = false;
            });

            Livewire.on("singleSelectOwner", function(selected) {
                const singleSelect = document.querySelector("#owner-store");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue(selected[0].toString());
            });

            Livewire.on("singleSelectType", function(selected) {
                const singleSelect = document.querySelector("#store-type");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue(selected[0]);
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
