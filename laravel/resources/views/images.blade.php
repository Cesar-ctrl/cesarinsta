@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <div class="row">
    @guest
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"aria-hidden="true">
                            <span class="placeholder col-6">Inicia sesión</span>
                        </h5>
                        <a href="{{ route('login') }}" tabindex="-1" class="btn btn-outline-primary placeholder col-4" aria-hidden="true">{{ __('Login') }}</a>
                    </div>
                </div>
            </div>
        @if (Route::has('register'))
        <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"aria-hidden="true">
                            <span class="placeholder col-6">Registrarse</span>
                        </h5>
                        <a href="{{ route('register') }}" tabindex="-1" class="btn btn-outline-primary placeholder col-4" aria-hidden="true">{{ __('Register') }}</a>
                    </div>
                </div>
            </div>
        @endif
            @else
                <div class="card-header">
                <span class="col-5">Listado de imagenes</span> 
                <a href="{{ route('image.create') }}" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Nueva</a>
            </div>
            <ul class="d-flex justify-content-between row">
                @foreach ($images->reverse() as $image)
                    <li class="col flex-column">
                        
                        <div class="flex-column p-3 ">
                            <a href="{{ route ("show", array("id" => $image->user->id)) }}">
                                <div class="card-body badge btn btn-outline-primary text-wrap    ">
                                 
                                    <p style="word-wrap: break-word"class="card-text">{{ $image->user->nick }}</p>
                                </div>
                            </a>
                            <a href="{{ route("image.detail", array("id" => $image->id)) }}">
                                <img src="{{ isset($image->image_path) ? route('fileGet', array('path' => $image->image_path)) : $anonimage}}" class="card-img-top" alt="...">
                                <div class="card-body badge btn btn-outline-primary text-wrap    ">

                                    <p style="word-wrap: break-word"class="card-text">{{ $image->description }}</p>
                                </div>
                            </a>
                        </div>
                        
                        <i class="fa fa-heart" onclick='alterna_like(this)' data-id='{{ $image->id }}' data-likes=' ' id='likes{{ $image->id }}'></i>
                    </li> 
                @endforeach  
            </ul>
                {{ $images->links() }}

                
    @endguest
      
@endsection