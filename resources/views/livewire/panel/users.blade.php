<div class="container-fluid">
    <div class="p-4 mb-4">

        <div class="row mb-4" wire:ignore>
            @livewire('panel.page-header', ['title' => 'المستخدمين', 'label' => 'مستخدم', 'model' => false, 'user' => false, 'perm' => true])
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
                        <th data-mdb-sort="false" class="th-sm">الايميل</th>
                        <th data-mdb-sort="false" class="th-sm">رقم الهاتف</th>
                        <th data-mdb-sort="false" class="th-sm">النوع</th>
                        <th data-mdb-sort="false" class="th-sm">حالة المستخدم</th>
                        <th data-mdb-sort="false" class="th-sm">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <span
                                    class='{{ badge(optional($user->roles->first())->name ?? '') }}'>{{ ucwords(str_replace('_', ' ', optional($user->roles->first())->name ?? '')) }}</span>
                            </td>
                            <td>
                                @if (!$user->email_verified_at)
                                    <span class='badge badge-danger'>لم يتم التحقق
                                        من البريد الالكتروني</span>
                                @else
                                    <div class="switch">
                                        <label>
                                            نشط
                                            <input type="checkbox" wire:click="status({{ $user->id }})"
                                                {{ $user->status == 'active' ? 'checked' : '' }}
                                                {{ $user->status == 1 ? 'checked' : '' }}>
                                            <span class="lever"></span>
                                            غير نشط
                                        </label>
                                    </div>
                                @endif

                            </td>
                            <x-actions delete="delete_user" edit="edit_user" :show="false" :link="'#'"
                                :id="$user->id"></x-actions>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="fw-bold fs-6">لا يوجد نتائج !!</td>
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
                    {{ $users->withQueryString()->onEachSide(0)->links() }}
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
                    <ul class="nav md-tabs nav-tabs icon-background" id="create-new-user" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active fs-6" id="create-new-user-tab-1" href="#create-new-user-tabs-1"
                                role="tab" aria-controls="create-new-user-tabs-1" aria-selected="true"
                                data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i>
                                <strong>
                                    بيانات المستخدم
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
                                        <label class="form-label" for="forName">اسم المستخدم</strong></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="far fa-user"></i>
                                            </span>
                                            <input type="text" wire:model.defer="name" maxlength="50"
                                                class="form-control" placeholder="ادخل اسم المستخدم" />
                                        </div>
                                        <div class="form-helper text-danger name-validation reset-validation"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
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

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forUsername">معرف
                                            المستخدم</label>
                                        <div class="input-group">

                                            <input type="text" dir="ltr" wire:model.defer="username"
                                                maxlength="15" class="form-control" placeholder="useName" />
                                            <span class="input-group-text">
                                                <i class="far fa-at"></i>
                                            </span>
                                        </div>
                                        <div class="form-helper text-danger username-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
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

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forAddress">العنوان</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="far fa-user"></i>
                                            </span>
                                            <input type="text" wire:model.defer="address" maxlength="50"
                                                class="form-control" placeholder="العنوان" />
                                        </div>
                                        <div class="form-helper text-danger address-validation reset-validation">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="forType">نوع المستخدم</label>
                                        <select class="select" id="user-role" wire:model.defer="role">
                                            <option value="user">مستخدم عادي</option>
                                            <option value="admin">إداري</option>
                                        </select>
                                        <div class="form-helper text-danger role-validation reset-validation">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label" for="forPassword">كلمة
                                            المرور</label>
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

                                <button type="button" class="btn bg-blue-color closeUserButton"
                                    data-mdb-dismiss="modal">
                                    إغلاق
                                </button>

                                <button type="button" class="btn text-white icon-background addUserButton fw-bold"
                                    wire:click='addUser()'>

                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='addUser'></span>
                                    حفظ</button>

                                <button type="button" class="btn text-white icon-background editUserButton fw-bold"
                                    wire:click='updateUser()'>
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading wire:target='updateUser'></span>
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
            const $addUserButton = $(".addUserButton");
            const $editUserButton = $(".editUserButton");
            const $closeUserButton = $(".closeUserButton");
            const $formControl = $(".form-control");

            $addUserButton.show();
            $editUserButton.hide();

            //Buttons Actions
            $editButton.on('click', function() {
                $addUserButton.hide();
                $editUserButton.show();
            });

            $addButton.on('click', function() {
                $addUserButton.show();
                $editUserButton.hide();
                $formControl.val("");
                @this.dispatch("reset-properties");
                $(".reset-validation").text("");
            });

            $closeUserButton.on('click', function() {
                $addUserButton.show();
                $editUserButton.hide();
                $(".reset-validation").text("");
            });

            //On Livewire
            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#user-modal").modal('hide');
                $addUserButton.show();
                $editUserButton.hide();
            });

            Livewire.on("singleSelectInput", function(selected) {
                const singleSelect = document.querySelector("#user-role");
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
