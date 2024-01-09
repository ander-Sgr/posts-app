<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {

        $request->validate([
            'fitx' => 'image|max:1024'
        ]);
        
        return Storage::putFileAs('posts', $request->file('fitx'), $request->user()->id);
       // return Storage::putFile('posts', $request->file('fitx'));
    }

}
