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
                                <h3 class="card-label">My Tickets</h3>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Dropdown-->
                                <!--end::Dropdown-->
                                <!--begin::Button-->
                                <a href="{{ route('user.ticket.create') }}" class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>New Ticket</a>
                                <!--end::Button-->
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
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                                    <select class="form-control" id="kt_datatable_search_status">
                                                        <option value="">All</option>
                                                        <option value="1">Open</option>
                                                        <option value="2">Assigned</option>
                                                        <option value="3">WIP</option>
                                                        <option value="4">Solution</option>
                                                        <option value="5">Closed</option>
                                                        <option value="6">Cancelled</option>
                                                        <option value="7">WUI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <label class="mr-3 mb-0 d-none d-md-block">Level:</label>
                                                    <select class="form-control" id="kt_datatable_search_type">
                                                        <option value="">All</option>
                                                        <option value="1">Level-1</option>
                                                        <option value="2">Level-2</option>
                                                        <option value="3">Level-3</option>
                                                        <option value="4">Level-4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
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
                                    <th title="Field #2">Date</th>
                                    <th title="Field #3">Type</th>
                                    <th title="Field #4">Summary</th>
                                    <th title="Field #5">Level</th>
                                    <th title="Field #6">Severity</th>
                                    <th title="Field #7">Responsible</th>
                                    <th title="Field #8">Status</th>
                                    <th title="Field #9">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tickets as $ticket)

                                    @if($ticket->created_by ==  Auth::guard('web')->user()->name )
                                        <tr>
                                            <td>{{ $ticket->project }}_{{ $ticket->modulename }}_{{ date('my', strtotime($ticket->created_at)) }}_{{ $ticket->id }}</td>
                                            <td>{{ $ticket->created_at }}</td>
                                            <td>{{ $ticket->type}} Request</td>
                                            <td>{{ $ticket->summary }}</td>
                                            <td class="text-right">{{ $ticket->level }}</td>
                                            <td>{{ $ticket->severity }}</td>
                                            <td>{{ $ticket->responsible }}</td>
                                            <td class="text-right">{{ $ticket->status }}</td>
                                            <td><div class="row">
                                                    <div class="col">
                                                        <a href="ticket/{{ $ticket->id }}" style="font-size: 12px;font-weight: bold;color:#2b2e32;" class="btn btn-sm btn-clean btn-icon mr-2 " title="Edit details">
	                                                        <span style="padding-left: 15px;font-weight: bolder;font-size: 20px;" class="svg-icon svg-icon-md">
	                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                                                    <rect x="0" y="0" width="24" height="24"/>
	                                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
	                                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
	                                                                </g>
	                                                            </svg>
                                                            </span>
                                                            
                                                            Edit
                                                        </a>
                                                        </div>
                                                    @if($ticket ->status == '1')
                                                    <div class="col">
                                                        <button data-myid="{{ $ticket->id }}" style="font-size: 12px;font-weight: bold; color:#2b2e32;" class="btn btn-sm btn-clean btn-icon " title="Cancel Ticket" data-toggle="modal" data-target="#exampleModalCenter">
	                                                   <span style="padding-left: 15px;font-weight: bolder;font-size: 20px;"  class="svg-icon svg-icon-md">
                                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                                <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                       </span>
                                                       Cancel
                                                        </button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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
                            width: 75,
                            textAlign: 'center',
                           autoHide: false,

                        },
                        {
                            field: 'Type',
                            type: 'Type',
                            width: 80,
                            textAlign: 'center',
                          autoHide: false,
                        },
                        {
                            field: 'Summary',
                            type: 'Summary',
                            textAlign: 'center',
                          autoHide: false,
                        },
                        {
                            field: 'Date',
                            type: 'date',
                            format: 'YYYY-MM-DD',
                            textAlign: 'center',
                          autoHide: false,
                        },
                        {
                            field: 'Severity',
                            type: 'Severity',
                            width: 80,
                            textAlign: 'center',
                          autoHide: false,
                        },
                        {
                            field: 'Responsible',
                            type: 'Responsible',
                            width: 80,
                            textAlign: 'center',
                          autoHide: false,
                        },
                        {
                            field: 'Status',
                            title: 'Status',
                            textAlign: 'center',
                            autoHide: false,
                            // callback function support for column rendering
                            template: function(row) {
                                var status = {
                                    1: {
                                        'title': 'Open',
                                        'class': ' label-light-success'
                                    },
                                    2: {
                                        'title': 'Assigned',
                                        'class': ' label-light-primary'
                                    },
                                    3: {
                                        'title': 'WIP',
                                        'class': ' label-light-warning'
                                    },
                                    4: {
                                        'title': 'Solution',
                                        'class': ' label-light-dark'
                                    },
                                    5: {
                                        'title': 'Closed',
                                        'class': ' label-light-danger'
                                    },
                                    6: {
                                        'title': 'Cancelled',
                                        'class': ' label-light-secondary text-secondary'
                                    },
                                    7: {
                                        'title': 'WUI',
                                        'class': ' label-dark text-white'
                                    }
                                };
                                return '<span class="label font-weight-bold label-lg' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                            },
                        }, {
                            field: 'Level',
                            title: 'Level',
                            textAlign: 'center',
                            autoHide: false,
                            // callback function support for column rendering
                            template: function(row) {
                                var status = {
                                    1: {
                                        'title': 'Level-1',
                                        'state': 'danger'
                                    },
                                    2: {
                                        'title': 'Level-2',
                                        'state': 'warning'
                                    },
                                    3: {
                                        'title': 'Level-3',
                                        'state': 'primary'
                                    },
                                    4: {
                                        'title': 'Level-4',
                                        'state': 'success'
                                    },
                                };
                                return '<span class="label label-' + status[row.Level].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' +status[row.Level].state + '">' +	status[row.Level].title + '</span>';
                            },
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
    <!-- Modal-->
    {{--    <form method="post" action="cancel/{{ $ticket->id }}">--}}

    <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                @if($tickets->isEmpty())

                @else
                    <form action="cancel/{{ $ticket->id }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden"  name="myid" id="myid" value="">
                            {{--                        <input  name="my_cancel" value="6">--}}
                            <input name="reson" placeholder="Enter your cancel reason" type="text" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </div>

    {{--Model--}}
@endsection


