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
                            <h3 class="card-label">Update Ticket Number </h3>
                            <span class="label pulse pulse-danger mr-10">
                                <span class="position-relative">{{ $ticket->id }}</span>
                                <span class="pulse-ring"></span>
                            </span>
                            <span class="label label-secondary label-inline mr-2">{{ $ticket->project }}_{{ $ticket->modulename }}_{{ date('my', strtotime($ticket->created_at)) }}_{{ $ticket->id }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" enctype="multipart/form-data" action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Created on:</label>
                                        <input type="text" id="createdon" disabled name="createdon" value="{{ $ticket->created_at }}"  class="form-control" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Assigned on:</label>
                                        <input type="text" id="assignedon" disabled name="assignedon" value="{{ $ticket->assignedat }}"  class="form-control" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Completed on:</label>
                                        <input type="text" id="completedat" disabled name="completedat" value="{{ $ticket->completedat }}"  class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @if($ticket->status == '7')
                                    <div class="form-group">
                                        <label for="tickettype">Ticket Type:</label>
                                        <select  class="form-control" disabled name="type" id="type">
                                            <option value="Incident" {{ $ticket->type == "Incident" ? "selected" : '' }}>Incident</option>
                                            <option value="Service" {{ $ticket->type == "Service" ? "selected" : '' }}>Service Request</option>
                                            <option value="Change" {{ $ticket->type == "Change" ? "selected" : '' }}>Change Request</option>
                                        </select>
{{--                                        <input disabled type="text" id="type" name="type" value="{{ $ticket->type }}"  class="form-control" />--}}
                                        <span class="text-danger">@error('type'){{ $message }}@enderror</span>
                                    </div>
                                    @elseif($ticket->status == '2')
                                    <div class="form-group">
                                        <label for="tickettype">Ticket Type:</label>
                                        <select  class="form-control" name="type" id="type">
                                            <option value="Incident" {{ $ticket->type == "Incident" ? "selected" : '' }}>Incident</option>
                                            <option value="Service" {{ $ticket->type == "Service" ? "selected" : '' }}>Service Request</option>
                                            <option value="Change" {{ $ticket->type == "Change" ? "selected" : '' }}>Change Request</option>
                                        </select>
{{--                                        <input disabled type="text" id="type" name="type" value="{{ $ticket->type }}"  class="form-control" />--}}
                                        <span class="text-danger">@error('type'){{ $message }}@enderror</span>
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <label for="tickettype">Ticket Type:</label>
                                            <select class="form-control" name="type" id="type">
                                                <option value="Incident" {{ $ticket->type == "Incident" ? "selected" : '' }}>Incident</option>
                                                <option value="Service" {{ $ticket->type == "Service" ? "selected" : '' }}>Service Request</option>
                                                <option value="Change" {{ $ticket->type == "Change" ? "selected" : '' }}>Change Request</option>
                                            </select>
                                            <span class="text-danger">@error('type'){{ $message }}@enderror</span>
                                        </div>
                                    @endif
                                </div>

                                @if($ticket->time_app_status =='Approved')
                                <div class="col">
                                        <div class="form-group" >
                                            <label for="ticketlevel">Time Estimation:</label>
                                            <input readonly type="text" class="form-control" id="ctime" name="ctime" value="{{$ticket->change_time}}" >
                                            <span class="text-danger">@error('ctime'){{ $message }}@enderror</span>
                                        </div>

                                    </div>

                                @elseif($ticket->status =='7' and $ticket->type =='Change')
                                <div class="col">
                                        <div class="form-group" >
                                            <label for="ticketlevel">Time Estimation:</label>
                                            <input  type="text" class="form-control" id="ctime" name="ctime" value="{{$ticket->change_time}}" >
                                            <span class="text-danger">@error('ctime'){{ $message }}@enderror</span>
                                        </div>
                                    <label class="checkbox checkbox-outline checkbox-success">Approve &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" id="myCheck" onclick="myFunction()" />
                                        <input name="val_approve" id="approve" >
                                        <span></span>
                                    </label>
                                    </div>
                                @endif

                                <div class="col">
                                    @if($ticket->status == '7')
                                        <div class="form-group">
                                        <label for="ticketlevel">Select Level:</label>
                                        <select  class="form-control" disabled   name="level" id="level">
                                            <option value="1" {{ $ticket->level == "1" ? "selected" : '' }}>Level-1</option>
                                            <option value="2" {{ $ticket->level == "2" ? "selected" : '' }}>Level-2</option>
                                            <option value="3" {{ $ticket->level == "3" ? "selected" : '' }}>Level-3</option>
                                            <option value="4" {{ $ticket->level == "4" ? "selected" : '' }}>Level-4</option>
                                        </select>
{{--                                        <input disabled type="text" id="level" name="level" value="Level-{{ $ticket->level }}"  class="form-control" />--}}
                                        <span class="text-danger">@error('level'){{ $message }}@enderror</span>
                                    </div>
                                    @elseif($ticket->status == '2')
                                        <div class="form-group">
                                        <label for="ticketlevel">Select Level:</label>
                                        <select  class="form-control" name="level" id="level">
                                            <option value="1" {{ $ticket->level == "1" ? "selected" : '' }}>Level-1</option>
                                            <option value="2" {{ $ticket->level == "2" ? "selected" : '' }}>Level-2</option>
                                            <option value="3" {{ $ticket->level == "3" ? "selected" : '' }}>Level-3</option>
                                            <option value="4" {{ $ticket->level == "4" ? "selected" : '' }}>Level-4</option>
                                        </select>
{{--                                        <input disabled type="text" id="level" name="level" value="Level-{{ $ticket->level }}"  class="form-control" />--}}
                                        <span class="text-danger">@error('level'){{ $message }}@enderror</span>
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <label for="ticketlevel">Select Level:</label>
                                            <select class="form-control" name="level" id="level">
                                                <option value="1" {{ $ticket->level == "1" ? "selected" : '' }}>Level-1</option>
                                                <option value="2" {{ $ticket->level == "2" ? "selected" : '' }}>Level-2</option>
                                                <option value="3" {{ $ticket->level == "3" ? "selected" : '' }}>Level-3</option>
                                                <option value="4" {{ $ticket->level == "4" ? "selected" : '' }}>Level-4</option>
                                            </select>
                                            <span class="text-danger">@error('level'){{ $message }}@enderror</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col">
                                    @if($ticket->status == '7')
                                    <div class="form-group">
                                        <label for="ticketseverity">Ticket Severity:</label>
                                        <select  class="form-control" disabled name="severity" id="severity">
                                            <option value="Critical" {{ $ticket->severity == "Critical" ? "selected" : '' }}>Critical</option>
                                            <option value="High" {{ $ticket->severity == "High" ? "selected" : '' }}>High</option>
                                            <option value="Medium" {{ $ticket->severity == "Medium" ? "selected" : '' }}>Medium</option>
                                            <option value="Low" {{ $ticket->severity == "Low" ? "selected" : '' }}>low</option>
                                        </select>
{{--                                        <input disabled type="text" id="severity" name="severity" value="{{ $ticket->severity }}"  class="form-control" />--}}
                                        <span class="text-danger">@error('severity'){{ $message }}@enderror</span>
                                    </div>
                                    @elseif($ticket->status == '2')
                                    <div class="form-group">
                                        <label for="ticketseverity">Ticket Severity:</label>
                                        <select  class="form-control" name="severity" id="severity">
                                            <option value="Critical" {{ $ticket->severity == "Critical" ? "selected" : '' }}>Critical</option>
                                            <option value="High" {{ $ticket->severity == "High" ? "selected" : '' }}>High</option>
                                            <option value="Medium" {{ $ticket->severity == "Medium" ? "selected" : '' }}>Medium</option>
                                            <option value="Low" {{ $ticket->severity == "Low" ? "selected" : '' }}>low</option>
                                        </select>
{{--                                        <input disabled type="text" id="severity" name="severity" value="{{ $ticket->severity }}"  class="form-control" />--}}
                                        <span class="text-danger">@error('severity'){{ $message }}@enderror</span>
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label for="ticketseverity">Ticket Severity:</label>
                                        <select class="form-control" name="severity" id="severity">
{{--                                            <option value=" {{ $ticket->severity }}" {{ $ticket->severity }}>{{ $ticket->severity }}</option>--}}
                                            <option value="Critical" {{ $ticket->severity == "Critical" ? "selected" : '' }}>Critical</option>
                                            <option value="High" {{ $ticket->severity == "High" ? "selected" : '' }}>High</option>
                                            <option value="Medium" {{ $ticket->severity == "Medium" ? "selected" : '' }}>Medium</option>
                                            <option value="Low" {{ $ticket->severity == "Low" ? "selected" : '' }}>low</option>
                                        </select>
{{--                                        <span class="text-danger">@error('severity'){{ $message }}@enderror</span>--}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @if($ticket->status == '7')
                                    <div class="form-group">
                                        <label disabled class="form-control-label">Summary:<span class="text-danger">*</span></label>
                                        <input disabled type="text" id="summary" name="summary" value="{{ $ticket->summary }}"  class="form-control" />
                                        <span class="text-danger">@error('summary'){{ $message }}@enderror</span>
                                    </div>
                                    @elseif($ticket->status == '4')
                                    <div class="form-group">
                                        <label class="form-control-label">Summary:<span class="text-danger">*</span></label>
                                        <input disabled type="text" id="summary" name="summary" value="{{ $ticket->summary }}"  class="form-control" />
                                        <span class="text-danger">@error('summary'){{ $message }}@enderror</span>
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <label class="form-control-label">Summary:<span class="text-danger">*</span></label>
                                            <input  type="text" id="summary" name="summary" value="{{ $ticket->summary }}"  class="form-control" />
                                            <span class="text-danger">@error('summary'){{ $message }}@enderror</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col">
                                    @if($ticket->status == '7')
                                    <div class="form-group">
                                        <label class="form-control-label" >Responsible Person:<span class="text-danger">*</span></label>
                                        <select disabled class="form-control" style="width: 300px" name="responsible" id="responsible">
                                            <option value="" disabled selected>Assign Consultant</option>
                                            <option value="Un-Assigned"> Un-Assigned</option>
                                            @foreach($consultants as $consultant)
                                                <option value="{{ $consultant->name }}" {{ (($consultant->name == $ticket->responsible) || ($consultant->name == $ticket->assignedto)) ? "selected" : '' }}>{{ $consultant->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('responsible'){{ $message }}@enderror</span>
                                    </div>
                                    @elseif($ticket->status == '4')
                                    <div class="form-group">
                                        <label class="form-control-label" >Responsible Person:<span class="text-danger">*</span></label>
                                        <select disabled class="form-control" style="width: 300px" name="responsible" id="responsible">
                                            <option value="" disabled selected>Assign Consultant</option>
                                            <option value="Un-Assigned"> Un-Assigned</option>
                                            @foreach($consultants as $consultant)
                                                <option value="{{ $consultant->name }}" {{ (($consultant->name == $ticket->responsible) || ($consultant->name == $ticket->assignedto)) ? "selected" : '' }}>{{ $consultant->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('responsible'){{ $message }}@enderror</span>
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <label class="form-control-label" >Responsible Person:<span class="text-danger">*</span></label>
                                            <select class="form-control" style="width: 300px" name="responsible" id="responsible">
                                                <option value="" disabled selected>Assign Consultant</option>
                                                <option value="Un-Assigned"> Un-Assigned</option>
                                                @foreach($consultants as $consultant)

                                                    <option value="{{ $consultant->name }}" {{ (($consultant->name == $ticket->responsible) || ($consultant->name == $ticket->assignedto)) ? "selected" : '' }}>{{ $consultant->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('responsible'){{ $message }}@enderror</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @if($ticket->status == '7')
                                    <div class="form-group">
                                        <label disabled class="form-control-label">Description:</label>
                                        <textarea disabled class="form-control" id="description" name="description" id="kt_autosize_1" rows="5">{{ $ticket->description }}</textarea>
                                        <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                    </div>
                                    @elseif($ticket->status == '4')
                                    <div class="form-group">
                                        <label class="form-control-label">Description:</label>
                                        <textarea disabled class="form-control" id="description" name="description" id="kt_autosize_1" rows="5">{{ $ticket->description }}</textarea>
                                        <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                    </div>
                                        @else
                                        <div class="form-group">
                                            <label class="form-control-label">Description:</label>
                                            <textarea class="form-control" id="description" name="description" id="kt_autosize_1" rows="5">{{ $ticket->description }}</textarea>
                                            <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                        </div>
                                    @endif

                                </div>
                                <div class="col">
                                    <div  class="form-group">
                                        <div class="image-input"  id="kt_image_2">
                                            <label class="form-control-label">Screenshots:</label>
                                            <div class="image-input-wrapper" style="background-image: url({{ asset('screenshots/'.$ticket->id.'.'.$ticket->fileformat) }})"></div>

                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Screenshot">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_avatar" id="profile_avatar" onchange="changeimage()"  accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="profile_avatar_remove"/>
                                            </label>

                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                     <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>

                                        </div>
                                        <span class="text-danger">@error('profile_avatar'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                @if($ticket->status == '6')
                                    <div class="col">
                                        <label class="form-control-label">Cancel Reason:</label>
                                        <textarea readonly class="form-control">{{$ticket->cancel_reson}}</textarea>
                                    </div>

                                    @else
                                    <div class="col">
                                        <!-- Button trigger modal-->
                                        <div class="row">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usermodal">
                                                Attach Files
                                            </button>
                                        </div>
                                        <div class="row" style="margin-top: 20px">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#consultantmodal">
                                                Consultant Files
                                            </button>
                                        </div>
                                        <!-- Modal-->
                                    </div>

                                @endif


                                @if($ticket->status == '4' or $ticket->status == '5' or $ticket->status == '3' or $ticket->status == '7' )
                                    {{--                                    <div class="col">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label class="form-control-label">Solution:</label>--}}
                                    {{--                                            <textarea class="form-control" readonly name="solution" rows="5">{{ $ticket->solution }}</textarea>--}}
                                    {{--                                            <span class="text-danger">@error('solution'){{ $message }}@enderror</span>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="col">
                                        <div class="form-group">
                                            <button type="button" class="btn font-weight-bold btn-primary mr-2" data-toggle="modal" id="model" data-target="#kt_chat_modal">Solution @foreach($values as $value) <span style="display: none" class="label label-sm label-white ml-2 pending ">{{ $value->unread }}</span> @endforeach</button>
                                        </div>
                              @if( $ticket->status != '1')
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">User Solution:</label>
                                        <textarea class="form-control consulssss"  name="user_close_status" id="user_close_status" rows="5">{{ $ticket->user_close_status }}</textarea>
                                        <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                @endif
                                    </div>
                                @endif
                            </div>
                            
                            <div class="card-footer">
                                @if($ticket->status =='7')
                                    <button id="update" disabled type="submit" class="btn btn-outline-success font-weight-bold mr-2">Update</button>
{{--                                    <a id="cancel_ticket" disabled onclick="event.preventDefault();document.getElementById('logout-form').submit();"  class="btn btn-outline-danger font-weight-bold mr-2" title="Completed">Close Ticket</a>--}}
                                    <a href="{{ route('user.ticket') }}" class="btn btn-outline-dark font-weight-bold">Back</a>
                                @elseif($ticket->status == '4' || $ticket->status == '3' )
                                    <a id="cancel_ticket" data-value_ticket ="{{ $ticket->id }}"  disabled class="btn btn-outline-danger font-weight-bold mr-2" title="Completed">Close Ticket</a>
                                    <a href="{{ route('user.ticket') }}" class="btn btn-outline-dark font-weight-bold">Back</a>
                                @elseif($ticket->status == '5' || $ticket->status == '6')
                                    <a href="{{ route('user.ticket') }}" class="btn btn-outline-dark font-weight-bold">Back</a>
                                @elseif($ticket->status == '3')
{{--                                    <button type="submit" class="btn btn-outline-success font-weight-bold mr-2">Update</button>--}}
                                    <a href="{{ route('user.ticket') }}" class="btn btn-outline-dark font-weight-bold">Back</a>
                                @else
                                    <button id="update" type="submit" class="btn btn-outline-success font-weight-bold mr-2">Update</button>
                                    <a href="{{ route('user.ticket') }}" class="btn btn-outline-dark font-weight-bold">Back</a>
                                @endif
                            </div>
                            
                            
                               
                        </form>
                        <form id="close-form" action="completed/{{ $ticket->id }}" method="POST" style="display: none;">
                            @csrf
                            <textarea value="" name="user_close_status1" id="user_close_status1" required></textarea>
                        </form>
                </div>
                </div>
                <!--end::Stats  Widget 1-->
            </div>

        </div>

    </div>
	<div class="modal fade" id="usermodal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Attachments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div data-scroll="true" data-height="600">
                        <div class="container">
							@if($ticket->status != '5')
                            <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                                <div class="dropzone-panel mb-lg-0 mb-2">
                                    <a class="dropzone-select btn btn-light-primary font-weight-bold btn-sm">Attach files</a>
                                    <a class="dropzone-upload btn btn-light-primary font-weight-bold btn-sm">Upload All</a>
                                    <a class="dropzone-remove-all btn btn-light-primary font-weight-bold btn-sm">Remove All</a>
                                </div>
                                <div class="dropzone-items">
                                    <div class="dropzone-item" style="display:none">
                                        <div class="dropzone-file">
                                            <div class="dropzone-filename">
                                                <span data-dz-name=""></span>
                                                <strong>(
                                                    <span data-dz-size="">340kb</span>)</strong>
                                            </div>
                                            <div class="dropzone-error" data-dz-errormessage=""></div>
                                        </div>
                                        <div class="dropzone-progress">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                            </div>
                                        </div>
                                        <div class="dropzone-toolbar">
																			<span class="dropzone-start">
																				<i class="flaticon2-arrow"></i>
																			</span>
                                            <span class="dropzone-cancel" data-dz-remove="" style="display: none;">
																				<i class="flaticon2-cross"></i>
																			</span>
                                            <span class="dropzone-delete" data-dz-remove="">
																				<i class="flaticon2-cross"></i>
																			</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
                            <hr>
                          	@endif
                           <div class="filesuploaded">
                                @foreach($userfiles as $userfile)
                                   <p style="font-weight:600;font-size:13px;"> Download File
                                    <a href="download/{{$ticket->id}}/{{ basename($userfile) }}" class="label label-pill label-inline" style="margin-top: 3px;font-size:13px;padding-top:15px;padding-bottom:15px; color:#3F4254">{{ basename($userfile) }}</a>
                                    </p>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="consultantmodal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Consultant Attachments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div data-scroll="true" data-height="600">
                        <div class="container">
                               <div class="filesuploaded" id="filesuploaded">
                                @foreach($consultantfiles as $consultantfile)
                                <p style="font-weight:600;font-size:13px;"> Download File
                                    <a href="download/{{$ticket->id}}/{{ basename($consultantfile) }}" class="label label-pill label-inline" style="margin-top: 3px;font-size:13px;padding-top:15px;padding-bottom:15px; color:#3F4254">{{ basename($consultantfile) }}</a>
                                    </p>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-4 py-3">
                        <div class="text-left flex-grow-1">
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown dropdown-inline">
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <div class="text-center flex-grow-1">
                            <div class="text-dark-75 font-weight-bold font-size-h5">{{ $ticket->id }}</div>
                        </div>
                        <div class="text-right flex-grow-1">
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
                                <i class="ki ki-close icon-1x"></i>
                            </button>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Scroll-->
                        <div class="scroll scroll-pull scroll" id="poke" data-height="375" data-mobile-height="300">
                            <!--begin::Messages-->
                            <div class="messages" id="messages">

                            </div>
                            <!--end::Messages-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    @if($ticket->status != '5')
                    <div class="card-footer align-items-center">
                        <!--begin::Compose-->
                        <textarea class="form-control" id="sendmessage" placeholder="Type a Messange"></textarea>
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <div class="mr-3">
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold py-2 px-6" id="msend">Send</button>
                            </div>
                        </div>
                        <!--begin::Compose-->
                    </div>
                    @endif
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            $(document).on("keyup", "#user_close_status", function (){
                var valuee = $(this).val();
                $("#user_close_status1").val(valuee);
                
            });
        });
    </script>

    <script>
        $(document).ready(function(){
           $(document).on("click", "#cancel_ticket", function (){
               
              var type =  document.getElementById("user_close_status1").value;
                  
                       if( type !=="" ){
                     
                       Swal.fire({
                       title: "solution for   ticket?",
                       text: "Are You Ok with this Solution",
                       icon: "warning",
                       showCancelButton: true,
                       confirmButtonText: "Yes, Close it!",
                       cancelButtonText: "No, cancel!",
                       reverseButtons: true
                       }).then(function(result) {
                       if (result.value) {
                           Swal.fire(
                               "Closed!",
                               "Your Ticket has been Closed.",
                               "success"
                           )
                           document.getElementById('close-form').submit();
                       } else if (result.dismiss === "cancel") {
                           Swal.fire(
                               "Cancelled",
                               "You are cancelled the Ticket :)",
                               "error"
                           )
                       }
                   });
                              }  
                              else{
                                  Swal.fire(
                               "warning",
                               "Please enter User solution for the  ticket!",
                               "error"
                           )
                                //   alert("please fill details");
                              }
                            //   }
       
               
               // $("#kt_sweetalert_demo_9").click(function(e) {
  
               // });
           });
        });
    </script>

    <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            if (checkBox.checked == true){
                $("#ctime").attr("readonly", "readonly");
                // $("#ctime").attr("readonly", "readonly");

                $("#update").removeAttr("disabled");
                // $("#type").attr("disabled", "disabled");
                // $("#responsible").attr("disabled", "disabled");
                // $("#cancel_ticket").attr("disabled", "disabled");

            }else{
                $("#ctime").removeAttr("readonly");
                $("#update").attr("disabled", "disabled");
                // $("#type").removeAttr("disabled");
                // $("#responsible").removeAttr("disabled");

            }
        }
    </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        var receiver = '{{ $ticket->responsible }}';
        var sender = '{{ Auth::guard()->user()->name }}';
        var ticket = '{{ $ticket->id }}';
        var token = "{{ csrf_token() }}";
        var dm = '';
        $(document).ready(function () {

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('e0a3f597735bce7a83bb', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                // alert(JSON.stringify(data));

                if (sender === data.from && ticket === data.ticket){
                    $('#model').click();
                    $('#model').click();
                }else if (sender === data.to ){
                    if (ticket === data.ticket){
                        $('#model').click();
                        var pending = parseInt($('#model').find('.pending').html());
                        if (pending){
                            $("#model").find('.pending').html(pending +1);
                        }else {
                            $("#model").html('Solution<span class="label label-sm label-white ml-2 pending">1</span>');
                        }
                        $('#model').click();
                    }
                }
            });

            $("#model").click(function () {
                dm='';
                $.ajax({
                    type:"get",
                    url:"message/"+ticket,
                    data:{
                        "receiver":receiver,
                        "sender":sender,
                    },
                    cache:false,
                    success: function (messages) {
                        dm='';
                        $.each(messages, function(i, message) {

                            var mdate = new Date(message.created_at).toLocaleDateString();
                            var mtime = new Date(message.created_at).toLocaleTimeString();
                            var mdatetime = mdate+' '+mtime;

                            dm += '<div class="'+(message.from === sender ? "d-flex flex-column mb-5 align-items-end" : "d-flex flex-column mb-5 align-items-start")+'">'+
                                '<div class="d-flex align-items-center">'+
                                '<div>'+
                                '<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">'+message.from+'</a>'+
                                '</div>'+
                                '</div>'+
                                '<div class="'+(message.from === sender ? "mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px" : "mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px")+'">'+message.message+'</div><span class="text-muted font-size-sm">'+mdatetime+'</span></div>';
                        });
                        dm=dm.replace(/\n/g,"<br>");
                        $('#messages').html(dm);
                        updateScroll();
                    }
                });
            });

            $(document).on('click','#msend',function (e) {
                var message = $('#sendmessage').val();
                $('#sendmessage').val('');

                $.ajax({
                    type:"post",
                    url:"message/"+ticket,
                    data:{
                        "_token": token,
                        "sender":sender,
                        "receiver":receiver,
                        "ticket":ticket,
                        "message":message,
                    },
                    cache:false,
                    success: function () {


                    },
                    error: function (jqXHR, status, err) {

                    },
                    complete:function () {
                        updateScroll();
                    }
                });
            });
        });

        function updateScroll(){
            var element = document.getElementById("poke");
            element.scrollTop = element.scrollHeight;
        }
    </script>
<script>
        $(document).ready(function () {
            var id = '#kt_dropzone_4';

            // set the preview element template
            var previewNode = $(id + " .dropzone-item");
            previewNode.id = "";
            var previewTemplate = previewNode.parent('.dropzone-items').html();
            previewNode.remove();

            var myDropzone4 = new Dropzone(id, { // Make the whole body a dropzone
                url: "dropzone/store/"+{{$ticket->id}}, // Set the url for your upload script location
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                maxFilesize: 5, // Max filesize in MB
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: id + " .dropzone-items", // Define the container to display the previews
                clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
                headers: {
                    'x-csrf-token': $('meta[name="csrf-token"]').attr('content'),
                },
            });

            myDropzone4.on("addedfile", function(file) {
                // Hookup the start button
                file.previewElement.querySelector(id + " .dropzone-start").onclick = function() {
                    myDropzone4.enqueueFile(file);
                };
                $(document).find( id + ' .dropzone-item').css('display', '');
                $( id + " .dropzone-upload, " + id + " .dropzone-remove-all").css('display', 'inline-block');
            });

            // Update the total progress bar
            myDropzone4.on("totaluploadprogress", function(progress) {
                $(this).find( id + " .progress-bar").css('width', progress + "%");
            });

            myDropzone4.on("sending", function(file) {
                // Show the total progress bar when upload starts
                $( id + " .progress-bar").css('opacity', '1');
                // And disable the start button
                file.previewElement.querySelector(id + " .dropzone-start").setAttribute("disabled", "disabled");
            });

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone4.on("complete", function(progress) {
                var thisProgressBar = id + " .dz-complete";
                setTimeout(function(){
                    $( thisProgressBar + " .progress-bar, " + thisProgressBar + " .progress, " + thisProgressBar + " .dropzone-start").css('opacity', '0');
                }, 300)
                $.ajax({
                    type:"get",
                    url:"getuploadedfiles/"+{{ $ticket->id }},
                    cache:false,
                    success: function (userfiles) {
                        dm='';
                        $.each(userfiles, function(i, userfile) {
                            dm += '<a href="download/{{$ticket->id}}/'+userfile+'" class="label label-pill label-inline" style="margin-top: 5px">'+userfile+'</a></br>';
                        });
                        $('#filesuploaded').html(dm);
                    }
                });
                 window.location.reload();
            });

            // Setup the buttons for all transfers
            document.querySelector( id + " .dropzone-upload").onclick = function() {
                myDropzone4.enqueueFiles(myDropzone4.getFilesWithStatus(Dropzone.ADDED));
            };

            // Setup the button for remove all files
            document.querySelector(id + " .dropzone-remove-all").onclick = function() {
                $( id + " .dropzone-upload, " + id + " .dropzone-remove-all").css('display', 'none');
                myDropzone4.removeAllFiles(true);
            };

            // On all files completed upload
            myDropzone4.on("queuecomplete", function(progress){
                $( id + " .dropzone-upload").css('display', 'none');
                $.ajax({
                    type:"get",
                    url:"getuploadedfiles/"+{{ $ticket->id }},
                    cache:false,
                    success: function (userfiles) {
                        dm='';
                        $.each(userfiles, function(i, userfile) {
                            dm += '<a href="download/{{$ticket->id}}/'+userfile+'" class="label label-pill label-inline" style="margin-top: 5px">'+userfile+'</a></br>';
                        });
                        $('#filesuploaded').html(dm);
                    }
                });
            });

            // On all files removed
            myDropzone4.on("removedfile", function(file){
                if(myDropzone4.files.length < 1){
                    $( id + " .dropzone-upload, " + id + " .dropzone-remove-all").css('display', 'none');
                }
            });
        });

    </script>
@endsection


