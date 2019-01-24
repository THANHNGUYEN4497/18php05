<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\RoleModel;
use App\userModel;
class userController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function test(){
        // echo "<pre>";
        // $data = Auth::guard('admin')->user();
            // echo $data->fullname;
            // echo $data->username;
            // echo $data->email;
            // echo $data->address;
            // echo $data->is_admin;
        // if (Auth::guard('admin')->check()){
        //     $dataUser = Auth::guard('admin')->user();
        //     view()->share('dataUserLogin', $dataUser);
        // }
        return view('test');
    }
    public function moveLogin(){
        return view('admin.login');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    public function checkLogin(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if(Auth::guard('admin')->attempt(['email' => $email,'password' => $password])){
            return redirect('admin/UserAction/ListUser');
        }
        else {
            return redirect('admin/login')->with('notifyLogin','email or password not authoried');
        }
    }
    public function adduser(Request $request){
        return view('admin.userAction.addUser');
    }
    public function edituser(Request $request,$id_user){
        $dataOneUser = userModel::find($id_user)->toArray();
        // echo "<pre>";
        // var_dump($dataOneUser);
        // echo '<strong>'.$dataOneUser['fullname'].'</strong>';
        return view('admin.userAction.editUser',['dataOneUser'=> $dataOneUser]);
    }
    public function postedituser(Request $request,$id_user){
        $dataOneUser = userModel::find($id_user);
        // echo $dataOneUser->fullname;
        // echo "<prev>";
        //   var_dump($dataOneUser);
        // echo "</prev>";
        $dataOneUser->fullname = $request->fullname;
        $dataOneUser->username = $request->username;
        $dataOneUser->email = $request->email;
        $dataOneUser->address = $request->address;
        $dataOneUser->birthday = $request->birthday;
        $dataOneUser->is_admin = $request->checkadmin;
        if($request->hasFile('newAvatar'))
        {
            $fileImage = $request->file('newAvatar');
            $typeImage = $fileImage->getClientOriginalExtension();
            if($typeImage != 'jpg' && $typeImage != 'png' && $typeImage != 'jpeg'){
                return redirect('admin/UserAction/AddUser')->with('notify_errorUpload','file upload denied (.jpg,.png,.jpeg) ');
            }
            $filename = $fileImage->getClientOriginalName();
            $fileImageToSave = str_random(5).'_'.$filename;
            $fileImage->move('images/userAvatar', $fileImageToSave);
            $dataOneUser->avatar = $fileImageToSave;
        }
        elseif ($request->has('oldAvatar')){
            $request->oldAvatar = $dataOneUser->avatar;
        }
        else {
            $dataOneUser->avatar = "";
        }
        $dataOneUser->save();
        return redirect('admin/UserAction/ListUser')->with('notifyEdit','Edit Successfully!!');
    }
    public function listuser(){
        $dataUser = userModel::all();
        return view('admin.userAction.listUser',['dataUser' => $dataUser]);
    }
    public function deleteuser($id_user){
        $dataUser = userModel::find($id_user);
        $dataUser->delete();
        return redirect('admin/UserAction/ListUser')->with('notifyDelete','Delete Successlly!!');
    }

    public function postadduser(Request $request){
        // $this->validate($request,[
        //     'fullname'=> 'required|min:5|max:50',
        //     'username'=> 'required|unique:usersinfo,username|min:5|max:50',
        //     'address'=> 'required|min:5|max:50',
        //     'birthday'=> 'required',
        //     'email' => 'required|email|unique:usersinfo,email',
        //     'password' => 'required|min:8|max:50',
        //     'confPassword' => 'required|min:8|same:password',
        //     'avatar' => 'nullable'
        // ],
        // [
        //     'fullname.required' => 'fullname Not Empty!!',
        //     'birthday.required' => 'birthday Not Empty!!',
        //     'username.required' => 'username Not Empty!!',
        //     'address.required' => 'address Not Empty!!',
        //     'username.required' => 'username Not Empty!!',
        //     'password.required' => 'password Not Empty!!',
        //     'email.required' => 'email Not Empty!!',
        //     'confPassword.same' => 'Password and Password confirm do not macth'
        // ]);
        $DataUser = new userModel;
        $DataUser->fullname = $request->fullname;
        $DataUser->username = $request->username;
        $DataUser->password = Hash::make($request->password);
        $DataUser->email = $request->email;
        $DataUser->address = $request->address;
        $DataUser->birthday = $request->birthday;
        $DataUser->is_admin = $request->checkadmin;
        if($request->hasFile('avatar'))
        {
            $fileImage = $request->file('avatar');
            $typeImage = $fileImage->getClientOriginalExtension();
            if($typeImage != 'jpg' && $typeImage != 'png' && $typeImage != 'jpeg'){
                return redirect('admin/UserAction/AddUser')->with('notify_errorUpload','file upload denied (.jpg,.png,.jpeg) ');
            }
            $filename = $fileImage->getClientOriginalName();
            $fileImageToSave = str_random(5).'_'.$filename;
            $fileImage->move('images/userAvatar/', $fileImageToSave);
            $DataUser->avatar = $fileImageToSave;
        }
        else{
            $DataUser->avatar = " ";
        }
        $DataUser->save();
        return redirect('admin/UserAction/AddUser')->with('notify','Add User successfully!!');
    }
}
