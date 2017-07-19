@extends('admin.index')
@section('content')
    <div class="page-header">
        <h1>Product <small>Add new product</small></h1>
    </div>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    @if(session('msg'))
        <div class="alert alert-danger">
            {{session('msg')}}
        </div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="{{route('product.create')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" required name="name">
        </div>
        <div class="form-group">
            <label for="des">Description:</label>
            <textarea class="form-control" name="description" id="des" required></textarea>
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="number" min="0" class="form-control" required name="price">
        </div>
        <div class="form-group">
            <label>Photo:</label>
            <input type="file" required min="0" name="photo">
        </div>
        <button type="submit" class="btn btn-default">Add new</button>
    </form>
@stop
