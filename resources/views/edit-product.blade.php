@extends('layouts/main')

@section('content')

<div class="card">
    <div class="card-header">
        <h1>Edit Product</h1>
    </div>

    <form action="{{route('product.update',['id' => $product ->id])}}" method="POST">
        @csrf
    <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" name="category" id="category" value="{{$product->category}}">
            </div>
    </div>

    <div class="card-footer">
        <button class="btn btn-success">Save</button>
        <button class="btn btn-danger">Cancer</button>
    </div>

</div>
</form>

@endsection