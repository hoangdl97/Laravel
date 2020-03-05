@extends('layouts.admin')

@section('content')
    <div class="container">
    <div class="text-center">
        <h1><span class="fa fa-user-plus mr-2"></span>Edit Project</h1>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-5 col-12 m-auto">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <form action="{{ route('project.update', $project->id) }}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label>Name :</label>
                            <div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ (old('name')) ? old('name') : $project->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Infomation :</label>
                            <div>
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ (old('description')) ? old('description') : $project->description }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Start Date :</label>
                            <div>
                                <input id="start_date" type="text" class="datepicker form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ (old('start_date')) ? old('start_date') : $project->start_date }}" required autocomplete="start_date" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>End Date :</label>
                            <div>
                                <input id="end_date" type="text" class="datepicker form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ (old('end_date')) ? old('end_date') : $project->end_date }}" required autocomplete="end_date" autofocus>

                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status :</label>
                            <select class="form-control" name="project_status_id">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ ($status->id == old('status', $project->project_status_id)) ? 'selected': '' }}>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Leader :</label>
                            <select class="form-control" name="leader">
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ ($member->id == old('member', $project->leader)) ? 'selected': '' }}>{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Member :</label>
                            <select name="member_id[]" class="js-select2-multi form-control" multiple="multiple">
                                @foreach ($members as $member)
                                    <option {{ in_array($member->id, $project->member_ids) ? 'selected' : '' }} value="{{ $member->id }}"> {{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Customer :</label>
                            <select class="form-control" name="customer_id">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ ($customer->id == old('customer_id', $project->customer_id)) ? 'selected': '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Accept</button> &nbsp;
                            <a href="{{ route('project.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".js-select2-multi").select2();
            $( ".datepicker" ).datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endpush
@endsection
