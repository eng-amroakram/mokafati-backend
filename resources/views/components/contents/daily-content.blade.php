<div class="tab-content" id="dailyToursTabContent" wire:ignore.self>

    <div class="tab-pane fade show active" id="night_inspection_tour_tab_id" role="tabpanel"
        aria-labelledby="night_inspection_tour_tab" wire:ignore>

        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم الجولة التفتيشية
                المسائية والليلية
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
                        @foreach (config('data.forms.table-header.daily.night_inspection_tour') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>

                    @php
                        $x = 1;
                    @endphp

                    @forelse (config('data.forms.table-body.daily.night_inspection_tour') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <select class="select selectfield" id="{{ 'status_' . $x }}"
                                    name="{{ 'status_' . $x }}">
                                    <option value=""></option>
                                    <option value="يوجد">يوجد</option>
                                    <option value="لا يوجد">لا يوجد</option>
                                    <option value="لا شيء">لا شيء</option>
                                </select>
                            </td>

                            <td>
                                <input type="text" class="form-control textfield" name="{{ 'work_number_' . $x }}" />
                            </td>

                            <td>
                                <input type="text" class="form-control textfield" name={{ 'comment_' . $x }} />
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
                <button type="submit" form="night_inspection_tour" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>

    </div>

    <div class="tab-pane fade" id="direct_status_report_tab_id" role="tabpanel"
        aria-labelledby="direct_status_report_tab" wire:ignore.self>

        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم مباشرة الحالة
            </a>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>الحالة</strong></label>
                <div class="input-group">
                    <textarea name="status" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger status-validation reset-validation"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>السبب</strong></label>
                <div class="input-group">
                    <textarea name="reason" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger reason-validation reset-validation"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>القسم</strong></label>
                <div class="input-group">
                    <textarea name="section" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger section-validation reset-validation"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>الملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation"></div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <x-file-input name="image" model="form" label="صورة الحالة"></x-file-input>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" form="direct_status_report" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>

    </div>

    <div class="tab-pane fade" id="daily_notes_tab_id" role="tabpanel" aria-labelledby="daily_notes_tab"
        wire:ignore.self>

        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم الجولة اليومية
            </a>
        </div>

        <div class="table-responsive-md text-center mb-4">

            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>

            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.daily.daily_tour') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>

                    @php
                        $x = 1;
                    @endphp

                    @forelse (config('data.forms.table-body.daily.daily_tour') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>
                                <input type="text" class="form-control textfield" name="{{ 'comment_' . $x }}" />
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'location_' . $x }}" />
                            </td>
                            <td>
                                <input type="text" class="form-control textfield"
                                    name="{{ 'procedure_' . $x }}" />
                            </td>

                            <td>
                                <x-file-input name="{{ 'location_image_' . $x }}" model="form"
                                    label=""></x-file-input>
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




        <div class="row">
            <div class="col-md-12">
                <button type="submit" form="daily_tour" class="btn btn-lg text-white btn-block submit"
                    style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>


    </div>

</div>
