<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function userProfile()
    {
        $user = Auth::user();

        return view('frontend.profile.user_profile', [
            'user' => $user,
        ]);
    }

    public function userProfileUpdate(Request $request)
    {
        $data = Auth::user();
        $data->email = $request->email;
        $data->name = $request->name;
        $data->phone = $request->phone;
        if($request->file('profile_photo_path')){
            if($data->profile_photo_path){
                unlink(public_path($data->profile_photo_path));
            }
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'), $filename);
            $data->profile_photo_path = 'upload/user_images/'.$filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully!',
            'alert-type' => 'success',
        );
        
        return redirect()->route('dashboard')->with($notification);
    }

    public function changePassword()
    {
        return view('frontend.profile.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = Auth::user(); 
        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('user.logout')->with([
                'message' => 'Password Updated Successfully, Please Login Again',
                'alert-type' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Incorrect Current Password',
                'alert-type' => 'error',
            ]);
        }
    }

}
