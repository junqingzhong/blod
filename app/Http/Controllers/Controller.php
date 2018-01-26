<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use resources\orm\Uploader;
use Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     //上传题图
    /**
             * $imgMsg得到上传文件所对应的各个参数,数组结构
             * array(
             *     "state" => "",          //上传状态，上传成功时必须返回"SUCCESS"
             *     "url" => "",            //返回的地址
             *     "title" => "",          //新文件名
             *     "original" => "",       //原始文件名
             *     "type" => ""            //文件类型
             *     "size" => "",           //文件大小
             * )
             */
            /* 返回数据 */
    public function uploadImg(){

        $fieldName = 'upImg';

        $config = array(
                    "pathFormat" => "/upload/image/".date('Ymd').'/'.time().rand(1,6),
                    "maxSize" => 1024000*2,
                    "allowFiles" =>[".png", ".jpg", ".jpeg", ".gif", ".bmp"],
                );

        /* 生成上传实例对象并完成上传 */
        $up = new Uploader($fieldName, $config, 'upload');
        $imgMsg = $up->getFileInfo();
        if($imgMsg['state'] == 'SUCCESS'){

            //加水印
            $water = Image::make(public_path().'\logo.gif')->opacity(50);
            $newImg = Image::make(public_path().$imgMsg['url'])->insert($water, 'bottom-right', 5, 5)->save(public_path().$imgMsg['url']);

        }else {

            $imgMsg = $imgMsg['state'];

        }
        return json_encode($imgMsg);

    }
}
