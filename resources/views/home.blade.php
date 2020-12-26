@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-4 text-center mt-3" style="background-color: #d9d9d9; border: 1px solid black;">
                    <a href="{{ route('single.product.page', $product->id) }}">
                        <img src="{{ $product->image }}" class="w-75" alt="">
                        <h5>{{ $product->product_name }}</h5>
                        <h5>{{ $product->product_price }}</h5>
                        <h5>{{ $product->product_description }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
