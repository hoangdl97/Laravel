@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="text-center">
        <h1><span class="fa fa-user-plus mr-2"></span>Add Project Status</h1>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-5 col-12 m-auto">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <form action="{{ route('projectstatus.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name :</label>
                            <div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Accept</button> &nbsp;
                            <a href="{{ route('projectstatus.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
