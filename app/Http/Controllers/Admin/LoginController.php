<?php
/**
 * @Author: anchen
 * @Date:   2017-12-21 10:34:35
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-04 14:36:47
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Admin\User;

class LoginController extends Controller{

    public function login(){

        $input = request()->input();

        if(request()->isMethod('post')){

            $model_user = new User();
            $login = $model_user->checkLogin($input['name'],$input['password']);
            if(!is_numeric($login)){

                 // 记录行为日志，并执行该行为的规则
                // $this->action_log('user_login','member',$user->uid,$user->uid);
                session(['user'=>[
                                    'id'=>$login->id,
                                    'name'=>$login->name,
                                    'logo'=>$login->logo,
                                    'loginNum'=>$login->login,
                                    'loginTime'=>$login->logintime
                                    ]]);

                //记录
                action_log('用户id '.$login->id.' 登录','article',session('user.id'), $login->id ,$login->name . '登陆后台');

                return redirect('admin/index');

            }else{

                //登录失败
                switch($login) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case 0: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                

                  return redirect()->back()->withInput()->withErrors($error);
            }
        }

        return view('admin.login');
    }


    public function loginOut(){

        session()->flush();
        return redirect('admin/login');
    }
}