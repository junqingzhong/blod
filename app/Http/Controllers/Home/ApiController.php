<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Model\Admin\User;
use App\Http\Model\Admin\Article;

class ApiController extends Controller
{
    public function getUser(){

        return response()->json(User::find('1'));
    }


    public function getArticle(){

        if(request()->has('id')){

            $result = Article::where(['id'=>request()->id,'status'=>'1'])->first();

            //下一遍同类型的
            $result->next=Article::where(['type_id'=>$result->type_id,'status'=>'1'])->where('id','>',$result->id)->first(['id','title','create_time','description','img_path','status']);


        }else{

            $result = Article::where('status','1')->get(['id','title','create_time','description','img_path','status']);
        }

        return response()->json($result);

    }
}
