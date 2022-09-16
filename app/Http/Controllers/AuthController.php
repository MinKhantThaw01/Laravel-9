<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function Profile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
            return view('admin.admin_profile_view',compact("userData"));
        }

    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        
        return view('admin.admin_profile_edit',compact('editData'));

    }
    
     public function storeProfile(Request $request){
           
            $id = Auth::user()->id;
            $user = User::find($id);

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;

            if($request->file('profile_image')){
                $file = $request->file('profile_image');
                $filename = date("YmdHi").$file->getClientOriginalName();

                $file->move(public_path('upload/profileImage'),$filename);

                $user['profile_image']= $filename;
            }
            $user->save();
            return redirect()->route('admin.profile');
       }

}
