@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" action="{{ route('products.index') }}" style="display: flex; flex-direction: row; justify-content: space-around; align-items: center;">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search for products" value="{{ request()->search }}">
        </div>
        <div class="form-group">
            <select name="category" class="form-control">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select name="brand" class="form-control">
                <option value="">Select Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ request()->brand == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="height: fit-content;margin-bottom: 20px;">Filter</button>
    </form>

    <div class="row mt-4">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">₹{{ $product->price }}</p>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
