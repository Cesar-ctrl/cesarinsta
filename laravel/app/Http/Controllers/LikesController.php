<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use App\Likes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Comment;

class LikesController extends Controller{
    public function index()
    {
        //
        $images = Image::paginate(5);
        return view("images", array("images" => $images));
    }

    public function store($image_id)
    {
        $like = new Likes();
        $like->user_id = Auth::user()->id;
        $like->image_id = $image_id;
        $like->save();

    }

    public function destroy($id)
    {
        //
        $like = Likes::findOrFail($id);
        $like->delete();

    }

    public function dolike($id) 
    {
        $user = Auth::user();
        $image = Image::findOrFail($id);
        $like = Likes::where("user_id", $user->id)
                        ->where( "image_id", $image->id)->first();
        
        $resultado = array();

        if(!$like) {
            $resultado['like'] = true;
            $this->store($image->id);

        } else {
            $resultado['like'] = false;
            Likes::destroy($like->id);
        }
        $resultado['numero'] = Likes::where( "image_id", $image->id)->count();
        return response()->json($resultado);
    }

    public function actuallikes($id){
        $user = Auth::user();
        $image = Image::findOrFail($id);
        $like = Likes::where("user_id", $user->id)
                        ->where( "image_id", $image->id)->first();
        $resultado = array();
        if(!$like) {
            $resultado['like'] = false;

        } else {
            $resultado['like'] = true;

        }
        $resultado['numero'] = Likes::where( "image_id", $image->id)->count();
        return response()->json($resultado);
    }
}