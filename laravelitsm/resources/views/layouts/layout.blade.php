
    <!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head><base href="">
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Fonts-->

    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{url("assets/plugins/custom/fullcalendar/fullcalendar.bundle.css") }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{url("assets/plugins/global/plugins.bundle.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{url("assets/plugins/custom/prismjs/prismjs.bundle.css")}}" rel="stylesheet" type="text/css" />
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

   <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
  <style>
    #loader_id{
        width:100%;
        height:100%;
        position:fixed;
        z-index:9999;
        background:url({{url("assets/media/loader.gif")}}) no-repeat center center rgba(0,0,0,0.25)
    }
</style>

<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="page-loading-enabled page-loading quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize aside-minimize-hoverable page-loading">
<div style="display: none;" id="loader_id" >
</div>

  @include('sweetalert::alert')
<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="index.html">
       <img alt="Logo" style="height:30px;;width:100px;" src="{{asset('assets/media/logos/XCMG_logo1.png')}}" /> 
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-5" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle-->
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
                        <!--end::Svg Icon-->
					</span>
        </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->

        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_brand">

                <!--begin::Logo-->
                <a href="index.html" class="brand-logo">
                     <img alt="Logo" style="height:30px;;width:100px;" src="{{asset('assets/media/logos/XCMG_logo1.png')}}" />  
                </a>

                <!--end::Logo-->
            </div>

            <!--end::Brand-->

            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">

                    <!--begin::Menu Nav-->
                    <ul class="menu-nav">
                        <li class="menu-item menu-item-active" aria-haspopup="true">
                            <a href="{{ route('user.home') }}" class="menu-link">
										<span class="svg-icon menu-icon">

											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>

                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-section">
                            <h4 class="menu-text">Services</h4>
                            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                        </li>
                        <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('user.ticket') }}" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">

											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>

                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-text">Tickets</span>
                            </a>
                        </li>
                      
                        <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('user.report') }}" class="menu-link menu-toggle">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-04-21-040700/theme/demo3/dist/../src/media/svg/icons/Files/Cloud-download.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M5.74714567,13.0425758 C4.09410362,11.9740356 3,10.1147886 3,8 C3,4.6862915 5.6862915,2 9,2 C11.7957591,2 14.1449096,3.91215918 14.8109738,6.5 L17.25,6.5 C19.3210678,6.5 21,8.17893219 21,10.25 C21,12.3210678 19.3210678,14 17.25,14 L8.25,14 C7.28817895,14 6.41093178,13.6378962 5.74714567,13.0425758 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M11.1288761,15.7336977 L11.1288761,17.6901712 L9.12120481,17.6901712 C8.84506244,17.6901712 8.62120481,17.9140288 8.62120481,18.1901712 L8.62120481,19.2134699 C8.62120481,19.4896123 8.84506244,19.7134699 9.12120481,19.7134699 L11.1288761,19.7134699 L11.1288761,21.6699434 C11.1288761,21.9460858 11.3527337,22.1699434 11.6288761,22.1699434 C11.7471877,22.1699434 11.8616664,22.1279896 11.951961,22.0515402 L15.4576222,19.0834174 C15.6683723,18.9049825 15.6945689,18.5894857 15.5161341,18.3787356 C15.4982803,18.3576485 15.4787093,18.3380775 15.4576222,18.3202237 L11.951961,15.3521009 C11.7412109,15.173666 11.4257142,15.1998627 11.2472793,15.4106128 C11.1708299,15.5009075 11.1288761,15.6153861 11.1288761,15.7336977 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.959697, 18.661508) rotate(-270.000000) translate(-11.959697, -18.661508) "/>
                                </g>
                            </svg><!--end::Svg Icon--></span>                                <span class="menu-text">Report</span>
                            </a>
                        </li>
                    </ul>

                    <!--end::Menu Nav-->
                </div>

                <!--end::Menu Container-->
            </div>

            <!--end::Aside Menu-->
        </div>

        <!--end::Aside-->
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <!--begin::Header Nav-->
                            <ul class="menu-nav">
                                <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active" data-menu-toggle="click" aria-haspopup="true">
                                    <a href="{{ route('user.home') }}" class="menu-link">
 <img alt="Logo" style="height:45px;;width:120px;" src="{{asset('assets/media/logos/XCMG_logo.png')}}" />                                        <!--<span class="menu-text">Dashboard</span>-->
                                        <i class="menu-arrow"></i>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Header Nav-->
                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar">
                        <div class="topbar-item ml-4">
                            <div class="btn btn-icon btn-light-primary h-40px w-40px p-0" id="kt_quick_user_toggle">
                                
                                <img src="{{ asset('assets/media/svg/avatars/004-boy-1.svg') }}" class="h-30px align-self-end" alt="" />
                            </div>

                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
                    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        @yield('subhead')
                        <!--end::Info-->
                        <!--begin::Toolbar-->
                        <!--end::Toolbar-->
                    </div>
                </div>
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    @yield('content')
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">User Profile
            <small class="text-muted font-size-sm ml-2">{{ $tktcount }} Tickets in Total</small></h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
    
                <div class="symbol-label" style="background-image:url('{{ asset('assets/media/svg/avatars/004-boy-1.svg') }}')"></div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">Name : {{ Auth::guard()->user()->name }}</a>
                <div class="text-muted mt-1">Profile : User</div>
                <div class="navi mt-1">
                    <a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary">{{ Auth::guard('web')->user()->email }}</span>
								</span>
                    </a>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <!--end::Separator-->
        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
         <!--   <a href="custom/apps/user/profile-1/personal-information.html" class="navi-item">-->
         <!--       <div class="navi-link">-->
         <!--           <div class="symbol symbol-40 bg-light mr-3">-->
         <!--               <div class="symbol-label">-->
									<!--<span class="svg-icon svg-icon-md svg-icon-danger">-->
										<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book2.svg-->
									<!--	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
									<!--		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
									<!--			<rect x="0" y="0" width="24" height="24" />-->
									<!--			<path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3" />-->
									<!--			<path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />-->
									<!--		</g>-->
									<!--	</svg>-->
                                        <!--end::Svg Icon-->
									<!--</span>-->
         <!--               </div>-->
         <!--           </div>-->
         <!--           <div class="navi-text">-->
         <!--               <div class="font-weight-bold">My Account</div>-->
         <!--               <div class="text-muted">Profile info-->
         <!--                   <span class="label label-light-danger label-inline font-weight-bold">update</span></div>-->
         <!--           </div>-->
         <!--       </div>-->
         <!--   </a>-->
            <!--end:Item-->
            <!--begin::Item-->
         <!--   <a href="custom/apps/user/profile-3.html" class="navi-item">-->
         <!--       <div class="navi-link">-->
         <!--           <div class="symbol symbol-40 bg-light mr-3">-->
         <!--               <div class="symbol-label">-->
									<!--<span class="svg-icon svg-icon-md svg-icon-success">-->
										<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
									<!--	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
									<!--		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
									<!--			<rect x="0" y="0" width="24" height="24" />-->
									<!--			<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />-->
									<!--			<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />-->
									<!--		</g>-->
									<!--	</svg>-->
                                        <!--end::Svg Icon-->
									<!--</span>-->
         <!--               </div>-->
         <!--           </div>-->
         <!--           <div class="navi-text">-->
         <!--               <div class="font-weight-bold">My Tasks</div>-->
         <!--               <div class="text-muted">Todo and tasks</div>-->
         <!--           </div>-->
         <!--       </div>-->
         <!--   </a>-->
            <!--end:Item-->
            <!--begin::Item-->
         <!--   <a href="custom/apps/user/profile-2.html" class="navi-item">-->
         <!--       <div class="navi-link">-->
         <!--           <div class="symbol symbol-40 bg-light mr-3">-->
         <!--               <div class="symbol-label">-->
									<!--<span class="svg-icon svg-icon-md svg-icon-primary">-->
										<!--begin::Svg Icon | path:assets/media/svg/icons/General/Half-star.svg-->
									<!--	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
									<!--		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
									<!--			<polygon points="0 0 24 0 24 24 0 24" />-->
									<!--			<path d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z" fill="#000000" opacity="0.3" />-->
									<!--			<path d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z" fill="#000000" />-->
									<!--		</g>-->
									<!--	</svg>-->
                                        <!--end::Svg Icon-->
									<!--</span>-->
         <!--               </div>-->
         <!--           </div>-->
         <!--           <div class="navi-text">-->
         <!--               <div class="font-weight-bold">My Events</div>-->
         <!--               <div class="text-muted">Logs and notifications</div>-->
         <!--           </div>-->
         <!--       </div>-->
         <!--   </a>-->
            <!--end:Item-->
            <!--begin::Item-->
         <!--   <a href="custom/apps/userprofile-1/overview.html" class="navi-item">-->
         <!--       <div class="navi-link">-->
         <!--           <div class="symbol symbol-40 bg-light mr-3">-->
         <!--               <div class="symbol-label">-->
									<!--<span class="svg-icon svg-icon-md svg-icon-info">-->
										<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
									<!--	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
									<!--		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
									<!--			<rect x="0" y="0" width="24" height="24" />-->
									<!--			<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />-->
									<!--			<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />-->
									<!--		</g>-->
									<!--	</svg>-->
                                        <!--end::Svg Icon-->
									<!--</span>-->
         <!--               </div>-->
         <!--           </div>-->
         <!--           <div class="navi-text">-->
         <!--               <div class="font-weight-bold">My Statements</div>-->
         <!--               <div class="text-muted">latest tasks and projects</div>-->
         <!--           </div>-->
         <!--       </div>-->
         <!--   </a>-->
            <!--end:Item-->
            <!--begin::Item-->
            <span class="navi-item mt-2">
						<span class="navi-link">
							<a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-3 px-6">Sign Out</a>
						</span>
                        <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
					</span>
            <!--end:Item-->
        </div>
        <!--end::Nav-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-7"></div>
        <!--end::Separator-->
        <!--begin::Notifications-->
       <!-- <div class="pt-5">-->
            <!--begin:Heading-->
       <!--     <h5 class="mb-7" style="color: black">Recent Notifications</h5>-->
            <!--end:Heading-->
            <!--begin::Item-->
       <!--     @foreach($messages as $message)-->
       <!--     <div class="bg-gray-100 d-flex align-items-center p-5 rounded gutter-b">-->
                <!--begin::Icon-->
       <!--         <div class="d-flex flex-center position-relative ml-4 mr-6 ml-lg-6 mr-lg-10">-->
							<!--<span class="svg-icon svg-icon-4x svg-icon-primary position-absolute opacity-15">-->
								<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-polygon.svg-->
							<!--	<svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 70 70" fill="none">-->
							<!--		<g stroke="none" stroke-width="1" fill-rule="evenodd">-->
							<!--			<path d="M28 4.04145C32.3316 1.54059 37.6684 1.54059 42 4.04145L58.3109 13.4585C62.6425 15.9594 65.3109 20.5812 65.3109 25.5829V44.4171C65.3109 49.4188 62.6425 54.0406 58.3109 56.5415L42 65.9585C37.6684 68.4594 32.3316 68.4594 28 65.9585L11.6891 56.5415C7.3575 54.0406 4.68911 49.4188 4.68911 44.4171V25.5829C4.68911 20.5812 7.3575 15.9594 11.6891 13.4585L28 4.04145Z" fill="#000000" />-->
							<!--		</g>-->
							<!--	</svg>-->
                                <!--end::Svg Icon-->
							<!--</span>-->
       <!--             <span class="svg-icon svg-icon-lg svg-icon-primary position-absolute">-->
								<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-done.svg-->
							<!--	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
							<!--		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
							<!--			<polygon points="0 0 24 0 24 24 0 24" />-->
							<!--			<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z M10.875,15.75 C11.1145833,15.75 11.3541667,15.6541667 11.5458333,15.4625 L15.3791667,11.6291667 C15.7625,11.2458333 15.7625,10.6708333 15.3791667,10.2875 C14.9958333,9.90416667 14.4208333,9.90416667 14.0375,10.2875 L10.875,13.45 L9.62916667,12.2041667 C9.29375,11.8208333 8.67083333,11.8208333 8.2875,12.2041667 C7.90416667,12.5875 7.90416667,13.1625 8.2875,13.5458333 L10.2041667,15.4625 C10.3958333,15.6541667 10.6354167,15.75 10.875,15.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />-->
							<!--			<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />-->
							<!--		</g>-->
							<!--	</svg>-->
                        <!--end::Svg Icon-->
							<!--</span>-->
       <!--         </div>-->
                <!--end::Icon-->
                <!--begin::Description-->
       <!--         @if(\Request::is('user/ticket/*'))-->
       <!--             <div class="ml-1">-->
       <!--                 <a href="{{ $message->ticket }}">-->
       <!--                     <h3 class="text-dark-75 font-weight-bolder font-size-lg">New Message in Ticket: {{ $message->ticket }}</h3>-->
       <!--                     <p class="m-0 text-dark-50 font-weight-bold">{{ $message->message }}</p>-->
       <!--                 </a>-->
       <!--             </div>-->
       <!--         @else-->
       <!--             <div class="ml-1">-->
       <!--                 <a href="ticket/{{ $message->ticket }}">-->
       <!--                     <h3 class="text-dark-75 font-weight-bolder font-size-lg">New Message in Ticket: {{ $message->ticket }}</h3>-->
       <!--                     <p class="m-0 text-dark-50 font-weight-bold">{{ $message->message }}</p>-->
       <!--                 </a>-->
       <!--             </div>-->
       <!--         @endif-->

                <!--end::Description-->
       <!--     </div>-->
       <!--     @endforeach-->

       <!-- </div>-->
        <!--end::Notifications-->
    </div>
    <!--end::Content-->
</div>
<!-- end::User Panel-->
<!--begin::Quick Panel-->
<!--end::Quick Panel-->
<!--begin::Chat Panel-->
<!--end::Chat Panel-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
</div>
<!--end::Scrolltop-->
<!--begin::Sticky Toolbar-->

<!--end::Sticky Toolbar-->
<!--begin::Demo Panel-->

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
<script src="{{url("assets/js/pages/features/file-upload/dropzonejs.js")}}"></script>
<script src="{{ asset('assets/js/pages/features/file-upload/image-input.js') }}"></script>

<script>
    function changeimage() {
        var src = URL.createObjectURL(event.target.files[0]);

        const lightbox = new FsLightbox();

        lightbox.props.sources = [src];
        lightbox.props.onInit = () => console.log('Lightbox initialized!');

        lightbox.open();
    }
</script>

<script>
    $('#exampleModalCenter').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var myid = button.data('myid');
        var modal = $(this);
        modal.find('.modal-body #myid').val(myid);
    })
</script>

<!--end::Body-->
</html>
