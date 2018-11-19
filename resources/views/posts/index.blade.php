@extends('layout.app')

@section('content')
    
    
    <h2 class="display-4"> All Posts.</h2>
    <hr>
    <div class="row">
        <div class="col-md-9">
            
                <div class="row">
        
                        @foreach ($posts as $post)
                            <div class="col-md-3">
                                <div class="card mb-3" style="max-width: 18rem;">
                                
                                    <div class="card-header bg-dark text-white">{{$post->title}}</div>

                                    <div class="card-body">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <img class="card-img-top" src="{{asset('storage/coverImages/' . $post->image)}}" alt="" height="150px">
                                    <p class="card-text">{{$post->body}}</p>
                                    <hr>
                                    <small style="color:blue;">Created by: {{$post->user->name}}</small>
                                    <a href="{{ '/posts/' .  $post->id }}" class="btn btn-primary"> Show More</a>
                                    </div>
                                </div>
                            </div>
                         
                        @endforeach
                    </div>
        </div>
        <div class="col-md-3">
                <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-info text-white"> Stats.</div>
                        <div class="card-body">
                        
                        <p class="card-text"> All Posts: {{$totalPosts}}</p>
                        </div>
                    </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12 justify-content-center">
                {{$posts->links()}}
        </div>
        
    </div>
 
@endsection
