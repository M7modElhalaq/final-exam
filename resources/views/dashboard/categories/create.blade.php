@extends('dashboard.layout.admin')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('dashboard.layout.includes.messages')
            <form action="{{route('store_category')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" required=""  minlength="5" name="name" type="text" id="name">
                </div>

                <input class="btn btn-default" type="submit" value="Create">
            </form>

        </div>
    </div>

@endsection