<div class="tab-content" id="dailyToursTabContent">
    <div class="tab-pane fade tab-pane-selector active show" id="refrigerants_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم المبردات
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.refrigerants') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.refrigerants') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <!-- First Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio" name="{{ 'row_' . $x }}"
                                    value="{{ 'na_' . $x }}" id="{{ 'na_' . $x }}" />
                            </td>
                            <td>
                                <!-- Second Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio" name="{{ 'row_' . $x }}"
                                    value="{{ 'no_' . $x }}" id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <!-- Third Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio" name="{{ 'row_' . $x }}"
                                    value="{{ 'yes_' . $x }}" id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td dir="ltr">{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات التفتيش
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="refrigerants" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="warehouse_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم المستودع
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.warehouse') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.warehouse') as $key => $value)
                        <tr class="text-center">
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <!-- First Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                    id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <!-- Second Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                    id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات المستودع
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="warehouse" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="generators_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم المولدات
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.generators') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.generators') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <!-- First Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                    id="{{ 'na_' . $x }}" />
                            </td>
                            <td>
                                <!-- Second Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                    id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <!-- Third Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                    id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td dir="ltr">{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات المولدات
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="generators" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="boilers_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم الغلايات
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.boilers') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.boilers') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <!-- First Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                    id="{{ 'na_' . $x }}" />
                            </td>
                            <td>
                                <!-- Second Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                    id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <!-- Third Radio Button -->
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                    id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td dir="ltr">{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات الغلايات
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="boilers" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="fire_sprinklers_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم رشاشات الحريق
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.fire_sprinklers') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.fire_sprinklers') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <select class="select selectfield" id="{{ 'status_' . $x }}"
                                    name="{{ 'status_' . $x }}">
                                    <option value=""></option>
                                    <option value="غير مطلوب">غير مطلوب</option>
                                    <option value="سليم">سليم</option>
                                    <option value="غير سليم">غير سليم</option>
                                </select>
                            </td>
                            <td dir="ltr">{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات رشاشات الحريق
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="fire_sprinklers" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="fm200_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                فورم FM200
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.FM200') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.FM200') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                    id="{{ 'na_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'sat_' . $x }}"
                                    id="{{ 'sat_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'un_' . $x }}"
                                    id="{{ 'un_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td>{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات FM200
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="FM200" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="co2_system_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم نظام CO2
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.CO2') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.CO2') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                    id="{{ 'na_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                    id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                    id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield" name="{{ 'comment_' . $x }}" />
                            </td>
                            <td>{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات CO2
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="CO2" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="external_warehouses_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم المستودعات الخارجية
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.external_warehouses') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.external_warehouses') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                    id="{{ 'na_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                    id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                    id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $x }}" />
                            </td>
                            <td>{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات المستودعات الخارجية
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="external_warehouses" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="staircase_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم بيت الدرج
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.staircase') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.staircase') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                    id="{{ 'na_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                    id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                    id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $x }}" />
                            </td>
                            <td>{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات بيت الدرج
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="staircase" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="surface_inspection_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم تفتيش السطح
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.surface_inspection') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.surface_inspection') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                    id="{{ 'na_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                    id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                    id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $x }}" />
                            </td>
                            <td>{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات تفتيش السطح
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="surface_inspection" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="kitchen_inspection_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم تفتيش المطبخ
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.kitchen_inspection') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.kitchen_inspection') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                    id="{{ 'na_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                    id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                    id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $x }}" />
                            </td>
                            <td>{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات تفتيش المطبخ
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="kitchen_inspection" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="fire_extinguishers_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم طفايات الحريق
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"> <span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center fire-extinguishers" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.fire_extinguishers') as $element)
                            <th class="th-sm p-2"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.fire_extinguishers') as $key => $value)
                        <tr>
                            <td class="p-2">{{ $x }}</td>
                            <td class="p-2">
                                <input type="text" class="form-control textfield"
                                    name="{{ 'extinguisher_' . $x }}" />
                            </td>
                            <td class="p-2">
                                <input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $x }}" />
                            </td>
                            <td class="p-2">
                                <select class="select selectfield" id="{{ 'type_' . $x }}"
                                    name="{{ 'type_' . $x }}">
                                    <option value="">لا شيء</option>
                                    <option value="co2">co2</option>
                                    <option value="زيتية">زيتية</option>
                                    <option value="بودره">بودره</option>
                                </select>
                            </td>
                            <td class="p-2">
                                <select class="select selectfield" id="{{ 'capacity_' . $x }}"
                                    name="{{ 'capacity_' . $x }}">
                                    <option value="">لا شيء</option>
                                    <option value="2 kg">2 kg</option>
                                    <option value="4 kg">4 kg</option>
                                    <option value="6 kg">6 kg</option>
                                    <option value="10 kg">10 kg</option>
                                    <option value="15 kg">15 kg</option>
                                    <option value="25 kg">25 kg</option>
                                    <option value="50 kg">50 kg</option>
                                </select>
                            </td>
                            <td class="p-2">
                                <select class="select selectfield" id="{{ 'bracket_' . $x }}"
                                    name="{{ 'bracket_' . $x }}">
                                    <option value="">لا شيء</option>
                                    <option value="✔️">✔️</option>
                                    <option value="❌">❌</option>
                                </select>
                            </td>
                            <td class="p-2">
                                <select class="select selectfield" id="{{ 'fundation_' . $x }}"
                                    name="{{ 'fundation_' . $x }}">
                                    <option value="">لا شيء</option>
                                    <option value="✔️">✔️</option>
                                    <option value="❌">❌</option>
                                </select>
                            </td>
                            <td class="p-2">
                                <select class="select selectfield" id="{{ 'cyliner_' . $x }}"
                                    name="{{ 'cyliner_' . $x }}">
                                    <option value="">لا شيء</option>
                                    <option value="✔️">✔️</option>
                                    <option value="❌">❌</option>
                                </select>
                            </td>
                            <td class="p-2">
                                <select class="select selectfield" id="{{ 'pin_seal_' . $x }}"
                                    name="{{ 'pin_seal_' . $x }}">
                                    <option value="">لا شيء</option>
                                    <option value="✔️">✔️</option>
                                    <option value="❌">❌</option>
                                </select>
                            </td>
                            <td class="p-2">
                                <select class="select selectfield" id="{{ 'hose_' . $x }}"
                                    name="{{ 'hose_' . $x }}">
                                    <option value="">لا شيء</option>
                                    <option value="✔️">✔️</option>
                                    <option value="❌">❌</option>
                                </select>
                            </td>
                            <td class="p-2">
                                <select class="select selectfield" id="{{ 'pressure_' . $x }}"
                                    name="{{ 'pressure_' . $x }}">
                                    <option value="">لا شيء</option>
                                    <option value="✔️">✔️</option>
                                    <option value="❌">❌</option>
                                </select>
                            </td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات طفايات الحريق
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="fire_extinguishers" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="fire_hoses_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم خراطيم الحريق
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.fire_hoses') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.fire_hoses') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                    id="{{ 'no_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                    id="{{ 'yes_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $x }}" />
                            </td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات خراطيم الحريق
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="fire_hoses" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="fire_blankets_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم بطانيات الحريق
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.fire_blankets') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.fire_blankets') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'sat_' . $x }}"
                                    id="{{ 'sat_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'un_' . $x }}"
                                    id="{{ 'un_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $x }}" />
                            </td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات بطانيات الحريق
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="fire_blankets" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="emergency_shower_eye_wash_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم غسيل العيون ودش الطوارىء
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم دش الطوارىء
            </a>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.emergency_shower_eye_wash') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.emergency_shower_eye_wash_1') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'un_' . $x }}"
                                    id="{{ 'un_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'sat_' . $x }}"
                                    id="{{ 'sat_' . $x }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $x }}" value="{{ 'notreq_' . $x }}"
                                    id="{{ 'notreq_' . $x }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $x }}" />
                            </td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم غسيل العيون
            </a>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.emergency_shower_eye_wash') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.emergency_shower_eye_wash_2') as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $key }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $key }}" value="{{ 'notreq_' . $key }}"
                                    id="{{ 'notreq_' . $key }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $key }}" value="{{ 'sat_' . $key }}"
                                    id="{{ 'sat_' . $key }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $key }}" value="{{ 'un_' . $key }}"
                                    id="{{ 'un_' . $key }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $key }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $key }}" />
                            </td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات دش الطوارىء وغسيل العيون
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="emergency_shower_eye_wash"
                    class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="emergency_exits_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم مخارج الطوارىء
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4" style="overflow-x: auto;">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.emergency_exits') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.emergency_exits') as $key => $value)
                        <tr>
                            <td class="px-2">{{ $key }}</td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'clear_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'knob_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'box_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'door_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'flush_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'resistance_' . $key }}" style="min-width: 200px;" />
                            </td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'obstructed_' . $key }}" style="min-width: 200px;" />
                            </td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'notes_' . $key }}" style="min-width: 200px;" /></td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات مخارج الطوارىء
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="emergency_exits" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="elevator_inspection_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم تفتيش المصاعد
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4" style="overflow-x: auto;">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.elevator_inspection') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.elevator_inspection') as $key => $value)
                        <tr>
                            <td class="px-2">{{ $key }}</td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'alarm_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'open_floor_level_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'door_condition_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'lift_room_' . $key }}" style="min-width: 200px;" />
                            </td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'internal_light_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'ventilation_system_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'tel_' . $key }}" style="min-width: 200px;" /></td>
                            <td class="px-2"><input type="text" class="form-control textfield"
                                    name="{{ 'lift_operation_condition_' . $key }}" style="min-width: 200px;" />
                            </td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات تفتيش المصاعد
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="elevator_inspection" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="emergency_headlamps_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم كاشفات الطوارىء
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.emergency_headlamps') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.emergency_headlamps') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $key }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $key }}" value="{{ 'sat_' . $key }}"
                                    id="{{ 'sat_' . $key }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $key }}" value="{{ 'un_' . $key }}"
                                    id="{{ 'un_' . $key }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $key }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $key }}" />
                            </td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات كاشفات الطوارىء
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="emergency_headlamps" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade tab-pane-selector" id="breakersfm_tab_id" role="tabpanel">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم قواطع FM200
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-md text-center mb-4">
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.monthly.breakersfm') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.monthly.breakersfm') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $key }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $key }}" value="{{ 'sat_' . $key }}"
                                    id="{{ 'sat_' . $key }}" />
                            </td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio"
                                    name="{{ 'row_' . $key }}" value="{{ 'un_' . $key }}"
                                    id="{{ 'un_' . $key }}" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $key }}">Clear</button>
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'comment_' . $key }}" />
                            </td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات قواطع FM200
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" form="breakersfm" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
</div>
