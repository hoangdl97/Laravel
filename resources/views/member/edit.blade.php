@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Edit Member</h1>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-5 col-12 m-auto">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <form action="{{ route('member.update', $members->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" name="name" class="form-control" value="{{ $members->name }}"/>
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="text" name="email" class="form-control" value="{{ $members->email }}"/>
                        </div>
                        <div class="form-group">
                            <label>Phone :</label>
                            <input type="text" name="phone" class="form-control" value="{{ $members->phone }}"/>
                        </div>
                        <div class="form-group">
                            <label>Address :</label>
                            <input type="text" name="address" class="form-control" value="{{ $members->address }}"/>
                        </div>
                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" name="username" class="form-control" value="{{ $members->username }}"/>
                        </div>
                        <div class="form-group">
                            <label>Image :</label>
                            <input type="file" name="image" class="form-control" value="{{ $members->image }}"/>
                        </div>
                        <div class="form-group">
                            <label>Is_admin :</label>
                            <input type="number" name="is_admin" class="form-control" value="{{ $members->is_admin }}"/>
                        </div>
                        <div class="form-group">
                            <label>Password :</label>
                            <input type="text" name="password" class="form-control" value="{{ $members->password }}"/>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Accept</button> &nbsp;
                            <a href="{{ route('member.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
