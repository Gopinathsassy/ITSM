@extends('dashboard.admin.layout')

@section('content')
    <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Stats Widget 1-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">Create Projects</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('admin.createprojects') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Project Name:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="proj_name" value="{{ old('proj_name') }}" placeholder="Enter the Project Name">
                                        <span class="text-danger">@error('proj_name'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" >Project Code:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="proj_code" value="{{ old('proj_code') }}" placeholder="Enter the Project Code">
                                        <span class="text-danger">@error('proj_code'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Project Type</label>
                                        <input class="form-control" type="text" name="proj_type" value="{{ old('proj_type') }}" placeholder="Enter the Project Type">
                                        <span class="text-danger">@error('proj_type'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Company Name</label>
                                        <input class="form-control" type="text" name="company_name" value="{{ old('company_name') }}" placeholder="Enter Company Name">
                                        <span class="text-danger">@error('company_name'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Project Serial Profile</label>
                                        <input class="form-control" type="text" maxlength="4"  onkeyup="this.value = this.value.toUpperCase();" name="id_project" value="{{ old('id_project') }}" placeholder="Enter Project Name as short form">
                                        <span class="text-danger">@error('id_project'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="department">Company Location</label>
                                        <textarea class="form-control" type="textarea" name="company_location" value="{{ old('company_location') }}" style="width: 600px" placeholder="Enter the Company Location"></textarea>
                                        <span class="text-danger">@error('company_location'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-success font-weight-bold mr-2">Create</button>
                                <a href="{{ route('admin.home') }}" class="btn btn-outline-dark font-weight-bold">Back</a>
                            </div>
                        </form>
                </div>
                </div>
                <!--end::Stats Widget 1-->
            </div>
        </div>
    </div>
@endsection


