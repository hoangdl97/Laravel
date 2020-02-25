@extends('layouts.admin')
@section('title', 'Project')
@section('management', 'Manager Project')

@section('content')
<div class="d-flex col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a type="button" href="{{ route('project.create') }}" class="btn btn-success col-auto mr-auto">
        <span class="fa fa-plus mr-2"></span>Add
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="d-flex">
        <form class="form-inline" method="get" action="{{ route('project.search') }}">
            <div class="input-group input-group-sm">
                <table>
                    <th><input class="form-control" type="text" value="{{ request()->input('searchName') }}" placeholder="Name" aria-label="Search" name="searchName"></th>
                    <th><input class="form-control" type="text" value="{{ request()->input('searchLeader') }}" placeholder="Leader" aria-label="Search" name="searchLeader"></th>
                    <th><input class="form-control" type="text" value="{{ request()->input('searchStatus') }}" placeholder="Status" aria-label="Search" name="searchStatus"></th>
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
        <table class="table table-sm table-hover bg-light col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        @if (isset($projects))
        <tr class="thead-dark">
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Infomation</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Data</th>
            <th class="text-center">Status</th>
            <th class="text-center">Leader</th>
            <th class="text-center">Member</th>
            <th class="text-center">Customer</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($projects as $project)
        <tr>
            <td class="text-center">{{ $project->id }}</td>
            <td class="text-center">{{ $project->name }}</td>
            <td class="text-center">{{ $project->description }}</td>
            <td class="text-center">{{ $project->start_date }}</td>
            <td class="text-center">{{ $project->end_date }}</td>
            <td class="text-center">{{ $project->projectStatus->name }}</td>
            <td class="text-center">{{ $project->leader }}</td>
            <td class="text-center"></td>
            <td class="text-center">{{ $project->customer->name }}</td>
            <td class="d-flex justify-content-center">
                <a type="button" href="{{ route ('project.edit', $project->id) }}" class="btn btn-info d-flex">
                    <span class="fa fa-edit mr-2 mt-1"></span>Edit
                </a>
                &nbsp;
                <form action="{{ route('project.destroy', $project->id) }}" method="POST" accept-charset="utf-">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger d-flex"><span class="fa fa-trash-alt mr-2 mt-1"></span>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>
    <div class="d-flex justify-content-end">
        {{ $projects->appends($_GET)->links() }}
       
    </div>
    @endif
</div>
@endsection
