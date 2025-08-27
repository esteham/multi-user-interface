<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.index');

    }//End Method

    public function AdminLogout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');

    }//End Method

    public function AdminLogin(){

        return view('admin.admin_login');

    }//End Method

    public function AdminProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.profile_view',compact('profileData'));

    }//End Method

    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')){

            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmHi').uniqid().$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;

        }

        $data->save();

        $notification = array(
            'message' => 'Admin profile updated successfull',
            'alert-type'=> 'success'
        );

        return redirect()->back()->with($notification);

    }//End Method

    public function AdminChangePassword(){

        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.change_password',compact('profileData'));
    }//End Method

    public function AdminUpdatePassword(Request $request){

        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        // Match at the old password
        if(!Hash::check($request->old_password, auth::user()->password)){

            $notification = array(
            'message' => 'Old password does not match',
            'alert-type'=> 'error'
        );

        return redirect()->back()->with($notification);

        }

        //Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        
        $notification = array(
            'message' => 'Password updated Successfully',
            'alert-type'=> 'success'
        );

        return redirect()->back()->with($notification);


    }//End Method

}
