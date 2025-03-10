<div class="tab-content" id="dailyToursTabContent">

    <div class="tab-pane fade tab-pane-selector active show" id="weekly_warehouse_tab_id" role="tabpanel" wire:ignore.self>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم المستودع الاسبوعي
            </a>
        </div>
        <div class="row" wire:ignore>
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
                        @foreach (config('data.forms.table-header.weekly.weekly_warehouse') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.weekly.weekly_warehouse') as $key => $value)
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
                <button type="submit" form="weekly_warehouse" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>

    <div class="tab-pane fade tab-pane-selector" id="external_weekly_warehouses_tab_id" role="tabpanel"
        wire:ignore.self>
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم المستودعات الخارجية الاسبوعية
            </a>
        </div>
        <div class="row" wire:ignore>
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
                        @foreach (config('data.forms.table-header.weekly.external_weekly_warehouses') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 1;
                    @endphp
                    @forelse (config('data.forms.table-body.weekly.external_weekly_warehouses') as $key => $value)
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
                <button type="submit" form="external_weekly_warehouses"
                    class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
</div>
