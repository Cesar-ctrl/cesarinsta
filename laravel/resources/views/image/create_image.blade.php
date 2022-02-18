@extends('layouts.app')
@section('content')
<form class="row g-3" method="POST" enctype="multipart/form-data" action="">
    <div class="card-header">
        <h4 class="card-title">Image Upload</h4>
    </div>
    <div class="card-body">
        @csrf
        <p><label for="image_path">Imagen</label>
            <input type="file" name="image_path" id="image_path" class="form-control">     </p>
        <div style="display: flex;justify-content: center;flex-wrap: wrap;">
            <label for="description">Descripción</label>
            <textarea name="description" cols="40" rows="3"></textarea>   
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <p><input style="margin-right: 9.2vw;margin-top: 1vh;" class="btn btn-primary" type="submit" value="Subir imagen"></p>
    </div>
</form>
@endsection