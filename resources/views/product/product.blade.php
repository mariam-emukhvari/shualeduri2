@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            <img src="{{ $product->image }}" alt="">
            <h3>{{ $product->product_name }}</h3>
            <h3>${{ $product->product_price }}</h3>
            <h3>{{ $product->product_description }}</h3>
        </div>
        <form action="{{ route('store.comment', $product->id) }}" method="post" class="mt-5">
            @csrf
            <input type="text" placeholder="კომენტარის დამატება" class="container col-4" name="comment">
            <button type="submit" class="btn btn-primary">დამატება</button>
        </form>
        <div class="container">
            @foreach ($product->comment as $object)
                <div>
                    <p style="color: red">ავტორი: {{ $object->user->name }}</p>
                    <h5>{{ $object->comment }}</h5>
                </div>
            @endforeach
        </div>
    </div>
    <h3 class="text-center pt-5">მსგავსი პროდუქტები:</h3>
    <div class="container">
        <div class="row">
        @foreach($products as $prod)
            <div class="col-4 text-center mt-3" style="background-color: #d9d9d9; border: 1px solid black;">
                <a href="{{ route('single.product.page', $prod->id) }}">
                    <img src="{{ $prod->image }}" class="w-75" alt="">
                    <h5>{{ $prod->product_name }}</h5>
                    <h5>{{ $prod->product_price }}</h5>
                    <h5>{{ $prod->product_description }}</h5>
                </a>
            </div>
        @endforeach
        </div>
    </div>
@endsection
