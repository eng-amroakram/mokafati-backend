<div class="container-fluid">
    <div class="p-4 mb-4">

        <div class="row mb-4" wire:ignore>
            @livewire('panel.page-header', ['title' => 'الموظفين', 'label' => 'موظف', 'model' => false, 'user' => false, 'perm' => true])
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
                        <th data-mdb-sort="true" class="th-sm">اسم الموظف</th>
                        <th data-mdb-sort="true" class="th-sm">الايميل</th>
                        <th data-mdb-sort="true" class="th-sm">رقم الهاتف</th>
                        <th data-mdb-sort="true" class="th-sm">النوع</th>
                        <th data-mdb-sort="true" class="th-sm">الحالة</th>
                        <th data-mdb-sort="true" class="th-sm">Qr Code</th>
                        <th data-mdb-sort="false" class="th-sm">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>
                                <span
                                    class='{{ employee_types($employee->type)['badge'] }}'>{{ employee_types($employee->type)['name'] }}</span>
                            </td>
                            <td>
                                <div class="switch">
                                    <label>
                                        نشط
                                        <input wire:click="changeStatus({{ $employee->id }})" type="checkbox"
                                            {{ $employee->status == 'active' ? 'checked' : '' }}>
                                        <span class="lever"></span>
                                        غير نشط
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="lightbox">
                                    <img src="{{ asset('panel/images/qr-code.png') }}"
                                        data-mdb-img="{{ $employee->qr_code_table }}" width="30" height="30">
                                </div>
                            </td>
                            <x-actions :delete="true" edit="edit_store" :show="false" :link="'#'"
                                :id="$employee->id"></x-actions>
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
                    {{ $employees->withQueryString()->onEachSide(0)->links() }}
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
        <div class="modal-dialog  cascading-modal" style="margin-top: 5%">
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
                                    بيانات المتجر
                                </strong>
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content" id="ex1-content">

                        <div class="tab-pane fade show active" id="create-new-user-tabs-1" role="tabpanel"
                            aria-labelledby="create-new-user-tab-1">

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="forName">اسم الموظف</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-file-signature"></i>
                                            </span>
                                            <input type="text" wire:model.defer="name" maxlength="50"
                                                class="form-control" placeholder="ادخل اسم الموظف" />
                                        </div>
                                        <div class="form-helper text-danger name-validation reset-validation"></div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="forEmail">الايميل</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                            <input type="text" dir="ltr" wire:model.defer="email"
                                                maxlength="50" class="form-control" placeholder="Email" />
                                        </div>
                                        <div class="form-helper text-danger email-validation reset-validation">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="forPhone">رقم الهاتف</label>
                                        <div class="input-group">
                                            <input type="text" dir="ltr" wire:model.defer="phone"
                                                maxlength="9" class="form-control" placeholder="5xxx" />
                                            <span class="input-group-text"
                                                style="padding-top: 0; padding-bottom:0;">966+</span>
                                        </div>
                                        <div class="form-helper text-danger phone-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="forType">نوع الموظف</label>
                                        <select class="select" id="employee-type" wire:model.defer="type">
                                            <option value="waiter" selected>ويتر</option>
                                            <option value="delivery">موصل</option>
                                            <option value="cashier">كاشير</option>
                                        </select>
                                        <div class="form-helper text-danger type-validation reset-validation">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn bg-blue-color closeEmployeeButton"
                                    data-mdb-dismiss="modal">
                                    إغلاق
                                </button>

                                <button type="button"
                                    class="btn text-white icon-background addEmployeeButton fw-bold"
                                    wire:click='addEmployee()'>

                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='addEmployee'></span>
                                    حفظ</button>

                                <button type="button"
                                    class="btn text-white icon-background editEmployeeButton fw-bold"
                                    wire:click='updateEmployee()'>
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='updateEmployee'></span>
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
            const $addEmployeeButton = $(".addEmployeeButton");
            const $editEmployeeButton = $(".editEmployeeButton");
            const $closeEmployeeButton = $(".closeEmployeeButton");
            const $formControl = $(".form-control");

            $addEmployeeButton.show();
            $editEmployeeButton.hide();

            $editButton.on('click', function() {
                $addEmployeeButton.hide();
                $editEmployeeButton.show();
            });

            $addButton.on('click', function() {
                $addEmployeeButton.show();
                $editEmployeeButton.hide();
                $formControl.val("");
                @this.dispatch("reset-properties");
                $(".reset-validation").text("");
            });

            $closeEmployeeButton.on('click', function() {
                $addEmployeeButton.show();
                $editEmployeeButton.hide();
                $(".reset-validation").text("");
            });

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#user-modal").modal('hide');
                $addEmployeeButton.show();
                $editEmployeeButton.hide();
            });

            Livewire.on("singleSelectInput", function(selected) {
                const singleSelect = document.querySelector("#employee-type");
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
