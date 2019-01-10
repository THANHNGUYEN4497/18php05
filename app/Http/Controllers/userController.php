<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleModel;
use App\userModel;
class userController extends Controller
{
    public function adduser(Request $request){
        return view('admin.userAction.addUser');
    }
    public function listuser(Request $request){
        $dataUser = userModel::all()->toArray();
        return view('admin.userAction.listUser',['dataUser' => $dataUser]);
    }
    public function deleteuser($id){
        $dataUser = userModel::find($id)->delete();
        return view('admin.userAction.listUser')->with('notifyDelete','Delete Successlly!!');
    }

    public function postadduser(Request $request){
        // $this->validate($request,[
        //     'fullname'=> 'required|min:5|max:50',
        //     'username'=> 'required|unique|min:5|max:50',
        //     'address'=> 'required|min:5|max:50',
        //     'birthday'=> 'required',
        //     'email' => 'required|email|unique',
        //     'password' => 'required|min:8|max:50',
        //     'confPassword' => 'required|min:8|same:password',
        //     'avatar' => 'nullable'
        // ],
        // [
        //     'fullname.required' => 'Att Not Empty!!',
        //     'birthday.required' => 'Att Not Empty!!',
        //     'username.required' => 'Att Not Empty!!',
        //     'address.required' => 'Att Not Empty!!',
        //     'username.required' => 'Att Not Empty!!',
        //     'address.required' => 'Att Not Empty!!',
        //     'password.required' => 'Att Not Empty!!',
        //     'email.required' => 'Att Not Empty!!',
        //     'confPassword.same' => 'Password and Password confirm do not macth'
        // ]);
        $DataUser = new userModel;
        $DataUser->fullname = $request->fullname;
        $DataUser->username = $request->username;
        $DataUser->password = bcrypt($request->password);
        $DataUser->email = $request->email;
        $DataUser->address = $request->address;
        $DataUser->birthday = $request->birthday;
        $DataUser->is_admin = $request->checkadmin;
        $DataUser->avatar = $request->avatar->move('images');
        $DataUser->save();
        return redirect('admin/UserAction/AddUser')->with('notify','Add User successfully!!');
    }
}
