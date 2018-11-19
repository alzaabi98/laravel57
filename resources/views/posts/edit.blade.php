@extends('layout.app')

@section('content')
<div class="row">

    <div class="col-md-9 offset-md-2">
        <h1 class="display-4">Edit Post</h1>
        <hr>
    <form action="{{route('post.update', ['id'=> $post->id])}}" method="post">
            @csrf
            @method('PUT')
            
        
            <div class="form-group">
                    <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body"  rows="4" class="form-control">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Update</button>
            </div>       
        </form>


    </div>
</div>
@endsection