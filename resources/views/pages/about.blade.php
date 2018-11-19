@extends('layout.app')

@section('content')
    <h1>{{$title}}</h1>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum, sunt!</p>

    <ul class="list-group">
        @foreach ($services as $service)
    
            <li class="list-group-item">{{$service}}</li>
        
        @endforeach
    
    </ul>
    
@endsection
