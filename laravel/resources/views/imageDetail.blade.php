@extends('layouts.app')

@section('content')
<?php
    $image = Arr::get($arraym, 'image');
    $likes = Arr::get($arraym, 'likes');
    $comment = Arr::get($arraym, 'comment');

?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <div class="card" style="width: 100%;">
    <div class="card-header">
        <div class="card-body badge btn btn-outline-primary text-wrap    ">
            <p style="word-wrap: break-word"class="card-text">{{ $image->user->nick }}</p></div>
            <p>Image User id: {{$image->user_id}}</p>
            
        <img class="card-img-top p-2" style="width: 50%;" alt="Imagen image" src="{{ isset($image->image_path) ? route('fileGet', array('path' => $image->image_path)) : $anonimage}}">
        @foreach ($likes as $like)
            @if ($like->user_id !== Auth::user()->id)
            <i class="fa fa-heart-o" onclick='alterna_like(this)' data-id='{{ $image->id }}' data-likes=' ' id='likes{{ $image->id }}'>
                @break       
            @endif
        @endforeach
        <i class="fa fa-heart" onclick='alterna_like(this)' data-id='{{ $image->id }}' data-likes=' ' id='likes{{ $image->id }}'>
        </i> 
        <span > </span>
        <div class="card-body">
            <!-- Button trigger modal borrado  -->
            <!-- Modal -->
            <div class="modal fade" id="borrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    @if ($image->user_id === Auth::user()->id)
                        <div class="modal-content">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button  type="button" class="btn btn-danger">Left</button>
                                <button type="button" class="btn btn-warning">Middle</button>
                            </div>
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Borrar image</h5>
                                <button type="button" class="close" data-dismiss="modal" >
                                    <span >&times;</span>
                                </button>
                            </div>


                            <div class="modal-body">
                                ¿Borrar image con id {{ $image->id }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                            </div>
                        </div>
                    @endif

                </div>
            </div>
            <div class="container-lg">
                <h1>Description:</h1>
                <p class="fs-3"> {{ $image->description }}</p>
                <ul class="list-group list-group-flush">
                    @foreach ($comment as $comentario)
                        <li class="list-group-item">
                            <p>comment id: {{ $comentario->id }}</p>
                            <p>user id: {{ $comentario->user_id }}</p>
                            <p>image id: {{ $comentario->image_id }}</p>
                            <p>comment content: {{ $comentario->content }}</p>
                        </li>
                    @endforeach  
                </ul>
                <a href="{{ route ("comment.write",  array("image" => ($image->id))) }}"> Escribe un comentario</a>
            </div>
        </div>
    </div>
</div>    
@endsection