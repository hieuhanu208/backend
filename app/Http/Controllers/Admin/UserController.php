<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    static $SUPER_ADMIN = 2;
    public function listUser() {
        $authUserLevel = Auth::user()->level ;
        if($authUserLevel== static::$SUPER_ADMIN){
            $user = User::where('level','<=', $authUserLevel)->get();
            return view('admin.users.index',compact('user'));
        } else {
            $user = User::where('level','<=', $authUserLevel)->get();
            return view('admin.users.index',compact('user'));
        }
    }
    public function getFormUser(){
        return view('admin.users.add');
    }

    public function postUser(UserRequest $request){
        $user = new User();
        $user->name = $request->txtUser;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->level = $request->level;
        $user->save();
        return redirect()->route('admin.list-user')->with(['flash_lavel'=>'success','flash_message' => '<h4>Thêm người dùng thành công</h4>']);
    }
    public function deleteUser($id){
       $authUserLevel =  Auth::user()->level;
       //lấy user cần delete dựa theo $id
       $user = User::findOrFail($id);
       $deletedUserLevel = $user->level;
        if ($deletedUserLevel >= $authUserLevel ) {
            return redirect()->route('admin.list-user')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Xóa thất bại</h4>']);
        } else {
            $user->delete($id);
            return redirect()->route('admin.list-user')->with(['flash_lavel'=>'success','flash_message' => '<h4>Xóa thành công </h4>']);
        }
    }
    public function getSearch(Request $request) {

        $authUserLevel = Auth::user()->level ;
        $user_search = User::where('name','like','%'.$request->keyword.'%') ->get();
        return view('admin.users.search',compact('user_search'));

    }
    public  function getEditUser($id){
        $user = User::where('id',$id)->first();
        if(empty($user)){
            return redirect()->route('admin.list-user')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không tồn tại người dùng</h4>']);
        }

        return view('admin.users.edit',compact('user'));
    }
    public function postEditUser($id, Request $request){

        $user = User::where('id',$id)->first();
        if(empty($user)){
            return redirect()->route('admin.get-edit-user')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không tồn tại người dùng</h4>']);
        }
        $userUpdate = array(
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
        );
        $authUserLevel =  Auth::user()->level;
        //lấy user cần delete dựa theo $id
        $user = User::findOrFail($id);
        $UserLevel = $user->level;
        if ($authUserLevel > $UserLevel || Auth::user()->id == $id) {
            $user = User::where('id', $id)->update($userUpdate);
            return redirect()->route('admin.list-user')->with(['flash_lavel' => 'success', 'flash_message' => '<h4>Chỉnh sửa người dùng thành công</h4> ']);
        }else {
                return redirect()->route('admin.list-user')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không thể người dùng không thành công </h4>']);
            }
    }
}
