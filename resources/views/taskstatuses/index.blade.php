@extends('layouts.admin')
@section('title', 'Task Status')
@section('management', 'Manager Task Status')

@section('content')
<div class="d-flex col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a type="button" href="{{ route('taskstatus.create') }}" class="btn btn-success col-auto mr-auto">
        <span class="fa fa-plus mr-2"></span>Add
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="d-flex">
        <form class="form-inline" method="get" action="{{ route('taskstatus.search') }}">
            <div class="input-group input-group-sm">
                <table>
                    <th><input class="form-control" type="text" value="{{ request()->input('searchName') }}" placeholder="Name" aria-label="Search" name="searchName"></th>
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

    <table class="table table-sm table-hover bg-light w-25">
        <br>
        @if (isset($task_statuses))
        <tr class="thead-dark">
            <th class="text-center">Name</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($task_statuses as $taskstatus)
        <tr>
            <td class="text-center">{{ $taskstatus->name }}</td>
            <td class="d-flex justify-content-center">
                <a type="button" href="{{ route ('taskstatus.edit', $taskstatus->id) }}" class="btn btn-info d-flex">
                    <span class="fa fa-edit mr-2 mt-1"></span>Edit
                </a>
                &nbsp;
                <form action="{{ route('taskstatus.destroy', $taskstatus->id) }}" method="POST" accept-charset="utf-">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger d-flex"><span class="fa fa-trash-alt mr-2 mt-1"></span>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-end">
            {{ $task_statuses->appends($_GET)->links() }}
       
    </div>
    @endif
</div>
@endsection
