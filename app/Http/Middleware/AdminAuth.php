<?php
/**
 * @Author: anchen
 * @Date:   2017-12-21 09:43:12
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-01-11 16:09:21
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use resources\orm\MyAuth;

class AdminAuth
{
    public function handle($request, Closure $next){

        // 简单授权,后期加权限
        if(!session('user')){

            return redirect('admin/login');

        }else{  

            $auth  = MyAuth::instance();

           if(!$auth->check(session('user.id'))){

                return redirect('404')->withErrors('没有权限!');
           };


        }
        
        return $next($request);

    }
}