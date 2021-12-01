<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    //Show Profile
    public function adminProfile()
    {
        $adminData = Admin::find(1);
        
        return view('admin.admin_profile', [
            'adminData' => $adminData,
        ]);
    }

    //Change Profile
    public function adminProfileEdit()
    {
        $editData = Auth::guard('admin')->user();
        
        return view('admin.admin_profile_edit', [
            'editData' => $editData,
        ]);
    }

    //Update Change Profile
    public function adminProfileStore(Request $request, $id)
    {
        $data = Admin::find($id);
        $data->email = $request->email;
        $data->name = $request->name;
        if($request->file('profile_photo_path')){
            unlink(public_path($data->profile_photo_path));
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->profile_photo_path = 'upload/admin_images/'.$filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    //Show Change Password View Page
    public function changePassword()
    {
        return view('admin.admin_change_password');
    }

    //Update Password Change
    public function updatePassword(Request $request, $id)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $admin = Admin::find($id);
        $hashedPassword = $admin->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $admin->password =  Hash::make($request->password);
            $admin->save();
            Auth::logout();
            
            return redirect()->route('admin.logout');
        } else {
            return redirect()->back()->with([
                'message' => 'Incorrect Current Password',
                'alert-type' => 'error',
            ]);
        }

    }
}
