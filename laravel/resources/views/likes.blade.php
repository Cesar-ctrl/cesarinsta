@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<div class ="row">
    <div class="card-header">
        <span class="col-5">Imagenes que te han gustado</span> 
    </div>
    <ul class="d-flex justify-content-between row">
        @foreach($likes as $like)
            <!--{{ $image = $like->image }}-->
            <li class="col flex-column">
                    <a href="{{ route("image.detail", array("id" => $image->id)) }}">
                    <div class="flex-column p-3 ">
                        <img src="{{ isset($image->image_path) ? route('fileGet', array('path' => $image->image_path)) : $anonimage}}" class="card-img-top" alt="...">
                        <div class="card-body badge btn btn-outline-primary text-wrap    ">
                                
                            <p style="word-wrap: break-word"class="card-text">{{ $image->description }}</p>
                        </div>
                    </div>
                    </a>
                    <i class="fa fa-heart" onclick='alterna_like(this)' data-id='{{ $image->id }}' data-likes=' ' id='likes{{ $image->id }}'></i>
                </li> 
        @endforeach
    </ul>
    <div class="card-body">
        <span class="col-5">Imagenes que te han gustado</span> 
        
        
    </div>
</div>
@endsection