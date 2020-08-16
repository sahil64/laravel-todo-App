<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Storage;


class UserController extends Controller
{
    Public function index(){
        // return 'we are on user controller index function';
        // return view('home');
        //$users = DB::select('select * from users where id = ?', [1]);
        //DB::insert('insert into users (id, name, email,password) values (?, ?, ?, ?)', [1, 'Dayle','admin@admin.com','abc']);
        //return ( $users);
        //-----------------Insertingg Data
        /*$user=new User();
        $user->name="test";
        $user->email="tet@abv";
        $user->password=bcrypt("123");
        $user->save();
        //dd($user);*/
        $user=[
            'name'=>'Ak',
            'email'=>'ak@techahead.in',
            'password'=>'abc'
        ];
        //User::create($user);

        //---------------updating Data

        //User::where('id',2)->update(['name'=>'sahil']);

        // -----------------Seleting All
        $user=User::all();
        return($user);

        //---------------------Delete
        //User::where('id',1)->delete();

        return view('home');
    }
    public function uploadAvatar(Request $request){
        if ($request->hasFile('image')){
            User::uploadAvatar($request->image);
            request()->session()->flash('message','Image Uploaded Successfully');
            return redirect()->back();
        }
        request()->session()->flash('error','Error while uploading Image');
        return redirect()->back();

    }

}
