@extends('admin.index')
@section('content')
    @if(isset($product))
        <div class="page-header">
            <h1>Product
                <small>Edit product- {{$product->name}}</small>
            </h1>
        </div>
        <form method="POST" enctype="multipart/form-data" action="{{route('product.edit.save',['id'=>$product->id])}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" required name="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="des">Description:</label>
                <textarea class="form-control" name="description" id="des" required>{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="number" min="0" class="form-control" required name="price" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label>Photo:</label>
                <input type="file" name="photo">
                <br>
                <img src="data:image/png;base64,{{$product->photo}}" alt="{{$product->name}}"
                     height="100px"/>
            </div>
            <button type="submit" class="btn btn-default">Save change</button>
        </form>
    @else
        <h2 class="alert alert-danger text-center">This product is not exist</h2>
    @endif
@stop
