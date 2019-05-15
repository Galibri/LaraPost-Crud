@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <h3>Edit Post</h3>
                <form action="{{route('post.update', $post->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="">Select Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- Select One --</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id ==  $post->category->id ? 'selected' : ''}} >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="content" cols="30" rows="6" class="form-control">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-lg">Save Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection