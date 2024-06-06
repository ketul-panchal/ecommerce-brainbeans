@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shopping Cart</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (session('cart', []) as $productId => $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>₹{{ $product['price'] }}</td>
                    <td>₹{{ $product['quantity'] * $product['price'] }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $productId) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Home</a>
        <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
    </div>
</div>
@endsection
