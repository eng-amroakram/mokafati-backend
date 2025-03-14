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
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead>
                    <tr>
                        <th class="th-sm"><strong>ID</strong></th>
                        <th data-mdb-sort="true" class="th-sm"><strong>اسم المتجر</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>صاحب المتجر</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>السجل التجاري</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>الرقم الضريبي</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>النوع</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>الفاتورة</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
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

                            <td>Image</td>
                            <x-actions :delete="false" edit="edit_store" :show="false" :link="'#'"
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
                    <ul class="nav md-tabs nav-tabs icon-background" id="create-new-user" role="tablist"
                        >
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active fs-6" id="create-new-user-tab-1" href="#create-new-user-tabs-1"
                                role="tab" aria-controls="create-new-user-tabs-1" aria-selected="true"
                                data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i>
                                <strong>
                                    بيانات المتجر
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
                                        <label class="form-label" for="forName"><strong>اسم المتجر</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-file-signature"></i>
                                            </span>
                                            <input type="text" wire:model.defer="name" maxlength="50"
                                                class="form-control" placeholder="ادخل اسم المتجر" />
                                        </div>
                                        <div class="form-helper text-danger name-validation reset-validation"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="forOwnerID"><strong>مالك
                                                المتجر</strong></label>
                                        <select class="select" id="owner-store" wire:model.defer="owner_id">
                                            <option value=""></option>
                                            @foreach (users() as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-helper text-danger owner_id-validation reset-validation">
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label class="form-label" for="forStoreType"><strong>نوع
                                                المتجر</strong></label>
                                        <select class="select" id="store-type" wire:model.defer="type">
                                            @foreach (store_types() as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-helper text-danger type-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="forCommercialRegistration"><strong>رقم السجل
                                                التجاري</strong></label>
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

                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label class="form-label" for="forTaxNumber"><strong>رقم
                                                الضريبة</strong></label>
                                        <div class="input-group">
                                            <input type="number" dir="ltr" wire:model.defer="tax_number"
                                                class="form-control" placeholder="25" />
                                            <span class="input-group-text">
                                                <i class="fas fa-comment-dollar"></i>
                                            </span>
                                        </div>
                                        <div class="form-helper text-danger tax_number-validation reset-validation">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label" for="forInvoice"><strong>الفاتورة</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-file-invoice"></i>
                                            </span>
                                            <input type="text" wire:model.defer="invoice" maxlength="50"
                                                class="form-control" placeholder="الفاتورة" />
                                        </div>
                                        <div class="form-helper text-danger invoice-validation reset-validation">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn bg-blue-color closeUserButton"
                                    data-mdb-dismiss="modal">
                                    إغلاق
                                </button>

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
