@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($products)>0)
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="thumbnail">
                                <img src="data:image/png;base64,{{$product->photo}}" alt="{{$product->name}}">
                                <div class="caption">
                                    <h3 class="text-center">{{$product->name}}</h3>
                                    <p class="text-right">{{$product->price}}$</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{$product->description}}
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2>NNNNNN</h2>
        @endif
    </div>
@endsection
