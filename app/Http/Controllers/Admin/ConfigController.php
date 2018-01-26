<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Config;

class ConfigController extends Controller
{
    public function index(){

        return view('admin.config')->withconfig(Config::all());
    }


    public function save(){

        $input = request()->except('_token');

        if(request()->has('group')){

            $this->validate(request(),[
                'name'=>'required|unique:configs',
                'title'=>'required',
                'remark'=>'required',
                ]);

            if($input['type'] == 'r'){
                if(empty($input['extra']))return response()->json(['errors'=>['配置项'=>'选择了单选后 配置值不能为空 ']],422);
            }

            Config::create($input);

            return response()->json('添加成功!');

        }else{

            foreach ($input as $k => $val) {

                 Config::where('id',$k)->update(['value'=>$val]);
            
             }

        return response()->json('保存成功!');

        }

        

    }
}
