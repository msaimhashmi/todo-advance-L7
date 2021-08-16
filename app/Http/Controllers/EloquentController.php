<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use Session;

class EloquentController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image'))
        {
            User::uploadAvatar($request->image);
            // $request->session()->flash('message', 'Uploaded successfully!');
            return redirect()->back()->with('message', 'Uploaded successfully!');
        }
        return redirect()->back()->with('error', 'Uploaded not uploaded!');
    }

    
    public function eloquent()
    {
        // Insert record
        $user = new User();
        $user->name = 'saimmm';
        $user->email = 'eloquent6@gmail.com';
        $user->password = 'pass';
        $user->save();
        // dd($user);

        // Update Record
        // User::where('id', 4)->update(['name' => 'Bhai Jaan']);

        // Delete Record
        // User::where('id', 6)->delete();
        // Get Record
        $user = User::all();
        return $user;


    }
}
