@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if( count($posts) )
                    <ul class="list-group">
                            
                                @foreach ($posts as $post)
                                <div class="row">
                                    <div class="col-sm-9">
                                        <p>{{$post->title}}</p>
                                    </div>
                                    <div class="col-sm-3">
                                            <a href="{{'/posts/edit/' . $post->id}}" class="btn btn-primary" style="float:left; margin-right:10px;">Edit</a>
                                            <form action="{{route('post.destroy', ['id' => $post->id])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                        
                                                <button type="submit" class="btn btn-danger float-left">Delete</button>
                                            </form>  
                                    </div>
                                    
                                </div>
                                @endforeach
                            
                            
                      
                    @else
                        <p>you dont have any posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
