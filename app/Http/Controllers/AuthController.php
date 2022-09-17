<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully', 
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
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

            $notification = array(
                'message' => 'Admin Profile Uploaded Successfully', 
                'alert-type' => 'info'
            );
            return redirect()->route('admin.profile')->with($notification);
       }


         public function ChangePassword(){
               return view('admin.admin_change_password');
           }

          public function UpdatePassword(Request $request){
                $validateData = $request->validate([
                    'oldpassword'=> 'required',
                    'newpassword'=> 'required',
                    'confirm_password'=> 'required |same:newpassword',
                ]);

                $hashPassword = Auth::user()->password;

                if(Hash::check($request->oldpassword,$hashPassword)){
                    $users = User::find(Auth::id());
                    $users->password = bcrypt($request->newpassword);
                    $users->save();

                    session()->flash('message',"Password Changed Successfully");
                    return redirect()->back();
                }else{
                    session()->flash('message',"Old Password don't match");
                    return redirect()->back();
                }
            }
}
