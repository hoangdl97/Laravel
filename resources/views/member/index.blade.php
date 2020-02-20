@extends('layouts.admin')
@section('title', 'Members')
@section('management', 'Manager Members')

@section('content')
<div class="d-flex col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a type="button" href="{{ route('member.create') }}" class="btn btn-success col-auto mr-auto">
        <span class="fa fa-edit mr-2"></span>Add
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="d-flex">
        <form class="form-inline" method="get" action="{{ route('member.search') }}">
            <div class="input-group input-group-sm">
                <table>
                    <th><input class="form-control" type="text" placeholder="Name" aria-label="Search" name="searchName"></th>
                    <th><input class="form-control" type="text" placeholder="Email" aria-label="Search" name="searchEmail"></th>
                    <th><input class="form-control" type="text" placeholder="Phone" aria-label="Search" name="searchPhone"></th>
                    <th><input class="form-control" type="text" placeholder="Username" aria-label="Search" name="searchUser"></th>
                    <th>
                        <select name="searchPosition" class="form-control col-auto @error('is_admin') is-invalid @enderror" value="{{ old('is_admin') }}" autocomplete="is_admin">
                            <option></option>
                        @foreach (App\Models\Member::IS_ADMIN as $key => $value)
                            <option placeholder="Position" value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                        </select>
                    </th>
                    <th>
                        <button class="btn btn-navbar" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </th>
                </table>
            </div>
        </form>
    </div><br>
    @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show w-25" role="alert">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-sm table-hover bg-light">
        <br>
        @if (isset($members))
        <tr class="thead-dark">
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Address</th>
            <th class="text-center">Username</th>
            <th class="text-center">Password</th>
            <th class="text-center">Image</th>
            <th class="text-center">Position</th>
            <th class="text-center"></th>
        </tr>
        @foreach ($members as $member)
        <tr>
            <td class="text-center">{{ $member->id }}</td>
            <td class="text-center">{{ $member->name }}</td>
            <td class="text-center">{{ $member->email }}</td>
            <td class="text-center">{{ $member->phone }}</td>
            <td class="text-center">{{ $member->address }}</td>
            <td class="text-center">{{ $member->username }}</td>
            <td class="text-center">{{ $member->password }}</td>
            <td class="text-center"><img class="w-75" src="{{ asset("storage/uploads/$member->image") }}"></td>
            <td class="text-center">{{ $member->is_admin_label }}</td>
            <td class="text-center d-flex">
                <a type="button" href="{{ route ('member.edit', $member->id) }}" class="btn btn-warning">
                    <span class="fa fa-edit mr-2"></span>Edit
                </a>
                &nbsp;
                <form action="{{ route('member.destroy', $member->id) }}" method="POST" accept-charset="utf-">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><span class="fa fa-trash mr-2"></span>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-end">
            {{ $members->appends($_GET)->links() }}
       
    </div>
    @endif
</div>
@endsection
