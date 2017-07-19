@extends('admin.index')
@section('content')
    <div class="table-responsive">
        <div class="page-header">
            <h1>Product
                <small>All product</small>
            </h1>
            <a href="{{route('product.create')}}" class="btn btn-primary">Add new</a>
        </div>
        @if(count($products) >0)
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td><img src="data:image/png;base64,{{$product->photo}}" alt="{{$product->name}}"
                                 height="80px"/></td>
                        <td class="center">
                            <a class="btn btn-danger" href="{{route('product.delete',['id'=> $product->id])}}"
                               onclick="return confirm('Are you sure you want to delete this product?');">
                                Delete
                            </a>
                        </td>
                        <td class="center">
                            <a class="btn btn-primary" href="{{route('product.edit',['id'=>$product->id])}}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <h2 class="alert alert-danger text-center">List product empty.</h2>
        @endif
    </div>
@stop
