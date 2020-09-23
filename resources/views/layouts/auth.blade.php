<!DOCTYPE html>

<html lang="en">

    <!-- begin::Head -->

    <head>
        <base href="">
        <meta charset="utf-8" />
        <title>GoSchoolERP - Parent Teacher Login</title>
        <meta name="description" content="GoSchoolERP - A Practical School Management Software">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

        <!--end::Fonts -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        @stack('styles')

        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
        @livewireStyles
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->




    <body  class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

        @include('partials._page-loader')

        @include('partials._header.base_mobile')

        <!-- begin:: Root -->
        <div class="kt-grid kt-grid--hor kt-grid--root">

            <!-- begin:: Page -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                @include('partials._aside.base')

                <!-- begin:: Wrapper -->
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                    @include('partials._header.base')

                    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content"> 
                        @include('partials._subheader.subheader-v1')

                        <!-- begin:: Content -->
                        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">                            
                            <!--begin::Row--> 

                            @yield('content')

                        </div>

                    </div>

                    @include('partials._footer.base')
                </div>

                <!-- end:: Wrapper -->
            </div>

            <!-- end:: Page -->
        </div>

        <!-- end:: Root -->

        <!-- begin:: Topbar Offcanvas Panels -->



        <!-- end:: Topbar Offcanvas Panels -->





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

        <script src="{{ asset('js/app.js') }}" ></script>
        @stack('scripts')
        @livewireScripts


    </body>

    <!-- end::Body -->

</html>