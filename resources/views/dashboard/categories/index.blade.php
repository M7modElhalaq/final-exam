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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('edit_category', ['id' => $category->id])}}" class="btn btn-primary btn-sm" name="edit">Edit</a>
                            <form action="{{route('delete_category', [$category->id])}}" method="POST" style="display: inline-block">
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