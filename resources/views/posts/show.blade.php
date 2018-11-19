@extends('layout.app')

@section('content')
<div class="row">

    <div class="col-md-9 offset-md-2">
        <h1 class="display-4">{{$post->title}}</h1>
        <img class="card-img-top" src="{{asset('storage/coverImages/' . $post->image)}}" alt="">

        <hr>
        <p> {{$post->title}}</p>
         created at <span class="badge badge-info"> {{$post->created_at}} </span>
         <hr>
         @if(Auth::user()->id == $post->user_id)
            <a href="{{'/posts/edit/' . $post->id}}" class="btn btn-primary" style="float:left; margin-right:10px;">Edit</a>
            <form action="{{route('post.destroy', ['id' => $post->id])}}" method="POST">
                @csrf
                @method('delete')
        
                <button type="submit" class="btn btn-danger float-left">Delete</button>
            </form>
        @endif
    </div>
    
</div>
@endsection