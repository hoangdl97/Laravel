@extends('layouts.admin')
@section('title', 'Customers')
@section('management', 'Manager Customer')

@section('content')
<div class="d-flex col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a type="button" href="{{ route('customer.create') }}" class="btn btn-success col-auto mr-auto">
        <span class="fa fa-user-plus mr-2"></span>Add
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="d-flex">
        <form class="form-inline" method="get" action="">
            <div class="input-group input-group-sm">
                <table>
                    <th><input class="form-control" type="text" value="{{ request()->input('searchName') }}" placeholder="Name" aria-label="Search" name="searchName"></th>
                    <th><input class="form-control" type="text" value="{{ request()->input('searchEmail') }}" placeholder="Email" aria-label="Search" name="searchEmail"></th>
                    <th><input class="form-control" type="text" value="{{ request()->input('searchPhone') }}" placeholder="Phone" aria-label="Search" name="searchPhone"></th>
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
        @if (isset($customers))
        <tr class="thead-dark">
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Email</th>
            <th class="text-center">Address</th>
            <th class="text-center">Image</th>
            <th class="text-center"></th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td class="text-center">{{ $customer->id }}</td>
            <td class="text-center">{{ $customer->name }}</td>
            <td class="text-center">{{ $customer->phone }}</td>
            <td class="text-center">{{ $customer->email }}</td>
            <td class="text-center">{{ $customer->address }}</td>
            <td class="text-center"><img class="w-25" src="{{ asset("storage/uploads/$customer->image") }}"></td>
            <td class="text-center d-flex">
                <a type="button" href="{{ route ('customer.edit', $customer->id) }}" class="btn btn-info d-flex">
                    <span class="fa fa-user-edit mr-2 mt-1"></span>Edit
                </a>
                &nbsp;
                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" accept-charset="utf-">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger d-flex"><span class="fa fa-user-times mr-2 mt-1"></span>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-end">
                {{ $customers->appends($_GET)->links() }}
        </div>
        @endif
    </div>
@endsection
