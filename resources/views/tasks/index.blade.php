@extends('layouts.admin')
@section('title', 'Task')
@section('management', 'Manager Task')

@section('content')
<div class="d-flex col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a type="button" href="{{ route('task.create') }}" class="btn btn-success col-auto mr-auto">
        <span class="fa fa-plus mr-2"></span>Add
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="d-flex">
        <form class="form-inline" method="get" action="{{ route('task.search') }}">
            <div class="input-group input-group-sm">
                <table>
                    <th><input class="form-control" type="text" value="{{ request()->input('searchTask') }}" placeholder="Task" aria-label="Search" name="searchName"></th>
                    <th><input class="form-control" type="text" value="{{ request()->input('searchProject') }}" placeholder="Project" aria-label="Search" name="searchProject"></th>
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
        @if (isset($tasks))
        <tr class="thead-dark">
            <th class="text-center">ID</th>
            <th class="text-center">Task</th>
            <th class="text-center">Infomation</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Data</th>
            <th class="text-center">Status</th>
            <th class="text-center">Project</th>
            <th class="text-center">Member</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td class="text-center">{{ $task->id }}</td>
            <td class="text-center">{{ $task->name }}</td>
            <td class="text-center">{{ $task->description }}</td>
            <td class="text-center">{{ $task->start_date }}</td>
            <td class="text-center">{{ $task->end_date }}</td>
            <td class="text-center">{{ $task->taskStatus->name }}</td>
            <td class="text-center">{{ $task->project->name }}</td>
            <td class="text-center">{{ $task->member->name }}</td>
            <td class="d-flex justify-content-center">
                <a type="button" href="{{ route ('task.edit', $task->id) }}" class="btn btn-info d-flex">
                    <span class="fa fa-edit mr-2 mt-1"></span>Edit
                </a>
                &nbsp;
                <form action="{{ route('task.destroy', $task->id) }}" method="POST" accept-charset="utf-">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger d-flex"><span class="fa fa-trash-alt mr-2 mt-1"></span>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>
    <div class="d-flex justify-content-end">
        {{ $tasks->appends($_GET)->links() }}
    </div>
    @endif
</div>
@endsection
