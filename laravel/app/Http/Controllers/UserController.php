<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function config()
    {
        $user = Auth::user();
        $name = $user->name;
        $surname = $user->surname;
        $nick = $user->nick;
        $email = $user->email;
        $avatar = $user->avatar;
        return view('user.config', compact('name', 'surname', 'nick', 'email', 'avatar'));
        
        //return view( 'user.config', array('user' => array('user' => $user)) ) ;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array(
            'nombre' => 'required'
        ));

        (new User($request->all()))->save();

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $user = Auth::user();
        $id = $user->id;
        return view('userDetail', array('images' => Image::where('user_id', $id)->get()));
    }

    public function show($id)
    {
        return view('userDetail', array('images' => Image::where('user_id', $id)->get()));
    }

    /**
    *public function show()
    *{
    *    $user = Auth::user();
    *    $id = $user->id;
    *    return view('userDetail', array('user' => User::findOrFail($id),
    *                                        'anonimage' => Storage::disk('public')->url('images/anon.jpg')));
    *}
    
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $user = Auth::user();
        $id = $user->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $avatar = $request->file('avatar');
        $image_path = $avatar;
        if($image_path)
        {   // poner nombre único
            $image_path_name = time().$image_path->getClientOriginalName();

            //Guardar la imagen en la carpeta (storage/app/user)
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            // Seteo el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }
        $user->update([
            'name' => $name,
            'surname' => $surname,
            'nick' => $nick,
            'email' => $email,
            'password' => Hash::make($password),
            'image' => $image_path,
        ]);
       // $user->save();

        return redirect('/')->with('message', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function hasProfilePicture(): bool
    {
        return !is_null($this->attributes['image'])
        && !empty($this->attributes['image']);
    }

    public function getProfilePictureAttribute()
    {
        return url('users/' . $this->attributes['image']);
    }
    public function getImage($filename)
    {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function imagenesUsuario(){
        $userID = Auth::user()->id;
        $imagenes = Image::where($userID, 'user_id')->get();
        return new Response($imagenes, 200);
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'surname' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'nick' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
}