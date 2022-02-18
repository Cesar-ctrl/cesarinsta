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

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = Image::paginate(5);
        return view("images", array("images" => $images));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        return view("image.create_image", array("user" => User::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {
        // validación
        $validacion = $request->validate(array(
            'image_path' => 'required'
        ));
        $image = new Image($request->all());
        $image->user_id = Auth::user()->id;
        $unpath = $request->file('image_path');
        $image_path = $unpath;
        $image_path_name = time().$image_path->getClientOriginalName();
        Storage::disk('images')->put($image_path_name, File::get($image_path));
        $image->image_path = $image_path_name;
        
        $image->save();
        
        return redirect()->route('images');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Images  $Images
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $likes = Likes::where('image_id', $id)->get();
        $comment = Comment::where('image_id', $id)->get();
        $arraym = array('image' => Image::findOrFail($id), "comment" => $comment, "likes" => $likes);
        return view('imageDetail', array('arraym'=>($arraym)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Images  $Images
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view("ImagesForm", array("user" => Propietario::all()));
        return view("imagesForm", array("user" => User::all(),
                                          "image" => Image::findOrFail($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Images  $Images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // validación
        $validacion = $request->validate(array(
            'id' => 'required',
            'image_path' => 'required'
        ));
        $image = Image::findOrFail($id);
        $image->update($request->all());

        return redirect()->route('images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Images  $Images
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $images = Image::findOrFail($id);
        $images->delete();

        return redirect()->route('images');
    }

    /**
     * Se produce un like de Images.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like($id) 
    {
        $user = Auth::user();
        $image = Image::findOrFail($id);

        return response()->json(
            array('like' => true,
                  'numero' => $image->id
            )
        );
    }

    public function liked(){   
        $userID = Auth::user()->id;
        $likes = Likes::where('user_id', $userID)->get();
        $images = array();
        return view('likes', array('likes'=>($likes)));
    }

    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        $file = substr($file, 6);
        return new Response($file, 200);
    }

    

}
