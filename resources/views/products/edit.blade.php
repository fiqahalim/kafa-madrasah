@extends('layouts.app')

@section('content')
    <h1>{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h1>
    <form action="{{ isset($product) ? route('products.save', $product) : route('products.save') }}" method="POST">
        @csrf
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" placeholder="Product Name">
        <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" placeholder="Price">
        <textarea name="description" placeholder="Description">{{ old('description', $product->description ?? '') }}</textarea>
        <button type="submit">Save</button>
    </form>
@endsection