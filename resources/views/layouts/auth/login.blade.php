<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <link rel="icon" type="image/png" href="{{ asset('panel/images/munagasatcom-logo.png') }}">

    {{-- CSS Styles --}}
    <link rel="stylesheet" href="{{ asset('panel/mdb-pro/css/core.min.css') }}">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        /* عناوين بارزة */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 900;
        }

        /* تنسيق الجداول */
        table {
            font-size: 14px;
            font-weight: 400;
        }

        /* تخصيص الخطوط للنصوص الإنجليزية فقط */
        @font-face {
            font-family: 'EnglishFont';
            src: url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
        }

        /* تحديد النصوص الإنجليزية */
        *:not(i) {
            /* استثناء الأيقونات */
            font-family: 'Cairo', sans-serif;
        }

        :is(h1, h2, h3, h4, h5, h6, p, span, div, table):not(i) {
            font-family: 'Cairo', sans-serif;
        }

        :is(h1, h2, h3, h4, h5, h6, p, span, div, table) :lang(en):not(i) {
            font-family: 'Roboto', sans-serif;
        }
    </style>

    <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }

        .form-outline .form-control:focus~.form-label {
            color: 5299FF;
        }

        .form-outline .form-control:focus~.form-notch .form-notch-middle {
            border-color: 5299FF;
            box-shadow: 0 1px 0 0 5299FF;
            border-top: 1px solid rgba(0, 0, 0, 0);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-leading {
            border-color: 5299FF;
            box-shadow: -1px 0 0 0 5299FF, 0 1px 0 0 5299FF, 0 -1px 0 0 5299FF;
        }

        .form-outline .form-control:focus~.form-notch .form-notch-trailing,
        .form-outline .form-control.active~.form-notch .form-notch-trailing {
            border-left: none;
        }

        .form-outline .form-control:focus~.form-notch .form-notch-trailing {
            border-color: 5299FF;
            box-shadow: 1px 0 0 0 5299FF, 0 -1px 0 0 5299FF, 0 1px 0 0 5299FF;
        }

        @media (min-width: 1200px) {
            .w-50 {
                width: 65% !important;
            }
        }

        @media (max-width: 768px) {
            .w-50 {
                width: 90% !important;
            }

            .changesize {
                padding-top: 100px;
            }
        }

        @media (max-width: 576px) {
            .w-50 {
                width: 100% !important;
            }

            .changesize {
                padding-top: 100px;
            }
        }
    </style>



    @livewireStyles()
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <section class="vh-100">
        <div class="container-fluid changesize ">
            <div class="row">
                <div class="d-flex justify-content-center align-items-center col-sm-6">
                    <div class="card-body p-md-5 mx-md-4">
                        <div class="text-center">
                            <img src="{{ asset('panel/images/logo/logo-black.svg') }}" style="width: 210px;"
                                alt="logo">
                            <h4 class="mt-3 mb-4 pb-1 fw-bold">{{ $headerTitle }}</h4>
                        </div>

                        <div class="d-flex justify-content-center">
                            {{ $slot }}
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('panel/images/login-view.svg') }}" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>


    {{-- JS Scripts --}}

    <script type="text/javascript" src="{{ asset('panel/mdb-pro/js/core.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('panel/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('panel/js/popper.min.js') }}"></script>
    @livewireScripts()

    @stack('admin-login-script')

</body>

</html>
