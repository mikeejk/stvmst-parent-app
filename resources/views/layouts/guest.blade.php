<!DOCTYPE html>

<html lang="en">

    <!-- begin::Head -->

    <head>
        <base href="">
        <meta charset="utf-8" />
        <title>GoSchoolERP - Parent Login</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="GoSchoolERP - A Practical School Management Software">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

        <!--end::Fonts -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        @stack('styles')

        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->




    <body style="background-image: url(../assets/media/misc/bg_1.jpg)" class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

        
        <!--@guest-->
        <!-- begin:: Page -->
        <div class="kt-grid kt-grid--ver kt-grid--root">
            <div class="kt-grid__item  kt-grid__item--fluid kt-grid kt-grid--hor kt-login-v1" id="kt_login_v1">

                <!--begin::Item-->
                <div class="kt-grid__item">

                    <!--begin::Heade-->
                    <div class="kt-login-v1__head">
                        <div class="kt-login-v1__logo">
                            <img src="../images/goschoolerp.png" alt="" />
                        </div>
                    </div>

                    <!--begin::Head-->
                </div>

                <!--end::Item-->

                <!--begin::Item-->
                @yield('content')

                <!--end::Item-->

                <!--begin::Item-->
                <div class="kt-grid__item">
                    <div class="kt-login-v1__footer">
                        <div class="kt-login-v1__copyright">
                            <a href="http://goschoolerp.com/" target="_blank">&copy; 2020 GoSchoolERP</a>
                        </div>
                    </div>
                </div>

                <!--end::Item-->
            </div>
        </div>

        <!-- end:: Page -->
        <!--@endguest-->


        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#5d78ff",
                        "metal": "#c4c5d6",
                        "light": "#ffffff",
                        "accent": "#00c5dc",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995",
                        "focus": "#9816f4"
                    },
                    "base": {
                        "label": [
                            "#c5cbe3",
                            "#a1a8c3",
                            "#3d4465",
                            "#3e4466"
                        ],
                        "shape": [
                            "#f0f3ff",
                            "#d9dffa",
                            "#afb4d4",
                            "#646c9a"
                        ]
                    }
                }
            };
        </script>

        <!-- end::Global Config -->

        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')

    </body>

    <!-- end::Body -->

</html>