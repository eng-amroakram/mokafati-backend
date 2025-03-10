<ul class="nav nav-pills mb-3" id="ex-with-icons" role="tablist" wire:ignore>

    <li class="nav-item" role="presentation">
        <a data-mdb-toggle="pill" class="nav-link active" id="daily_tours_pill" href="#daily_tours_pill_id" role="tab"
            aria-controls="daily_tours_pill_id" aria-selected="false">
            <i class="fas fa-calendar-days fa-fw me-2"></i>الجولات اليومية</a>
    </li>

    <li class="nav-item" role="presentation">
        <a data-mdb-toggle="pill" class="nav-link" id="weekly_tours_pill" href="#weekly_tours_pill_id"
            role="tab" aria-controls="weekly_tours_pill_id" aria-selected="false">
            <i class="fas fa-calendar-days fa-fw me-2"></i>الجولات الاسبوعية</a>
    </li>

    <li class="nav-item" role="presentation">
        <a data-mdb-toggle="pill" class="nav-link" id="monthly_tours_pill" href="#monthly_tours_pill_id" role="tab"
            aria-controls="monthly_tours_pill_id" aria-selected="true"><i
                class="fas fa-calendar-day fa-fw me-2"></i>الجولات الشهرية</a>
    </li>

    <li class="nav-item" role="presentation">
        <a data-mdb-toggle="pill" class="nav-link" id="annual_tours_pill" href="#annual_tours_pill_id" role="tab"
            aria-controls="annual_tours_pill_id" aria-selected="false"><i class="far fa-calendar fa-fw me-2"></i>الجولات
            السنوية</a>
    </li>


    @if (!$user->signature && !in_array($user->type, ['superadmin', 'admin']))
        <li class="nav-item" role="presentation">
            <a class="nav-link nav-link-custom" id="" href="{{ route('web.signature') }}" role="tab"
                aria-selected="false"><i class="fas fa-signature fa-fw me-2"></i>قم بالتوقيع هنا</a>
        </li>
    @endif

</ul>
