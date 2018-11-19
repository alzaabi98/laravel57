@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="display-4">Create New Post</h1>
            <form action="/posts/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body"  rows="4" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="coverImage" class="form-control-file">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Create</button>
                </div>

              
            
            </form>
        </div>
    </div>
@endsection