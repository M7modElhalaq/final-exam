@extends('dashboard.layout.admin')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('dashboard.layout.includes.messages')
            <table class="table table-striped table-bordered first text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>size</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}$</td>
                        <td>{{$product->category_id}}</td>
                        <td>{{$product->size}}</td>
                        <td>
                            <a href="{{route('edit_product', ['id' => $product->id])}}" class="btn btn-primary btn-sm" name="edit">Edit</a>
                            <form action="{{route('delete_product', [$product->id])}}" method="POST" style="display: inline-block">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection