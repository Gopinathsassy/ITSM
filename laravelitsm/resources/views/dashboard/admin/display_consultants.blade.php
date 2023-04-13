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
                                <h3 class="card-label">All Consultant</h3>
                            </div>
                            <div class="card-toolbar">
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                                    <span>
														<i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--end: Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable table-bordered  datatable-head-custom" id="kt_datatable">
                                <thead>
                                <tr>
                                    <th title="Field #1">ID</th>
                                    <th title="Field #2">User Name</th>
                                    <th title="Field #3">Email ID</th>
                                    <th title="Field #5">Created Date</th>
                                    <th title="Field #4">Department</th>
                                    <th title="Field #9">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($consultant as $con)
                                    <tr>
                                        <td>{{ $con->id }}</td>
                                        <td>{{ $con->name }}</td>
                                        <td>{{ $con->email }}</td>
                                        <td >{{ $con->created_at }}</td>
                                        <td>{{ $con->department }}</td>
                                        <td>
        <!--<a href="con/{{ $con->id }}" style="float:inherit; padding-right:55px;color:#3F4254;"  data-toggle="modal" data-cloc="{{ $con->name }}" data-cname="{{ $con->email }}" data-psp="{{ $con->created_at }}" data-ptype="{{ $con->department }}" data-myid="{{ $con->id }}" data-target="#exampleModalCenter_project" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">-->
	       <!--                                                 <span class="svg-icon svg-icon-md">-->
	       <!--                                                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="24px" viewBox="0 0 24 24" version="1.1">-->
	       <!--                                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
	       <!--                                                             <rect x="0" y="0" width="24" height="24"/>-->
	       <!--                                                             <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>-->
	       <!--                                                             <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>-->
	       <!--                                                         </g>-->
	       <!--                                                     </svg>-->
        <!--                                                    </span>-->
        <!--                                                    <label class="label font-weight-bold label-lg label-light-warning label-inline">Edit</label>-->
        <!--                                                </a>-->
                                            <a class="btn btn-sm btn-clean btn-icon del" style="float:inherit; padding-right:55px;color:#3F4254;" data-value="{{ $con->id }}" data-token="{{ csrf_token() }}" title="Delete">
	                                                        <span class="svg-icon svg-icon-md">
	                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                                                    <rect x="0" y="0" width="24" height="24"/>
	                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
	                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
	                                                                </g>
	                                                            </svg>
	                                                        </span>
<label class="label font-weight-bold label-lg label-light-danger label-inline"> Delete</label>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>
                    </div>
                    <!--end::Stats Widget 1-->
                </div>

        </div>

    </div>
    <!--@if($consultant->isEmpty())-->

    <!--@else-->

    <!--<form action="update/{{ $con->id }}" method="post">-->
    <!--    @csrf-->

    <!--<div class="modal fade" id="exampleModalCenter_project" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">-->
    <!--    <div class="modal-dialog modal-dialog-centered" role="document">-->
    <!--        <div class="modal-content">-->
    <!--            <div class="modal-header">-->
    <!--                <h5 class="modal-title">Update Project</h5>-->
    <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                    <i aria-hidden="true" class="ki ki-close"></i>-->
    <!--                </button>-->
    <!--            </div>-->


    <!--                <div class="modal-body">-->
    <!--                    <input type="hidden" name="myid" id="myid" value="">-->

    <!--                    <div class="row">-->
    <!--                        <div class="col">-->
    <!--                            <div class="form-group">-->
    <!--                                <label class="form-control-label">Project Name</label>-->
    <!--                                <input class="form-control" type="text" id="pname" name="pname">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="col">-->
    <!--                            <div class="form-group">-->
    <!--                                <label for="department">Project Code</label>-->
    <!--                                <input class="form-control" type="text" id="pcode" name="pcode">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="row">-->
    <!--                        <div class="col">-->
    <!--                            <div class="form-group">-->
    <!--                                <label class="form-control-label">Project Type</label>-->
    <!--                                <input class="form-control" type="text" id="ptype" name="ptype">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="col">-->
    <!--                            <div class="form-group">-->
    <!--                                <label for="department">Project Serial Profile</label>-->
    <!--                                <input class="form-control" maxlength="4"  onkeyup="this.value = this.value.toUpperCase();" type="text" id="psp" name="psp">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row">-->
    <!--                        <div class="col">-->
    <!--                            <div class="form-group">-->
    <!--                                <label class="form-control-label">Company Name</label>-->
    <!--                                <input class="form-control" type="text" id="cname" name="cname">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="col">-->
    <!--                            <div class="form-group">-->
    <!--                                <label for="department">Company Location</label>-->
    <!--                                <textarea class="form-control" type="text" id="cloc" name="cloc"></textarea>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->
    <!--                <div class="modal-footer">-->
    <!--                    <button type="submit" class="btn btn-primary">Update</button>-->
    <!--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->

    <!--                </div>-->


    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--</form>-->

    <!--@endif-->
    {{--    <form method="post" action="cancel/{{ $ticket->id }}">--}}



    {{--Model--}}

    <script>
        "use strict";
        // Class definition

        var KTDatatableHtmlTableDemo = function() {
            // Private functions

            // demo initializer
            var demo = function() {

                var datatable = $('#kt_datatable').KTDatatable({
                    data: {
                        saveState: {cookie: false},
                    },
                    theme: 'bordered',

                    search: {
                        input: $('#kt_datatable_search_query'),
                        key: 'generalSearch'
                    },
                    columns: [
                        {
                            field: 'ID',
                            type: 'number',
                            textAlign: 'center',
                        },
                        {
                            field: 'User Name',
                            type: 'name',
                            textAlign: 'center',
                        },
                        {
                            field: 'Email ID',
                            type: 'number',
                            textAlign: 'center',
                        },
                        {
                            field: 'Created Date',
                            type: 'Date',
                            textAlign: 'center',
                        },
                        {
                            field: 'Department',
                            type: 'Department',
                            textAlign: 'center',
                        },

                    ],
                });
                $('#kt_datatable_search_status').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Status');
                });

                $('#kt_datatable_search_type').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Level');
                });

                $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

            };

            return {
                // Public functionsb
                init: function() {
                    // init dmeo
                    demo();
                },
            };
        }();

        jQuery(document).ready(function() {
            KTDatatableHtmlTableDemo.init();
        });

    </script>
<script>
        $(document).on('click','.del',function(e) {
            var id = $(this).data("value");
            // alert(id);
            var token = $(this).data("token");
            alert(token);

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                reverseButtons: false
            }).then(function(result) {
                if (result.value) {
                    $.ajax(
                        {
                            url: "consultant/delete/"+id,
                            type: 'DELETE',
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'DELETE',
                                "_token": token,
                            },
                            success: function ()
                            {
                                Swal.fire({
                                    title: "Deleted",
                                    text: "Are you sure you want delete the user!",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer:1000
                                }).then(function () {
                                    location.reload();
                                });
                            }
                        });

                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "User was not deleted :)",
                        "error"
                    )
                }
            });
        });
    </script>
    <!--<script>-->
    <!--    $(document).on('click','.del',function(e) {-->
    <!--        var id = $(this).data("value");-->
            <!--// alert(id);-->
    <!--        var token = $(this).data("token");-->

    <!--        Swal.fire({-->
    <!--            title: "Are you sure?",-->
    <!--            text: "You want to be Delte  this consultant!",-->
    <!--            icon: "warning",-->
    <!--            showCancelButton: true,-->
    <!--            confirmButtonText: "Delete",-->
    <!--            cancelButtonText: "Cancel",-->
    <!--            reverseButtons: false-->
    <!--        }).then(function(result) {-->
    <!--            if (result.value) {-->
    <!--                $.ajax(-->
    <!--                    {-->
    <!--                        url: "consultant/delete/"+id,-->
    <!--                        type: 'DELETE',-->
    <!--                        dataType: "JSON",-->
    <!--                        data: {-->
    <!--                            "id": id,-->
    <!--                            "_method": 'DELETE',-->
    <!--                            "_token": token,-->
    <!--                        },-->
    <!--                        success: function ()-->
    <!--                        {-->
    <!--                            Swal.fire({-->
    <!--                                title: "Deleted",-->
    <!--                                text: "Your Ticket has been deleted!",-->
    <!--                                icon: "success",-->
    <!--                                showConfirmButton: false,-->
    <!--                                timer:1000-->
    <!--                            }).then(function () {-->
    <!--                                location.reload();-->
    <!--                            });-->
    <!--                        }-->
    <!--                    });-->

    <!--            } else if (result.dismiss === "cancel") {-->
    <!--                Swal.fire(-->
    <!--                    "Cancelled",-->
    <!--                    "Your imaginary file is safe :)",-->
    <!--                    "error"-->
    <!--                )-->
    <!--            }-->
    <!--        });-->
    <!--    });-->
    <!--</script>-->
@endsection


