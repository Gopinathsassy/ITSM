<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><base href="">
    <meta charset="utf-8" />
    <title>ITSM</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->

    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{url("assets/plugins/custom/fullcalendar/fullcalendar.bundle.css") }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{url("assets/plugins/global/plugins.bundle.css") }}" rel="stylesheet" type="text/css" />
    <link href={{url("assets/plugins/custom/prismjs/prismjs.bundle.css")}} rel="stylesheet" type="text/css" />
    <link href="{{url("assets/css/style.bundle.css")}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{url("assets/css/themes/layout/header/base/light.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{url("assets/css/themes/layout/header/menu/light.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{url("assets/css/themes/layout/brand/dark.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{url("assets/css/themes/layout/aside/dark.css")}}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{url("assets/media/logos/favicon.ico")}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body id="kt_body" class="page-loading-enabled page-loading quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize aside-minimize-hoverable page-loading">
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-column flex-column-fluid bg-white   position-relative overflow-hidden" style="background-image: url(assets/media/svg/illustrations/background.png)" id="kt_login">
        <!--begin::Header-->
        <div class="login-header py-10 flex-column-auto" id="log" style="background-image: linear-gradient(92deg, white, #0f5296);">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between">
                <!--begin::Logo-->
                <a href="#" class="flex-column-auto py-5 py-md-0">
                    <img alt="Logo" style="height:50px;;width:130px;padding-top:13px;" src="{{asset('assets/media/logos/XCMG_logo.png')}}" /> 
                </a>
                <!--end::Logo-->
                <h5 class="card-label what" id="tex"align="center">IT Service Management(ITSM)</h5>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->

        <div class="login-body d-flex flex-column-fluid align-items-stretch justify-content-center">
            <div class="container row">

            <div class="textitsm  col-lg-12 d-flex align-items-center">
            Login</br>

</div>
                <div class="col-lg-6 d-flex align-items-center " >
                    <!--begin::Signin-->
                    <div class="container"id="st">
                        <div class="row" id="newtxt">
                            <div class="col-lg-4"style="padding-bottom: 15px;">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch button "id="tes">

                                    <div class="card-body" id="st">
                                        <div class="card-title" >
                                            <h3 class="card-label what" align="center" style="color:white">User</h3>
                                            <a href="{{ route('user.login') }}" class="stretched-link"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>
                            <div class="col-lg-4"style="padding-bottom: 15px;">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch button "id="tes">

                                    <div class="card-body" id="st">
                                        <div class="card-title" >
                                            <h3 class="card-label what" align="center" style="color:white">Consultant</h3>
                                            <a href="{{ route('consultant.login') }}" class="stretched-link"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>
                            <div class="col-lg-4"style="padding-bottom: 15px;">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch button "id="tes">

                                    <div class="card-body" id="st">
                                        <div class="card-title" >
                                            <h3 class="card-label what" align="center" style="color:white">Admin</h3>
                                            <a href="{{ route('admin.login') }}" class="stretched-link"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>


                        <div class="textit  col-lg-12 d-flex align-items-center" style="Helvtica">
            ITSM offers various frameworks for businesses to create management standards around IT services and customer service practices.
</br></br>

</div>


                    </div>

                    </div>

                    <!--end::Signin-->
                    <!--begin::Signup-->

                    <!--end::Signup-->
                    <!--begin::Forgot-->

                    <!--end::Forgot-->

                </div>
                <div class="col-lg-6 bgi-size-contain bgi-no-repeat bgi-position-y-center bgi-position-x-center min-h-150px mt-10 m-md-0" style="background-image: url(assets/media/svg/illustrations/newitsm1.png)"></div>

            </div>
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="login-footer py-10 flex-column-auto">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between">
                <div class="font-size-h6 font-weight-bolder order-2 order-md-1 py-2 py-md-0">
                    <span class="text-muted font-weight-bold mr-2">2021©</span>
                    <a href="https://saiteck.in" target="_blank" class="text-dark-50 text-hover-primary">SAITECK ERP SOLUTIONS PRIVATE LIMITED</a>
                </div>
                <div class="font-size-h5 font-weight-bolder order-1 order-md-2 py-2 py-md-0">
                    <!--<a href="#" class="text-primary">Terms</a>-->
                    <!--<a href="#" class="text-primary ml-10">Plans</a>-->
                    <a href="https://saiteck.in/contact.php" class="text-primary ml-10">Contact Us</a>
                </div>
            </div>
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->

<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/keen/theme/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3E97FF", "secondary": "#E5EAEE", "success": "#08D1AD", "info": "#844AFF", "warning": "#F5CE01", "danger": "#FF3D60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#DEEDFF", "secondary": "#EBEDF3", "success": "#D6FBF4", "info": "#6125E1", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{url("assets/plugins/global/plugins.bundle.js")}}"></script>
<script src="{{url("assets/plugins/custom/prismjs/prismjs.bundle.js")}}"></script>
<script src="{{url("assets/js/scripts.bundle.js")}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{url("assets/plugins/custom/fullcalendar/fullcalendar.bundle.js")}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{url("assets/js/pages/widgets.js")}}"></script>
<script src="{{ asset('assets/js/lightbox/fslightbox.js') }}"></script>

<!--end::Page Scripts-->
</body>
</html>
