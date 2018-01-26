<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Type;

class TypeController extends Controller
{
     public function list(){

        if(request()->id)Type::where('id',request()->id)->update(['status'=>request()->status]);

        $lists = type2Tree(Type::all());

        return view('admin.typeList',compact('lists'));
     }


     // 修改信息
     public function editType(){

         $input = request()->except('_token');

         if(request()->has('del')){
            Type::destroy($input['id']);
            //删除子项
            $sub = Type::where('parent_id',$input['id'])->get(['id']);
            if($sub){
                 $sub = $sub->map(function($subs){
                return $subs->id;
                });
                Type::destroy($sub->toArray());
            };
            return response()->json('删除成功!');
         }

         //新增.修改验证唯一name
         $this->validate(request(),[
            'name' => 'unique:types',
        ]);

         if(request()->has('id') && !empty(request()->id)){

            Type::where('id',$input['id'])->update($input);
            //闪存session
            request()->session()->flash('urlTag',$input['id']);
            return response()->json('修改成功!');
            
         }else{

            $result = Type::create($input);
            //闪存session
            request()->session()->flash('urlTag',$result->id);
            return response()->json('新增成功!');

         }
     }
}
