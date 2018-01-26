<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Type;
use App\Http\Model\Admin\Article;

class ArticleController extends Controller
{

    public function list(){

        if(request()->id){

            if(request()->status == '-1'){

                Article::destroy(request()->id);
                //记录
                action_log('删除文章','article',session('user.id'), request()->id, '删除文章');

            }else{

                Article::where('id',request()->id)->update(['status'=>request()->status]);
            }

        };

        $lists = Article::paginate(15);

        $lists->collection = $lists->map(function ($list) {
                return $list->fill(['type_id'=>Type::where('id',$list->type_id)->value('name')]);
        });
        
        return view('admin.list',compact('lists'));
    }

    // 文章信息
    public function editArticle(){

        if(!request()->has('id')){

            return view('admin.addArticle');

        }else{

            return view('admin.editArticle')->witharticle(Article::find(request()->id));

        }

    }

    //新增/修改
    public function saveArticle(){

        $data = request()->except('_token');

        $this->validate(request(), [
            'title' => 'required|max:150',
            'description' =>'max:200',
            'tags'=>'required',
        ]);


        if(!request()->has('id') && $data){

            $result = Article::create($data);
            $msg = "新增";

        }else{

            $result = Article::where('id',$data['id'])->update($data);
            $msg = "编辑";


        }

        //记录
        action_log($msg,'article',session('user.id'), isset($result->id) ? $result->id : $data['id'],$msg . '文章');

        return back()->withErrors($msg . '成功 !');

    }


    //上传题图
    public function articleImg(){

        return $this->uploadImg();

    }
}
