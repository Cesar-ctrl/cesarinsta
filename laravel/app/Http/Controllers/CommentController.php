<?php

namespace App\Http\Controllers;
use App\User;
use App\Comment;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,  $image_id)
    {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->image_id = $image_id;
        $comment->save();
 
        return redirect()->route('image.detail', $image_id);
    }
    
    public function create ($id_image){
        $arrayc = array('image' => Image::findOrFail($id_image), "user" => User::all());
        return view("commentsForm", array("arrayc"=>$arrayc));
    }
    
}
