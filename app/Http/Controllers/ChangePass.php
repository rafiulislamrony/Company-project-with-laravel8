<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class ChangePass extends Controller
{
    //
    public function CPassword(){
        return view('admin.body.change_password');
    }
    public function UpdatePassword(Request $request){
        $vaidateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password Is Change Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('login')->with($notification);
        } else{
            $notification = array(
                'message' => 'Password Is Change Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function PUpdate(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }

    public function UpdateProfile(Request $request){

        $user = User::find(Auth::user()->id);

        if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];

            if ($request->hasFile('image')) {
                $image_path = 'storage/'.$user->profile_photo_path;
                @unlink($image_path);
                $user->profile_photo_path = $request['image'];
                $user->updateProfilePhoto( $user->profile_photo_path);
            }

            $user->update();

            $notification = array(
                'message' => 'User Profile Is update Successfully',
                'alert-type' => 'info'
            );

            return Redirect()->back()->with($notification);

        }else{
            return Redirect()->back();
        }
    }

}
 
