@extends('layouts.adminapp')
@section('content')

    <h1 class="text-center">სამართავი პანელი</h1>
    <div class="container d-flex pt-5">
        <div class="col-6">
            <h3 class="text-center">პროდუქტის დამატება</h3>
            <form action="{{ route('create.product') }}" method="post">
                @csrf
                <input type="text" class="form-control mt-3" placeholder="პროდუქტის სახელი" name="product_name">
                @error('product_name')
                    {{ $message }}
                @enderror
                <input type="text" class="form-control mt-3" placeholder="პროდუქტის ფასი" name="product_price">
                @error('product_price')
                    {{ $message }}
                @enderror
                <input type="text" class="form-control mt-3" placeholder="პროდუქტის აღწერა" name="product_description">
                @error('product_description')
                    {{ $message }}
                @enderror
                <select name="tags" id="tags" class="custom-select mt-3">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary w-100 mt-3">დამატება</button>
            </form>
        </div>
        <div class="col-6">
            <h3 class="text-center">მომხმარებლები</h3>
            <div class="text-center d-flex bg-danger mt-3">
                <h5 class="ml-4">ID</h5>
                <h5 class="ml-4">სახელი</h5>
                <h5 class="ml-4">მეილი</h5>
            </div>
            <div class="text-center d-flex bg-secondary mt-3">
                @foreach($users as $user)
                        <h5 class="ml-4">{{ $user->id }}</h5>
                        <h5 class="ml-4">{{ $user->name }}</h5>
                        <h5 class="ml-4">{{ $user->email }}</h5>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h3>კატეგორიის დამატება</h3>
        <form action="{{ route('create.tag') }}" method="post">
            @csrf
            <input type="text" name="tag" id="tag" class="form-control col-5">
            <button class="btn btn-primary mt-3">კატეგორიის დამატება</button>
        </form>
    </div>
    <div class="container d-flex pt-5">
        <div class="row">
        @foreach($products as $product)
            <div class="col-4 text-center mt-2 mb-3 w-100" style="background-color: #d9d9d9; border: 1px solid black;">
                    <form action="{{ route('delete.product', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <img src="{{ $product->image }}" class="w-75" alt="">
                        <h5>{{ $product->product_name }}</h5>
                        <h5>{{ $product->product_price }}</h5>
                        <h5>{{ $product->product_description }}</h5>
                        <button type="submit">წაშლა</button>
                    </form>
            </div>
        @endforeach
        </div>
    </div>

@endsection
