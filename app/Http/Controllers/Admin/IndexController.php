<?php
/**
 * @Author: qing
 * @Date:   2017-12-08 17:34:55
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-21 18:19:11
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller{
    
    public function index(){

        return view('admin/index');
    }
}


