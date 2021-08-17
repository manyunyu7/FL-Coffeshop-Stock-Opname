<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function viewAdminManage()
    {
        $users = User::all();
        return view('karyawan.manage')->with(compact('users'));
    }

    public function viewAdminEdit($id)
    {
        $users = User::where('id','=',$id)->first();
        return view('karyawan.edit')->with(compact('users'));
    }

    public function viewAdminCreate()
    {
        return view('karyawan.create');
    }


    function destroy($id){
        $user = User::findOrFail($id);
        if ($user->delete()) {
            if (Auth::user()->role == 1) {
                return back()->with(["success"=>"Berhasil Menghapus User $user->name"]);
            }
        }else{
            return back()->with(["error"=>"Gagal Menghapus User Baru"]);
        }
    }

    function store(Request $request)
    {
        $validateComponent = [
            "user_name" => "required",
            "user_email" => "required",
            "user_password" => "required",
            "user_role" => "required",
       ];

       
        $this->validate($request, $validateComponent);

        $user = new User();
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->contact = $request->user_contact;
        $user->password = bcrypt($request->user_password);
        $user->role = ($request->user_role);


        if ($user->save()) {
            if (Auth::user()->role == 1) {
                return back()->with(["success"=>"Berhasil Menambahkan User Baru"]);
            }
        } else {
            return back()->with(["failed"=>"Gagal Menambahkan User Baru"]);
        }
    }


    function update(Request $request)
    {
        $validateComponent = [
            "user_name" => "required",
            "user_email" => "required",
            "user_role" => "required",
        ];

        $this->validate($request, $validateComponent);

        $user = User::findOrFail($request->id);
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->contact = $request->user_contact;
        $user->password = bcrypt($request->user_password);
        $user->role = ($request->user_role);


        if ($user->save()) {
            if (Auth::user()->role == 1) {
                return back()->with(["success"=>"Berhasil Mengupdate Data User"]);
            }
        } else {
            return back()->with(["failed"=>"Gagal Mengupdate Data User"]);
        }
    }
}
