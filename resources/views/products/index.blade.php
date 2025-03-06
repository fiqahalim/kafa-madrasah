@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('products.form') }}">Create Product</a>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - <a href="{{ route('products.form', $product) }}">Edit</a> - 
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection