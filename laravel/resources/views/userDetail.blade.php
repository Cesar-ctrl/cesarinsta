@extends('layouts.app')

@section('content')
<?php
    $user = Auth::user();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<div class="card" style="width: 50%;">
    <div class="card-header">
        {{ $user->nick }}
        {{ $images }}}
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($images as $image)
            <a class="col" href="{{ route("image.detail", array("id" => $image->id)) }}">
                <div class="card">
                    <img src="{{ isset($image->image_path) ? route('fileGet', array('path' => $image->image_path)) : $anonimage }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <i class="fa fa-heart" onclick='alterna_like(this)' data-id='{{ $image->id }}' data-likes=' ' id='likes{{ $image->id }}'></i>
                        <p class="card-text">{{ $image->description }}</p>
                    </div>
                </div>
            </a> 
        @endforeach  
    </div>
    @if ($image->user_id === Auth::user()->id)
        <a href="{{ route('config', array('id' => $user->id)) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Editar</a>
        <!-- Button trigger modal borrado -->
        <button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#borrarModal">
            Borrar  
        </button>
        <!-- Modal -->
        <div class="modal fade" id="borrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Borrar user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    ¿Borrar user con id {{ $user->id }}?
                    </div>
                    <div class="modal-footer">
                   
                </div>
            </div>
        </div>
        </div>
    @endif
  </div>
</div>
@endsection