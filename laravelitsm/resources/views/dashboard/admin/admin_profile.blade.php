@extends('dashboard.admin.layout')

@section('content')


<!--        <div class="d-flex  mt-5" style="padding-left:30%;padding-top:10px;">-->
<!--            <div class="image-input image-input-outline" style="padding-left:70px;" id="kt_image_1">-->
<!-- <div class="image-input-wrapper" style="background-image: url(assets/media/users/150-1.jpg); "></div>-->

<!-- <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">-->
<!--  <i class="fa fa-pen icon-sm text-muted"></i>-->
<!--  <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>-->
<!--  <input type="hidden" name="profile_avatar_remove"/>-->
<!-- </label>-->

<!-- <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">-->
<!--  <i class="ki ki-bold-close icon-xs text-muted"></i>-->
<!-- </span>-->
<!--</div>-->
<!--            <div class="d-flex flex-column" style="padding-left:70px;padding-top:0px;color:#3F4254; ">-->
<!--                <a href="#" class=" text-dark-75 text-hover-primary" style="color:color:#3F4254;font-size:14px;padding-bottom:10px;font-weight:600">Name : {{ Auth::guard('admin')->user()->name }}</a>-->
                									
<!--                <div class="" style="color:color:#3F4254;font-size:14px;font-weight:600">Profile : Admin</div>-->
<!--                <span class="navi-text  text-hover-primary" style="color:color:#3F4254;font-size:14px;padding-top:10px;font-weight:600">Phone number :{{ Auth::guard('admin')->user()->phone }}</span>-->

<!--                <div class="navi mt-1">-->
<!--                    <a href="#" class="navi-item">-->
<!--								<span class="navi-link p-0 pb-2">-->
<!--									<span class="navi-icon mr-1">-->
<!--										<span class="svg-icon svg-icon-lg svg-icon-primary">-->
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
<!--											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
<!--												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
<!--													<rect x="0" y="0" width="24" height="24" />-->
<!--													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />-->
<!--													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />-->
<!--												</g>-->
<!--											</svg>-->
                                            <!--end::Svg Icon-->
<!--										</span>-->
<!--									</span>-->
<!--									<span class="navi-text  text-hover-primary"style="color:color:#3F4254;font-size:14px;padding-top:10px;font-weight:600">{{ Auth::guard('admin')->user()->email }}</span>-->
<!--								</span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<!--<div  class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">-->
						<!--	<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">-->
								<!--begin::Info-->
						<!--		<div class="d-flex align-items-center flex-wrap mr-1">-->
									<!--begin::Page Heading-->
									<!--<div class="d-flex align-items-baseline flex-wrap mr-5">-->
										<!--begin::Page Title-->
									<!--	<h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>-->
										<!--end::Page Title-->
									<!--</div>-->
									<!--end::Page Heading-->
						<!--		</div>-->
								<!--end::Info-->
								<!--begin::Toolbar-->
							
								<!--end::Toolbar-->
						<!--	</div>-->
						<!--</div>-->
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div  class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">


<div class="flex-row-fluid ml-lg-4">
										<!--begin::Card-->
										<div class="card card-custom card-stretch">
											<!--begin::Header-->
											<div class="card-header py-1">
											    
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder text-dark">Admin Information</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1">Update Admin personal information
													
													</span>
														<!--begin::Daterange-->
								
									<!--end::Daterange-->
												</div>
								
												<div class="card-toolbar">
												    	<a href="#" class="btn btn-fixed-height btn-bg-white btn-text-dark-50 btn-hover-text-primary btn-icon-primary font-weight-bolder font-size-sm px-5 my-1 mr-3" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="top">
										<span class="opacity-60 font-weight-bolder mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
										<span class="font-weight-bolder" id="kt_dashboard_daterangepicker_date">Aug 16</span>
									</a>
													<button type="button" class="btn btn-primary font-weight-bolder mr-2" id="admin_edit">Save Changes</button>
													<button type="reset" class="btn btn-light-primary font-weight-bolder">Cancel</button>
												</div>
												
											</div>
											<!--end::Header-->
											<!--begin::Form-->
							<form class="form" enctype='multipart/form-data' action="" method="POST" id="user_pic">
												<!--begin::Body-->
                                                <!--{% csrf_token %}-->
												<div class="card-body">
													<div class="row">
														<label class="col-xl-3"></label>
														<div class="col-lg-9 col-xl-6">
															<h5 class="font-weight-bold mb-6">Customer Info</h5>
														</div>
													</div>


												 <div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label text-right">Photo</label>
														<div class="col-lg-9 col-xl-6">
                                                            <!--{% if admin_edit_user_profile.user_image  != '' %}-->
															<!--<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(assets/media/users/blank.png)">-->


               <!--                                                 <div class="image-input-wrapper" style="background-image: url('')"> </div>-->
															<!--	<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">-->
															<!--		<i class="fa fa-pen icon-sm text-muted"></i>-->
															<!--		<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />-->
															<!--		<input type="hidden" name="profile_avatar_remove" />-->
															<!--	</label>-->
															<!--	<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">-->
															<!--		<i class="ki ki-bold-close icon-xs text-muted"></i>-->
															<!--	</span>-->
															<!--	<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">-->
															<!--		<i class="ki ki-bold-close icon-xs text-muted"></i>-->
															<!--	</span>-->
															<!--</div>-->
                                                            <!--{% else %}-->
                                                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(assets/media/users/blank.png)">
																<div class="image-input-wrapper" style="background-image: url('')"></div>
																<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
																	<i class="fa fa-pen icon-sm text-muted"></i>
																	<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
																	<input type="hidden" name="profile_avatar_remove" />
																</label>
																<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
																<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
															</div>

															<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
														</div>
													</div>
                                                      <div class="form-group row">
<!--{#														<label class="col-xl-3 col-lg-3 col-form-label text-right">ID </label>#}-->
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" name="id" id="id" type="hidden" value=""/>
<!--{#															<input class="form-control form-control-lg form-control-solid" name="profile_avatar" id="id" type="hidden" value=""/>#}-->
														</div>
													</div>
                                                     <div class="form-group row">
<!--{#														<label class="col-xl-3 col-lg-3 col-form-label text-right">ID </label>#}-->
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" name="password" id="password" type="hidden" value=""/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label text-right">User Name</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" name="username" id="username" type="text" value="{{ Auth::guard('admin')->user()->name }}" />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label text-right">Email ID</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" name="email" id="email" type="text" value="{{ Auth::guard('admin')->user()->email }}" />
														</div>
													</div>
                                               
                  



										
										
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label text-right">Mobile Number</label>
														<div class="col-lg-9 col-xl-6">
															<div class="input-group input-group-lg input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-phone"></i>
																	</span>
																</div>
																<input type="text" class="form-control form-control-lg form-control-solid" name="mobile_no" id="mobile_no" value="{{ Auth::guard('admin')->user()->phone }}" placeholder="Phone" />
															</div>
														</div>
													</div>
											
									
												</div>
												<!--end::Body-->
											</form>
											<!--end::Form-->
										</div>
									</div>



								<!--begin::Dashboard-->
								<!--begin::Row-->
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
<script>
    var avatar4 = new KTImageInput('kt_image_4');

avatar4.on('cancel', function(imageInput) {
 swal.fire({
  title: 'Image successfully canceled !',
  type: 'success',
  buttonsStyling: false,
  confirmButtonText: 'Awesome!',
  confirmButtonClass: 'btn btn-primary font-weight-bold'
 });
});

avatar4.on('change', function(imageInput) {
 swal.fire({
  title: 'Image successfully changed !',
  type: 'success',
  buttonsStyling: false,
  confirmButtonText: 'Awesome!',
  confirmButtonClass: 'btn btn-primary font-weight-bold'
 });
});

avatar4.on('remove', function(imageInput) {
 swal.fire({
  title: 'Image successfully removed !',
  type: 'error',
  buttonsStyling: false,
  confirmButtonText: 'Got it!',
  confirmButtonClass: 'btn btn-primary font-weight-bold'
 });
});
</script>
@endsection