@extends('layouts.app')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <ul>
                @foreach ($comment as $comentario)
                    <li>
                        <p>comment id: {{ $comentario->id }}</p>
                        <p>user id: {{ $comentario->user_id }}</p>
                        <p>image id: {{ $comentario->image_id }}</p>
                        <p>comment content: {{ $comentario->content }}</p>
                    </li>
                    
                @endforeach  
            </ul>
            
        </div>
    </div>
</div>
 @endsection