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
                            <h3 class="card-label">Update Ticket Number </h3>
                            <span class="label pulse pulse-danger mr-10">
                                <span class="position-relative">{{ $ticket->id }}</span>
                                <span class="pulse-ring"></span>
                            </span>
                        </div>

                    </div>
                    <div class="card-body">
                        <form class="form" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="assigned">Assign Consultant:</label>
                                <select class="form-control" style="width: 300px" name="assigned" id="assigned">
                                    <option value="" disabled selected>Assign Consultant</option>
                                    @foreach($consultants as $consultant)
                                        <option value="{{ $consultant->name }}" {{ $consultant->name == $ticket->assignedto ? "selected" : '' }}>{{ $consultant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tickettype">Ticket Type:</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="Incident" {{ $ticket->type == "Incident" ? "selected" : '' }}>Incident</option>
                                            <option value="Service" {{ $ticket->type == "Service" ? "selected" : '' }}>Service Request</option>
                                            <option value="Change" {{ $ticket->type == "Change" ? "selected" : '' }}>Change Request</option>
                                        </select>
                                        <span class="text-danger">@error('type'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
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
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="ticketseverity">Ticket Severity:</label>
                                        <select class="form-control" name="severity" id="severity">
                                            <option value="Critical" {{ $ticket->severity == "Critical" ? "selected" : '' }}>Critical</option>
                                            <option value="High" {{ $ticket->severity == "High" ? "selected" : '' }}>High</option>
                                            <option value="Medium" {{ $ticket->severity == "Medium" ? "selected" : '' }}>Medium</option>
                                            <option value="Low" {{ $ticket->severity == "Low" ? "selected" : '' }}>low</option>
                                        </select>
                                        <span class="text-danger">@error('severity'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Summary:<span class="text-danger">*</span></label>
                                        <input type="text" id="summary" readonly name="summary" value="{{ $ticket->summary }}"  class="form-control" />
                                        <span class="text-danger">@error('summary'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" >Responsible Person:<span class="text-danger">*</span></label>
                                        <input type="text" id="responsible" readonly value="{{ $ticket->responsible }}" name="responsible" class="form-control"/>
                                        <span class="text-danger">@error('responsible'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                   <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" >Created By:<span class="text-danger">*</span></label>
                                        <input type="text" id="createdby" readonly value="{{ $ticket->created_by }}" name="createdby" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Description:</label>
                                        <textarea class="form-control" readonly name="description" id="kt_autosize_1" rows="5">{{ $ticket->description }}</textarea>
                                        <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        @if(file_exists( 'screenshots/'.$ticket->id.'.'.$ticket->fileformat))
                                            <div class="card card-custom overlay" style="width: 200px;">
                                                <div class="card-body p-0">
                                                    <a data-fslightbox href="{{ asset('screenshots/'.$ticket->id.'.'.$ticket->fileformat) }}">
                                                        <img src="{{ asset('screenshots/'.$ticket->id.'.'.$ticket->fileformat) }}" class="w-100 rounded"/>
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card card-custom overlay" >
                                                <div class="card-body p-0">
                                                    <span class="label label-primary label-inline font-weight-boldest mr-2">No Screenshots Available for this ticket</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-success font-weight-bold mr-2">Update</button>
                                <a href="{{ route('admin.ticket') }}" class="btn btn-outline-dark font-weight-bold">Back</a>
                            </div>
                        </form>
                </div>
                </div>
                <!--end::Stats Widget 1-->
            </div>

        </div>

    </div>
@endsection


