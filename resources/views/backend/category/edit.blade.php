@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <h3>Add new Category</h3>
                <form action="{{route('category.update', $category->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-lg">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
