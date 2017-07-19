@extends('admin.index')
@section('content')
    <div class="table-responsive">
        <div class="page-header">
            <h1>Product
                <small>All product</small>
            </h1>
        </div>
        <table class="table table-condensed">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>Test</td>
                <td>Test</td>
                <td>Test</td>
                <td>Test</td>
                <td>
                    <a class="btn btn-danger" href="#">Delete</a>
                    <a class="btn btn-default" href="{{route('product.edit',['id'=>1])}}">Edit</a>
                </td>
            </tr>
        </table>
    </div>
@stop
