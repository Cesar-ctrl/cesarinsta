<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StorageController extends Controller {

    public function get($path) { 
        return Storage::disk('images')->get($path);
    }

}