
@extends('layouts.main')

@section('content')
    

<div class="card">

    <div class="card-header">
        <h1>All Products</h1>
    </div>

    <div class="card-body">

        
            <table class="table">

                    <form action="{{route('product.all')}}">
    
                    <tr>
                    <td><input class="form-control" type="number" name="id" placeholder="id" value="{{request('id')}}"></td>
                        <td colspan><input class="form-control" type="text" name="name" placeholder="name" value="{{request('name')}}"></td>
                        <td><input class="form-control" type="number" name="minprice" placeholder="min price" value="{{request('minprice')}}"></td>
                        <td><input class="form-control" type="number" name="maxprice" placeholder="max price" value="{{request('maxprice')}}"></td>
                        <td><input class="form-control" type="text" name="category" placeholder="category" value="{{request('category')}}"></td>
                        <td colspan="3"><button class="btn btn-info">Filter</button></td>
            
                    </tr>

                </form>


                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th colspan="2">Actions</th>
                </tr>

                <form action="{{route('product.add')}}" method="POST">
                    @csrf
            <tr>
                <td><input class="form-control" type="" name="" placeholder="id" disabled="true "></td>
                <td><input class="form-control" type="text" name="name" placeholder="name"></td>
                <td><input class="form-control" type="number" name="price" placeholder="price"></td>
                <td><input class="form-control" type="text" name="category" placeholder="category"></td>
                <td> --- </td>
                <td><button class="btn btn-success">Add</button></td>
    
            </tr>

        </form>

           
        
            @foreach ($products as $p)
                <tr>
                <td>{{ $p->id}}</td>
                <td>{{ $p->name}}</td>
                <td>{{ $p->price}}</td>
                <td>{{ $p->category}}</td>
                <td>{{ $p->created_at ? $p->created_at ->diffInDays(now()) : 0}} Days Ago</td>
                <td>
                    <a href="{{route('product.edit',['id' => $p ->id]) }}" class="btn btn-info">Edit</a>

                </td>
                <td>
                    <form action="{{route('product.delete')}}" method="POST">
                        @csrf
                    <input type="hidden" name="product_id" value="{{$p->id}}" >
                    <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach
        
        </table>
            
        
    </div>
  
</div>


@endsection