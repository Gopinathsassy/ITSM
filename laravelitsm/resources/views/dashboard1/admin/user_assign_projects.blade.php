@extends('dashboard.admin.layout')

@section('content')
    <form class="container">
        <!--begin::Dashboard-->
        <form method="post">
            @csrf
        <!--begin::Row-->

        <div class="row">

            <div class="col">
                    <!--begin::Stats Widget 1-->
                    <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h3 class="card-label">Assign Project</h3>
                            </div>
                            <div class="card-toolbar">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col">
                                    <label class="form-control-label">Select Projects</label>
                                    <select class="form-control select2" id="select_project_user" name="select_project_user">
                                        <option ></option>
                                        @foreach($projects as $project)
                                            <option value="{{$project->id_project}}">{{$project->proj_code}}-{{$project->proj_name}} ({{$project->id_project}})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col"></div>

                            </div>
                            <!--end::Search Form-->
                            <br>


                                <div class="mb-7">
                                    <div class="row align-items-center">
                                        <div class="col-lg-9 col-xl-8">
                                            <div class="row align-items-center">
                                                <div class="col-md-4 my-2 my-md-0">
                                                    <div class="input-icon">
                                                        <input type="text" class="form-control" placeholder="Search User..." id="kt_datatable_search_query" />
                                                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#exampleModalCustomScrollable"> Show Assigned Users</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Search Form-->
{{--                                <!--end: Search Form-->--}}
                                <!--begin: Datatable-->
                                <!--<table class="table table-hover" id="kt_datatable">-->
                                <!--    <thead>-->
                                <!--    <tr>-->
                                <!--        <th>Select</th>-->
                                <!--        <th>User Name</th>-->
                                <!--        <th>Email</th>-->
                                <!--    </tr>-->
                                <!--    </thead>-->
                                <!--    <tbody class="tbodyyy" id="user_body_po">-->
                                <!--    @foreach($users as $user)-->
                                <!--        <tr>-->
                                <!--            <td ><label class="checkbox checkbox-circle checkbox-success"><input class="checkbox select_check_all_td" type="checkbox" name="Checkboxes4"/><span></span></label></td>-->
                                <!--            <td class="nameee"><span id="nameee">{{$user->name}}</span></td>-->
                                <!--            <td class="emailee"><span id="emailee">{{$user->email}}</span></td>-->
                                <!--        </tr>-->
                                <!--    @endforeach-->
                                <!--    </tbody>-->
                                <!--</table>-->
                                <!--end: Datatable-->

                            <!--end: Datatable-->

                            <div class="d-flex justify-content-center show_button">
                            <button style="display: none;" class="btn btn-primary btn-sm" type="button" id="save" name="save">Assign</button>
                            </div>

                         </div>
                        </div>
                    </div>
                    <!--end::Stats Widget 1-->
                </div>
            {{--Model Box--}}
                <div class="modal fade" id="exampleModalCustomScrollable" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Assigned Users</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div data-scroll="true" data-height="300">
                                    <div id="user_body_po11">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Email</th>
                                            </tr>
                                            </thead>
                                            <tbody class="tbodyyyeee" id="user_body_po1">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{--Model Box--}}
                        </form>
                        <script>
                            $(document).ready(function (){
                                $("#save").click(function () {
                                    $("#loader_id").show();
                                    $("#save").prop('disabled', true);

                                    var token = "{{ csrf_token() }}";
                                    var project_name = $("#select_project_user").val();

                                    var nameee = [];
                                    var emailee = [];

                                    $(":checkbox:checked").closest("tr").each(function (){
                                        nameee.push($(this).find("#nameee").html());
                                    });

                                    $(":checkbox:checked").closest("tr").each(function (){
                                        emailee.push($(this).find("#emailee").html());
                                    });

                                    // $(":checkbox:checked").closest("tr").each(function (){
                                    //     emailee.push($(this).find("#emailee").html());
                                    // });

                                    console.log(nameee);
                                    console.log(emailee);

                                    if(nameee.length !== 0  && emailee.length !== 0 && project_name !== "" ){
                                        $.ajax({
                                            method:'POST',
                                            url:"user_project_assign",
                                            data:{
                                                "_token": token,
                                                project_name: project_name,
                                                nameee: nameee,
                                                emailee: emailee
                                            },
                                            cache:false,
                                            success: function (inpuee) {
                                                console.log(inpuee);

                                                Swal.fire({
                                                    position: "center",
                                                    icon: "success",
                                                    title: "Project Assigned",
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                });

                                                $("#loader_id").hide();
                                                $("#save").prop('disabled', false);
                                                window.location.reload();
                                            },
                                            error: function(xhr, status, error){
                                                console.error(JSON.parse(xhr.responseText).error);
                                                Swal.fire({
                                                    position: "center",
                                                    icon: "error",
                                                    title: "Project Not Assigned",
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                });
                                                $("#loader_id").hide();
                                                $("#save").prop('disabled', false);
                                            }

                                        });
                                    }else{
                                        Swal.fire({
                                            position: "center",
                                            icon: "warning",
                                            title: "Please Select Atlease 1 User",
                                            showConfirmButton: false,
                                            timer: 1500
                                        });

                                        $("#save").prop('disabled', false);
                                        $("#loader_id").hide();
                                    }

                                });
                            });
                        </script>


{{--                        <script>--}}
{{--                            "use strict";--}}
{{--                            // Class definition--}}

{{--                            var KTDatatableHtmlTableDemo = function() {--}}
{{--                                // Private functions--}}

{{--                                // demo initializer--}}
{{--                                var demo = function() {--}}

{{--                                    var datatable = $('#kt_datatable').KTDatatable({--}}
{{--                                        data: {--}}
{{--                                            saveState: {cookie: false},--}}
{{--                                        },--}}
{{--                                        theme: 'bordered',--}}

{{--                                        search: {--}}
{{--                                            input: $('#kt_datatable_search_query'),--}}
{{--                                            key: 'generalSearch'--}}
{{--                                        },--}}
{{--                                        columns: [--}}
{{--                                            {--}}
{{--                                                field: 'Select',--}}
{{--                                                type: 'Select',--}}
{{--                                                width: 40,--}}
{{--                                                textAlign: 'center',--}}

{{--                                                autoHide: false,--}}

{{--                                            },--}}
{{--                                            {--}}
{{--                                                field: 'User Name',--}}
{{--                                                type: 'User Name',--}}
{{--                                                // width: 80,--}}
{{--                                                textAlign: 'center',--}}
{{--                                                autoHide: false,--}}
{{--                                            },--}}
{{--                                            {--}}
{{--                                                field: 'Email',--}}
{{--                                                type: 'Email',--}}
{{--                                                // width: 80,--}}
{{--                                                textAlign: 'center',--}}
{{--                                                autoHide: false,--}}
{{--                                            },--}}
{{--                                            {--}}
{{--                                                field: 'Department',--}}
{{--                                                type: 'Department',--}}
{{--                                                // width: 80,--}}
{{--                                                textAlign: 'center',--}}
{{--                                                autoHide: false,--}}
{{--                                            },--}}
{{--                                        ],--}}
{{--                                    });--}}

{{--                                    $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();--}}
{{--                                };--}}

{{--                                return {--}}
{{--                                    // Public functionsb--}}
{{--                                    init: function() {--}}
{{--                                        // init dmeo--}}
{{--                                        demo();--}}
{{--                                    },--}}
{{--                                };--}}
{{--                            }();--}}

{{--                            jQuery(document).ready(function() {--}}
{{--                                KTDatatableHtmlTableDemo.init();--}}
{{--                            });--}}

{{--                        </script>--}}

                        <script>
                            $(document).ready(function (){
                                $("#select_project_user").change(function () {
                                    var project_name = $(this).val();
                                    if(project_name !== "") {
                                        $(".select_check_all").prop("disabled", false);
                                        $(".select_check_all_td").prop("disabled", false);
                                        $("#save").show();
                                        $.ajax({
                                            method: "get",
                                            url: "check_email_project",
                                            data: {
                                                project_name: project_name
                                            },
                                            success: function (dataaq) {

                                                var dataa = dataaq[0];
                                                console.log(dataa);
                                                $.ajax({
                                                    method: "get",
                                                    url: "check_project",
                                                    data: {
                                                        project_name: project_name
                                                    },
                                                    success: function (dataa1) {
                                                        console.log(dataa1);

                                                        if(dataa1.length !== 0){
                                                            html ="";
                                                            var count = 1;
                                                            $.each(dataa1, function (i, dataaa1) {
                                                                html += '<tr id="table_row' + count + '">';
                                                                html += '<td class="nameee"><span>' + dataaa1.user_name + '</span></td>';
                                                                html += '<td class="nameee"><span>' + dataaa1.email + '</span></td>';
                                                                html += '</td>';
                                                                $('.tbodyyyeee').html(html);
                                                                count = count + 1;
                                                            });
                                                        }else{
                                                            $('.tbodyyyeee').html("No Employees Assigned");
                                                        }
                                                    }
                                                });


                                                if(dataa.length !== 0){
                                                    html ="";
                                                    var count = 1;
                                                    $.each(dataa, function (i, dataaa) {

                                                            html += '<tr id="table_row' + count + '">';
                                                        html += '<td><label class="checkbox checkbox-circle checkbox-success"><input class="checkbox select_check_all_td" type="checkbox" name="Checkboxes4"/><span></span></label></td>';
                                                        html += '<td class="nameee"><span id="nameee">' + dataaa+ '</span></td>';
                                                        html += '</td>';
                                                        $('.tbodyyy').html(html);
                                                        count = count + 1;
                                                    });
                                                }else{
                                                    $('.tbodyyy').html("No Employees Found");
                                                }
                                            }
                                        });
                                    }
                                });
                            });
                        </script>







    <!-- Button trigger modal-->

    <!-- Modal-->
@endsection


