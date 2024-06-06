@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>₹{{ $product['price'] }}</td>
                    <td>₹{{ $product['quantity'] * $product['price'] }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right"><strong>Total:</strong></td>
                <td>
                ₹{{ array_sum(array_map(function($product) {
                        return $product['quantity'] * $product['price'];
                    }, $cart)) }}
                </td>
            </tr>
        </tfoot>
    </table>
    <div class="d-flex justify-content-between">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Home</a>
        <a href="#" class="btn btn-primary">Confirm and Pay</a>
    </div>
</div>
@endsection
