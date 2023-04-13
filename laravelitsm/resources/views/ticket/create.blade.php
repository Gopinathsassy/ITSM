@extends('layouts.layout')

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
                            <h3 class="card-label">Create Ticket</h3>
                        </div>
                    </div>
                    <div class="card-body">

                        <form class="form" enctype="multipart/form-data" id="myformee" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tickettype">Ticket Type:</label>
                                        <select class="form-control " name="type" id="type">
                                            <option value="" disabled selected>Select Ticket Type</option>
                                            <option value="Incident">Incident</option>
                                            <option value="Service">Service Request</option>
                                            <option value="Change">Change Request</option>
                                        </select>
                                        <div id="type_error" class="invalid-feedback">Please Select the Ticket Type</div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="level">Select Level:</label>
                                        <select class="form-control" name="level" id="level">
                                            <option value="" disabled selected>Select Ticket Level</option>
                                            <option value="1">Level-1</option>
                                            <option value="2">Level-2</option>
                                            <option value="3">Level-3</option>
                                            <option value="4">Level-4</option>
                                        </select>
                                        <div style="display: none" id="level_error" class="invalid-feedback">Please Select the Select Level</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="severity">Ticket Severity:</label>
                                        <select class="form-control" name="severity" id="severity">
                                            <option value="" disabled selected>Select Ticket Severity</option>
                                            <option value="Critical">Critical</option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">low</option>
                                        </select>
                                        <div style="display: none" id="severity_error" class="invalid-feedback">Please Select the Select Level</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Summary:<span class="text-danger">*</span></label>
                                        <input type="text" id="summary" name="summary" placeholder="Summary" class="form-control " />
                                        <div style="display: none" id="summary_error" class="invalid-feedback">Please fill the summary</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" >Module Name:<span class="text-danger">*</span></label>
                                        <select class="form-control"  name="modulename" id="modulename">
                                            <option value="" disabled selected>Select Module Name</option>
                                            @foreach($modules as $module)
                                                <option value="{{ $module->name }}">{{ $module->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="display: none" id="module_error" class="invalid-feedback">Please Select the Module Name</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" >Responsible Person:<span class="text-danger">*</span></label>
                                        <select class="form-control" disabled name="responsible" id="responsible">
                                            <option value="" disabled selected>Assign Consultant</option>
                                            @foreach($consultants as $consultant)
                                                <option value="{{ $consultant->name }}" >{{ $consultant->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="display: none" id="reponsible_error" class="invalid-feedback">Please Select the Responsible Person</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Description:</label>
                                        <textarea class="form-control" name="description" id="description" placeholder="Description" rows="5"></textarea>
                                        <div style="display: none" id="description_error" class="invalid-feedback">Please fill the Description</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Select Project:</label>
                                        <select class="form-control" id="select_project" name="select_project">
                                            <option disabled selected>Select Project Name</option>
                                            @foreach($user_assign_projects as $user_assign_project)
                                            <option value="{{$user_assign_project->project_name}}">{{$user_assign_project->project_name}}</option>
                                            @endforeach
                                        </select>
                                        <div style="display: none" id="select_project_error" class="invalid-feedback">Please Select the Project</div>
                                    </div>
                                </div>
                                <div style="border-style: dotted; border-color: #EBEDF3" class="col">
                                    <div class="form-group ">
                                        <div class="image-input"  id="kt_image_2">
                                            <label class="form-control-label">Add Screenshot:</label>
                                            <div class="image-input-wrapper" style="background-image: url({{asset('assets/media/users/cam.png')}})"></div>

                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Screenshot">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_avatar" id="profile_avatar" onchange="changeimage()"  accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="profile_avatar_remove"/>
                                            </label>

                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                     <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button id="insert1" type="submit" class="btn btn-outline-success font-weight-bold mr-2">Create</button>
{{--                                <button id="submit" type="submit" class="btn btn-outline-success font-weight-bold mr-2"></button>--}}
                                <a href="{{ route('user.ticket') }}" class="btn btn-outline-dark font-weight-bold">Back</a>
                            </div>
                        </form>
                </div>
                </div>
                <!--end::Stats Widget 1-->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on("change","#modulename", function(){
                var module = $(this).val();
                $.ajax({
                    type:"get",
                    url:"module/"+module,
                    cache:false,
                    success: function (consultants) {
                        var dm='<option value="Un-Assigned">Un Assigned</option>';
                        $.each(consultants, function(i, consultant) {

                            dm += '<option value="'+consultant.name+'" >'+consultant.name+'</option>';
                        });
                        $('#responsible').html(dm);
                        $('#responsible').removeAttr('disabled');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#insert1").click(function (event) {
                    event.preventDefault();

               var type =  document.getElementById("type").value;
               var level =  document.getElementById("level").value;
               var severity =  document.getElementById("severity").value;
               var modulename =  document.getElementById("modulename").value;
               var responsible =  document.getElementById("responsible").value;
               var description =  document.getElementById("description").value;
               var summary =  document.getElementById("summary").value;
               var select_project =  document.getElementById("select_project").value;
// alert(responsible);
                if( summary !=="" && type !=="" && level !=="" && severity !=="" && modulename !=="" && responsible !=="" && description !=="" && select_project !==""){
                    // Get form
                    var form = $('#myformee')[0];
                    // Create an FormData object
                    var data = new FormData(form);

                    // disabled the submit button
                    $("#loader_id").show();
                    $("#insert1").prop("disabled", true);

                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: "create",
                        data: data,
                        processData: false,
                        contentType: false,
                        // async:false,
                        cache: false,
                        // global: false,
                        success: function (datae) {
                            $("#loader_id").hide();
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Ticket " +datae+ " has been Created",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.replace("/user/ticket");
                        },
                        error: function (datae) {
                            $("#loader_id").hide();
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Ticket Not Created",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#insert1").removeAttr("disabled", true);
                        }
                    });

                }
                else{
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Please fill all fields",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    if(type !=""){
                        $("#type_error").hide();
                        // $("#type").removeClass("is-invalid");
                        // $("#type").addClass("is-valid");
                    }
                    if(type ==="") {
                        $("#type_error").show();
                        // $("#type").removeClass("is-valid");
                        // $("#level").addClass("is-invalid");
                    }

                    if(level !=""){
                        $("#level_error").hide();
                        // $("#level").removeClass("is-invalid");
                        // $("#level").addClass("is-valid");
                    }
                    if(level ==="") {
                        $("#level_error").show();
                        // $("#level").removeClass("is-valid");
                        // $("#level").addClass("is-invalid");
                    }

                    if(select_project !=""){
                        $("#select_project_error").hide();
                        // $("#level").removeClass("is-invalid");
                        // $("#level").addClass("is-valid");
                    }
                    if(select_project ==="") {
                        $("#select_project_error").show();
                        // $("#level").removeClass("is-valid");
                        // $("#level").addClass("is-invalid");
                    }

                    if(description !=""){
                        $("#description_error").hide();
                        // $("#description").removeClass("is-invalid");
                        // $("#description").addClass("is-valid");
                    }
                    if(description ==="") {
                        $("#description_error").show();
                        // $("#description").removeClass("is-valid");
                        // $("#description").addClass("is-invalid");
                    }
                    if(severity !=""){
                        $("#severity_error").hide();
                        // $("#severity").removeClass("is-invalid");
                        // $("#severity").addClass("is-valid");
                    }
                    if(severity ==="") {
                        $("#severity_error").show();
                        // $("#severity").removeClass("is-valid");
                        // $("#severity").addClass("is-invalid");
                    }
                    if(modulename !=""){
                        $("#module_error").hide();
                        // $("#module").removeClass("is-invalid");
                        // $("#module").addClass("is-valid");
                    }
                    if(modulename ==="") {
                        $("#module_error").show();
                        // $("#module").removeClass("is-valid");
                        // $("#module").addClass("is-invalid");
                    }
                    if(reponsible !=""){
                        $("#reponsible_error").hide();
                        // $("#reponsible").removeClass("is-invalid");
                        // $("#reponsible").addClass("is-valid");
                    }
                    if(reponsible ==="") {
                        $("#reponsible_error").show();
                        // $("#reponsible").removeClass("is-valid");
                        // $("#reponsible").addClass("is-invalid");
                    }

                    if(summary !=""){
                        $("#summary_error").hide();
                        // $("#summary").removeClass("is-invalid");
                        // $("#summary").addClass("is-valid");
                    }
                    if(summary ==="") {
                        $("#summary_error").show();
                        // $("#summary").removeClass("is-valid");
                        // $("#summary").addClass("is-invalid");
                    }

                    $("#insert1").removeAttr("disabled", true);
                }


            });
        });

    </script>

@endsection


