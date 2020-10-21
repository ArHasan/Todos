<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
/*
    public function uploadImage(Request $request){
        if($request->hasFile('image')){
            User::profileupdate($request->image);
        }
    return redirect()->back();
    }
*/
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();
            $this->deleteOldImage();
            $request->image->storeAs('images', $fileName, 'public');
            auth()->user()->update(['profile' => $fileName]);
            return back()->with('success','👍 Profile successfully upload');
        }
        return redirect()->back()->with('error','🚩 Image Empty Submit ');;
    }

    public function deleteOldImage()
    {
        if (auth()->user()->profile) {
            Storage::delete('/public/images/' . auth()->user()->profile);

        }
    }

   
}
