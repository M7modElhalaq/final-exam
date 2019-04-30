@extends('dashboard.layout.admin')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('dashboard.layout.includes.messages')
            <form action="{{route('update_product', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" required="" value="{{$product->name}}" minlength="5" name="name" type="text" id="name">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control" name="description" value="{{$product->description}}" type="text" id="description">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" name="price" value="{{$product->price}}" type="text" id="price">
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <select class="form-control" id="size" name="size">
                        <option value="small"
                            @if($product->size == 'small')
                                selected
                            @endif
                        >Small</option>
                        <option value="medium"
                            @if($product->size == 'medium')
                            selected
                            @endif
                        >Medium</option>
                        <option value="large"
                            @if($product->size == 'large')
                            selected
                            @endif
                        >Large</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="category_id">Categories</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option selected="selected" value="">Select Category</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input class="form-control" name="image" type="file" id="image">
                </div>

                <input class="btn btn-default" type="submit" value="Edit">
            </form>

        </div>
    </div>

@endsection