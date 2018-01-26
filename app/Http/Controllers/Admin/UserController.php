<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Admin\User;

class UserController extends Controller
{

    public function list(){

        if(request()->id){

            if(request()->status == '-1'){
                User::destroy(request()->id);

            }else{
                User::where('id',request()->id)->update(['status'=>request()->status]);
            }
        }
        return view('admin.userList')->withuser(User::all());

    }

    //编辑信息
    public function editUser(){

        $input = request()->except('_token');

        $this->validate(request(),[
                'name' => 'required|max:100',
                'phone' =>'required|digits:11',
                'description' =>'required',
            ]);

        if(request()->has('id')){

            User::where('id',$input['id'])->update($input);

            return response()->json('修改成功');


        }else{

             $this->validate(request(),[
                'name' => 'unique:users',
                'password' =>'required',
            ]);

            $input['ip'] = ip2long(request()->ip());
            $input['create_time'] = time();
            $input['password'] = encrypt($input['password']);

            User::create($input);

            return response()->json('添加成功');

        }

    }

    //获得个人信息
    public function getUserMsg(){

        return response()->json(User::find(request()->id));

    }


    public function rePassword(){

        if(request()->isMethod('post')){

            $this->validate(request(),[
                'oldPassword' =>'required',
                'password'=>'required|confirmed|min:6', 
                ]);

            User::where('id',request()->id)->update(['password'=>encrypt(request()->password)]);

            session()->flush();
            return redirect('admin/login')->withErrors('修改成功! 正在跳转回登陆页!');
        }

        return view('admin.rePassword');
    }
}
