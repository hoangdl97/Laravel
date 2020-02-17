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
                            <div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $members->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <div>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $members->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone :</label>
                            <div>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $members->phone }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address :</label>
                            <div>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $members->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username :</label>
                            <div>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $members->username }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image :</label>
                            <div>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $members->image }}" required autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Position :</label>
                            <div>
                                <input id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" value="{{ $members->is_admin }}" required autocomplete="is_admin" autofocus>

                                @error('is_admin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password :</label>
                            <div>
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $members->password }}" required autocomplete="password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
