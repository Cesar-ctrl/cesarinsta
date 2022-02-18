@extends('layouts.app')

@section('content')
{{ $image = Arr::get($arrayc, 'image')}}
<img class="card-img-top p-2" style="width: 50%;" alt="Imagen image" src="{{ isset($image->image_path) ? route('fileGet', array('path' => $image->image_path)) : $anonimage}}">
<form class="row g-3" action="" method="POST">
	<div class="card-header">
        <h4 class="card-title">Comment Upload</h4>
    </div>
	<div class="card-body">
	@csrf
		<div class="mb-3">
  			<label for="content" class="form-label row">Comentario: </label>
			  <textarea name="content" cols="40" rows="3"></textarea>
		</div>
		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    	<p><input style="margin-right: 9.2vw;margin-top: 1vh;" class="btn btn-primary" type="submit" value="Publicar comentario"></p>
	</div>
</form>
@endsection