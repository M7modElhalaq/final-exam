@extends('dashboard.layout.admin')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('dashboard.layout.includes.messages')
            <form action="{{route('create_product')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" required=""  minlength="5" name="name" type="text" id="name">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control" name="description" type="text" id="description">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" name="price" type="text" id="price">
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <select class="form-control" id="size" name="size">
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="category_id">Categories</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option selected="selected" value="">Select Category</option>
                        @foreach($categories as $category)
                            <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input class="form-control" name="image" type="file" id="image">
                </div>

                <input class="btn btn-default" type="submit" value="Create">
            </form>

        </div>
    </div>

@endsection