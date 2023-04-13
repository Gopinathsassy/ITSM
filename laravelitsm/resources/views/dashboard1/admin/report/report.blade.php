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
                        <div class="card-title">

                            <div>
                                <div class="dropdown mr-1" >
                                    <label class="form-control-label"><span class="label label-dark label-inline mr-2">Daily Search</span></label>                                    <input class="form-control btn btn-light btn-shadow-hover" value="" type="date" id="dailyeee">
                                </div>
                            </div> &nbsp;&nbsp;&nbsp;

                            <div>
                                <div class="dropdown mr-1" >
                                    <label class="form-control-label"><span class="label label-dark label-inline mr-2">Monthly Search</span></label>
                                    <input class="form-control btn btn-light btn-shadow-hover" value="" type="month" id="monthlye">
                                </div>
                            </div> &nbsp;&nbsp;&nbsp;
                            <div>
                                <div class="dropdown mr-1" >
                                    <a href="#" id="searchee" class="btn btn-light-dark px-6 font-weight-bold">Search</a>
                                </div>
                            </div> &nbsp;&nbsp;&nbsp;


                        </div>

                        <div class="card-toolbar">
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="row align-items-center">


                                            <div class="card-toolbar">
                                                <!--begin::Dropdown-->
                                                <div class="dropdown dropdown-inline mr-2">

                                                    <button type="button" class="btn btn-light-dark font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-md">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
															<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>Export</button>
                                                    <!--begin::Dropdown Menu-->
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                        <!--begin::Navigation-->
                                                        <ul class="navi flex-column navi-hover py-2">
                                                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                                            <li class="navi-item">
                                                                <a class="navi-link">
                                                                                <span class="navi-icon">
                                                                                    <i class="la la-file-text-o"></i>
                                                                                </span>
                                                                    <span type="button" onclick="ExportToExcel()" class="navi-text">Excel</span>
                                                                </a>
                                                            </li>

                                                            <li class="navi-item">
                                                                <a  class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-pdf-o"></i>
																</span>
                                                                    <span type="button" onclick="generate()" class="navi-text">PDF</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <!--end::Navigation-->
                                                    </div>
                                                    <!--end::Dropdown Menu-->
                                                </div>
                                                <!--end::Dropdown-->
                                                <!--                                                            <a type="button" class="btn btn-warning" href="custom/apps/profile/profile_admin/timesheet_total_list.php">Back</a>-->

                                            </div>

                                        </div>

                                        <!--                                                    <div class="col-md-4 my-2 my-md-0">-->
                                        <!--                                                        <div class="d-flex align-items-center">-->
                                        <!--                                                        </div>-->
                                        <!--                                                    </div>-->
                                    </div>
                                </div>
                                <!--                                                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">-->
                                <!--                                                    <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>-->
                                <!--                                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="card-body cardee">
                        <!--begin: Search Form-->
                        <div class="row">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Client Name:</label>
                                    <select class="form-control kt_cname" id="kt_datatable_search_name">
                                        <option value="">All</option>
                                        @foreach($projects as $projecteee)
                                            <option value="{{ $projecteee->id_project}}" >{{ $projecteee->id_project}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Modules:</label>
                                    <select class="form-control kt_cname" id="kt_datatable_search_cname">
                                        <option value="">All</option>
                                        @foreach($modules as $module)
                                            <option value="{{ $module->name}}" >{{ $module->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">User:</label>
                                    <select class="form-control kt_cname" id="kt_datatable_search_user">
                                        <option value="">All</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->name}}" >{{ $user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Consultant:</label>
                                    <select class="form-control kt_cname" id="kt_datatable_search_consultant">
                                        <option value="">All</option>
                                        @foreach($consultants as $consultant)
                                            <option value="{{ $consultant->name}}" >{{ $consultant->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control kt_cname" id="kt_datatable_search_status">
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
                                <div class="input-icon">
                                    <span style="display: none" id="vieww" class="label label-light label-inline mr-2"></span>
                                    <input class="form-control" type="hidden" placeholder="Search..." id="kt_datatable_search_query" />
                                </div>
                            </div>


                        </div>
                        <br>
                        <!--begin::Search Form-->
                        <!--begin: Datatable-->
                        <table class="datatable table-bordered datatable-head-custom" id="kt_datatable">
                            <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Category</th>
                                <th>Summary</th>
                                <th>Create On</th>
                                <th>Assigned On</th>
                                <th>Completed On</th>
                                <th>Response Time</th>
                                <th>Resolution Time</th>
                                <th>Client Name</th>
                                <th>Modules</th>
                                <th>User</th>
                                <th>Consultant</th>
                                <th>Status</th>

                            </tr>
                            </thead>
                            <tbody style="display: block" id="tbodyy">
                            {{--                            $timestamp1 = strtotime($row["intime"]);--}}

                            @foreach($tickets as $ticket)

                                @php
                                    if ($ticket->acceptedat !=''){
                                        $create_date = strtotime($ticket->created_at);
                                    $accept_date = strtotime($ticket->acceptedat);
                                    $totalseconds = $accept_date - $create_date;
                                    $extraseconds = $totalseconds % 60;
                                    $totalminutes = ($totalseconds - $extraseconds) / 60;
                                    $extraminutes = $totalminutes % 60;
                                    $totalhours = ($totalminutes - $extraminutes) /60;
                                    if($extraseconds < 10){ $extraseconds = "0".$extraseconds;}
                                    if($extraminutes < 10){ $extraminutes = "0".$extraminutes;}
                                    if($totalhours < 10){ $totalhours = "0".$totalhours;}
                                    $response_time = $totalhours." hrs :".$extraminutes." min";
                                                                 }
                                                                 else{
                                                                    $response_time ='';
                                                                 }

                                    if ($ticket->completedat !='' && $ticket->acceptedat !=''){
                                    $create_date = strtotime($ticket->completedat);
                                    $accept_date = strtotime($ticket->acceptedat);
                                    $totalseconds = $create_date - $accept_date;
                                    $extraseconds = $totalseconds % 60;
                                    $totalminutes = ($totalseconds - $extraseconds) / 60;
                                    $extraminutes = $totalminutes % 60;
                                    $totalhours = ($totalminutes - $extraminutes) /60;
                                    if($extraseconds < 10){ $extraseconds = "0".$extraseconds;}
                                    if($extraminutes < 10){ $extraminutes = "0".$extraminutes;}
                                    if($totalhours < 10){ $totalhours = "0".$totalhours;}
                                    $resolution_time = $totalhours." hrs : ".$extraminutes." min";
                                    }else{
                                        $resolution_time ='';
                                    }

                                @endphp
                                <tr>
                                   <td>{{ $ticket->project }}_{{ $ticket->modulename }}_{{ date('my', strtotime($ticket->created_at)) }}_{{ $ticket->id }}</td>
                                    <td>{{ $ticket->type }} Request</td>
                                    <td>{{ $ticket->summary }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>{{ $ticket->acceptedat }}</td>
                                    <td>{{ $ticket->completedat }}</td>
                                    <td>{{ $response_time }}</td>
                                    <td>{{$resolution_time}}</td>
                                    <td >{{ $ticket->project }}</td>
                                    <td>{{ $ticket->modulename }}</td>
                                    <td>{{ $ticket->created_by }}</td>
                                    <td>{{ $ticket->responsible }}</td>
                                    <td>{{ $ticket->status }}</td>
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

    <script>

        $(document).ready(function () {
           $(document).on('click', '#searchee', function () {

               var dailyyy1 = document.getElementById("dailyeee").value;
               var mo = document.getElementById("monthlye").value;

               if(dailyyy1 !=""){
                   document.getElementById("kt_datatable_search_query").value =dailyyy1;
                   document.getElementById("kt_datatable_search_query").focus();
                   document.getElementById("dailyeee").value= "";
                   document.getElementById("monthlye").value= "";

                   var vieww = document.getElementById("vieww");
                   vieww.style.display="block";
                   document.getElementById("vieww").innerHTML=dailyyy1;

               }else if (mo !=""){
                   document.getElementById("kt_datatable_search_query").value =mo;
                   document.getElementById("kt_datatable_search_query").focus();
                   document.getElementById("monthlye").value= "";
                   document.getElementById("dailyeee").value= "";
                   var vieww = document.getElementById("vieww");
                   vieww.style.display="block";
                   document.getElementById("vieww").innerHTML=mo;

               }

               $('#kt_datatable_search_query').trigger(
                   jQuery.Event('keyup', { keyCode: 13 })
               );
           });
        });

    </script>

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
                            field: 'Ticket ID',
                            type: 'Ticket ID',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                             {
                            field: 'Category',
                            type: 'Category',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'Summary',
                            type: 'Summary',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'Response Time',
                            type: 'Response Time',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'Resolution Time',
                            type: 'Resolution Time',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'Completed On',
                            type: 'Completed On',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'Assigned On',
                            type: 'Assigned On',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'Create On',
                            type: 'Create On',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'Consultant',
                            type: 'Consultant',
                            textAlign: 'center',
                            visible : false,
                            autoHide: false,
                        },
                        {
                            field: 'User',
                            type: 'User',
                            textAlign: 'center',
                            visible : false,
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'Client Name',
                            type: 'Client Name',
                            textAlign: 'center',
                            visible : false,
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'Modules',
                            type: 'Modules',
                            textAlign: 'center',
                            visible : false,
                            autoHide: false,
                        },
                        {
                            field: 'created_by',
                            type: 'created_by',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                        {
                            field: 'responsible',
                            type: 'responsible',
                            textAlign: 'center',
                            width : 70,
                            autoHide: false,
                        },
                    
                        {
                            field: 'Status',
                            title: 'Status',
                            textAlign: 'center',
                            autoHide: false,
                            visible : false,
                            width : 70,

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
                        },
                    ],
                });


                $('#kt_datatable_search_name').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Client Name');
                });

                $('#kt_datatable_search_cname').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Modules');
                });

                $('#kt_datatable_search_user').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'User');
                });

                $('#kt_datatable_search_consultant').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Consultant');
                });

                $('#kt_datatable_search_status').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Status');
                });

                $('#kt_datatable_search_query').on('keyup', function() {
                    datatable.search($(this).val().toLowerCase(), 'Create On');
                });

                // datatable.search('2021-09-13', 'Create On');

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
    <script type="text/javascript">
        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('kt_datatable');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                XLSX.writeFile(wb, fn || ('Ticket Report.' + (type || 'xlsx')));
        }
    </script>

    <!--PDF Converter-->
    <script type="text/javascript">
        function generate() {
            var doc = new jsPDF('p', 'pt', 'letter');
            var htmlstring = '';
            var tempVarToCheckPageHeight = 0;
            var pageHeight = 0;
            pageHeight = doc.internal.pageSize.height;
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#bypassme': function(element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: 150,
                bottom: 60,
                left: 40,
                right: 40,
                width: 600
            };
            var y = 20;
            doc.setLineWidth(2);
            doc.text(200, y = y + 30, "Total Ticket Report");
            doc.autoTable({
                html: '#kt_datatable',
                startY: 70,
                theme: 'grid',
                // columnStyles: {
                //     0: {
                //         cellWidth: 50,
                //     },
                //     1: {
                //         cellWidth: 50,
                //     },
                //     2: {
                //         cellWidth: 50,
                //     }
                // },
                // styles: {
                //     minCellHeight: 40
                // }
            })
            doc.save('Total Ticket.pdf');
        }
    </script>
    <!--PDF Converter-->

@endsection


