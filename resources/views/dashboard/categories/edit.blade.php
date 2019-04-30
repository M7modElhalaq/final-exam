@extends('dashboard.layout.admin')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('dashboard.layout.includes.messages')
            <form action="{{route('update_category', ['id' => $category->id])}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" required="" value="{{$category->name}}" minlength="5" name="name" type="text" id="name">
                </div>

                <input class="btn btn-default" type="submit" value="Edit">
            </form>

        </div>
    </div>

@endsection