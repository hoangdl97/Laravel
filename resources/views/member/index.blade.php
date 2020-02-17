@extends('layouts.admin')
@section('title', 'Members')
@section('management', 'Manager Members')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a type="button" href="{{ route('member.create') }}" class="btn btn-success">
        <span class="fa fa-edit mr-2"></span>Add
    </a>
    <br>
    <table class="table table-sm table-striped table-hover bg-light">
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
            <td class="text-center">{{ $member->image }}</td>
            <td class="text-center">{{ $member->is_admin_label }}</td>
            <td class="text-center d-flex">
                <a type="button" href="{{ route ('member.edit', $member->id) }}" class="btn btn-warning">
                    <span class="fa fa-edit mr-2"></span>Edit
                </a>
                &nbsp;
                <form action="{{ route('member.destroy', $member->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-end">
       {{ $members->links() }} 
       @else
            {{ $members->appends($_GET)->links() }}
       @endif
    </div>
</div>
@endsection
