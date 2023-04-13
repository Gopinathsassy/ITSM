<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head><base href="../../../">
    <meta charset="utf-8" />
    <title>User | Login</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('assets/css/pages/login/login-2.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <style>
        body {
            background-image: url({{ asset('assets/media/svg/illustrations/user.png') }});
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body>
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-column flex-column-fluid position-relative overflow-hidden" id="kt_login">
        <!--begin::Header-->
        <div class="login-header py-10 flex-column-auto">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between">
                <!--begin::Logo-->
                <a href="#" class="flex-column-auto py-5 py-md-0">
                   <img alt="Logo" style="height:50px;;width:130px;padding-top:13px;" src="{{asset('assets/media/logos/XCMG_logo.png')}}" />  
                </a>
                <!--end::Logo-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="login-body d-flex flex-column-fluid align-items-stretch justify-content-center">
            <div class="container row">
                <div class="col-lg-6 d-flex align-items-center">
                    <!--begin::Signin-->
                    <div class="login-form login-signin">
                        <!--begin::Form-->
                        <form class="form w-xxl-550px bg-white rounded-lg p-20" action="{{ route('user.check') }}" method="post" autocomplete="off">
                            @if(Session::get("Fail"))
                                <div class="alert alert-danger">
                                    {{ Session::get('Fail') }}
                                </div>
                        @endif
                        @csrf
                        <!--begin::Title-->
                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">User Login</h3>
                            </div>
                            <!--begin::Title-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark" for="email">Email</label>
                                <input class="form-control form-control-solid h-auto p-6 rounded-lg" type="text" name="email" value="{{ old('email') }}" placeholder="Enter the email" />
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5" for="password">Password</label>
                                </div>
                                <input class="form-control form-control-solid h-auto p-6 rounded-lg" type="password" name="password" value="{{ old('password') }}" placeholder="Enter the Password" />
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Action-->
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="login-footer py-10 flex-column-auto">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between">
                <div class="font-size-h6 font-weight-bolder order-2 order-md-1 py-2 py-md-0">
                    <span class="text-muted font-weight-bold mr-2">2021©</span>
                    <a href="https://innovasivtech.com" target="_blank" class="text-dark-50 text-hover-primary">Innovasiv Technologies</a>
                </div>
            </div>
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<script>var HOST_URL = "https://preview.keenthemes.com/keen/theme/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3E97FF", "secondary": "#E5EAEE", "success": "#08D1AD", "info": "#844AFF", "warning": "#F5CE01", "danger": "#FF3D60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#DEEDFF", "secondary": "#EBEDF3", "success": "#D6FBF4", "info": "#6125E1", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
