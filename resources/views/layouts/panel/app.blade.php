<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('panel/css/mdb.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/new-prism.css') }}" />
    <link rel="stylesheet" href="{{ asset('panel/mdb-pro/css/card.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/mdb-pro/css/switch.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/mdb-pro/css/modals.css') }}">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #F4F6F9;
            /* خلفية فاتحة مع تباين جيد */
            color: #333333;
            /* لون الخط الأساسي */
        }

        /* عناوين بارزة */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 900;
            color: #2C3E50;
            /* لون العناوين */
        }

        a {
            color: #5299FF;
            /* لون الروابط مع تدرج متناسق مع sidebar */
        }

        table {
            font-size: 14px;
            font-weight: 400;
            color: #333333;
            /* خط الجداول */

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
        .mdb-docs-layout {
            padding-right: 240px;
        }

        @media (max-width: 1440px) {
            .mdb-docs-layout {
                padding-right: 0px;
            }
        }

        .color-green {
            color: rgb(1, 161, 127);
        }

        .icon-background {
            /* background: #5299ff; */
            background: #B2659D;

        }
    </style>

    @livewireStyles()
    {{-- CDN  Livewire Alerts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- @vite(['resources/js/app.js']) --}}
</head>

<body>
    <header>
        @include('partials.panel.sidenav')
        @include('partials.panel.navbar')
    </header>

    <main id="main-screen" class="pt-4 mdb-docs-layout">
        {{ $slot }}
    </main>

    <script type="text/javascript" src="{{ asset('panel/js/new-prism.js') }}"></script>
    <script type="text/javascript" src="{{ asset('panel/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('panel/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('panel/js/popper.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            const sidenav = document.getElementById("sidenav-1");
            const instance = mdb.Sidenav.getInstance(sidenav);

            let innerWidth = null;

            const setMode = (e) => {
                // Check necessary for Android devices
                if (window.innerWidth === innerWidth) {
                    return;
                }

                innerWidth = window.innerWidth;

                if (window.innerWidth < 1700) {
                    instance.changeMode("over");
                    instance.hide();
                } else {
                    instance.changeMode("side");
                    instance.show();
                }
            };

            setMode();

            // Event listeners
            window.addEventListener("resize", setMode);

            $(".navbar-toggler").on("click", function() {
                const sidebar = $("#sidenav-1");
                console.log(sidebar.css("transform"));
                if (sidebar.css("transform") ===
                    "matrix(1, 0, 0, 1, 0, 0)") { // Default state: translateX(0%)
                    sidebar.css("transform", "translateX(100%)"); // Move the sidebar out of view
                } else {
                    sidebar.css("transform", "translateX(0%)"); // Move the sidebar into view
                }
            });

            // Hide sidebar when clicking anywhere outside of the sidebar
            // $(document).on("click", function(e) {
            //     const sidebar = $("#sidenav-1");
            //     if (!$(e.target).closest("#sidenav-1, .navbar-toggler").length) {
            //         sidebar.css("transform", "translateX(100%)"); // Move sidebar out of view
            //     }
            // });

            // Prevent sidebar from closing when clicking inside it
            $("#sidenav-1").on("click", function(e) {
                e.stopPropagation(); // Prevent click from closing the sidebar when clicking inside it
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            const $dropdownToggle = document.getElementById('NotificationDropDown');
            const $dropdownMenu = document.querySelector('.dropdown-menu');

            // منع إغلاق القائمة عند النقر داخلها
            $dropdownMenu.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            // عند الضغط خارج القائمة تغلق
            $(document).on('click', function(e) {
                if (!$dropdownMenu.contains(e.target) && !$dropdownToggle.contains(e.target)) {
                    $dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>

    @livewireScripts()
    @stack('scripts')
</body>

</html>
