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
                                <h3 class="card-label">All Tickets</h3>
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

                                            <a class="btn btn-sm btn-clean btn-icon del" data-value="{{ $con->id }}" title="Delete">
	                                                        <span class="svg-icon svg-icon-md">
	                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                                                    <rect x="0" y="0" width="24" height="24"/>
	                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
	                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
	                                                                </g>
	                                                            </svg>
	                                                        </span>
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
                                    text: "Your Ticket has been deleted!",
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
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        });
    </script>
@endsection


