<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use resources\orm\Uploader;
use Image;

class UploadController extends Controller
{

    private $CONFIG;

    public function __construct(){

        $this->CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(public_path().'\admin\assets\ueditor-1.4.3\config.json')), true);

    }
    /*
    *ueditor上传配置
     */
    public function upload(){

        if(request()->has('action')){

            switch (request()->input('action')) {
            case 'config':
                $result =  json_encode($this->CONFIG);
                break;

            /* 上传图片 */
            case 'uploadimage':
            /* 上传涂鸦 */
            case 'uploadscrawl':
            /* 上传视频 */
            case 'uploadvideo':
            /* 上传文件 */
            case 'uploadfile':
                $result = $this->uploadfile();
                break;

            /* 列出图片 */
            // case 'listimage':
            //     $result = include("action_list.php");
            //     break;
            /* 列出文件 */
            // case 'listfile':
            //     $result = include("action_list.php");
            //     break;

            /* 抓取远程文件 */
            // case 'catchimage':
            //     $result = include("action_crawler.php");
            //     break;
            default:
                $result = json_encode(array(
                    'state'=> '请求地址出错'
                ));
                break;
                    }
         };
        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                   echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
             } else {
                 echo json_encode(array(
                      'state'=> 'callback参数不合法'
                  ));
               }
        } else {
             echo $result;
        }
    }
    /**
         * 得到上传文件所对应的各个参数,数组结构
         * array(
         *     "state" => "",          //上传状态，上传成功时必须返回"SUCCESS"
         *     "url" => "",            //返回的地址
         *     "title" => "",          //新文件名
         *     "original" => "",       //原始文件名
         *     "type" => ""            //文件类型
         *     "size" => "",           //文件大小
         * )
         */
    protected function uploadfile(){

        /* 上传配置 */
        $base64 = "upload";
        switch (htmlspecialchars(request()->input('action'))) {
            case 'uploadimage':
                $config = array(
                    "pathFormat" => $this->CONFIG['imagePathFormat'],
                    "maxSize" => $this->CONFIG['imageMaxSize'],
                    "allowFiles" => $this->CONFIG['imageAllowFiles']
                );
                $fieldName = $this->CONFIG['imageFieldName'];
                break;
            case 'uploadscrawl':
                $config = array(
                    "pathFormat" => $this->CONFIG['scrawlPathFormat'],
                    "maxSize" => $this->CONFIG['scrawlMaxSize'],
                    "allowFiles" => $this->CONFIG['scrawlAllowFiles'],
                    "oriName" => "scrawl.png"
                );
                $fieldName = $this->CONFIG['scrawlFieldName'];
                $base64 = "base64";
                break;
            case 'uploadvideo':
                $config = array(
                    "pathFormat" => $this->CONFIG['videoPathFormat'],
                    "maxSize" => $this->CONFIG['videoMaxSize'],
                    "allowFiles" => $this->CONFIG['videoAllowFiles']
                );
                $fieldName = $this->CONFIG['videoFieldName'];
                break;
            case 'uploadfile':
            default:
                $config = array(
                    "pathFormat" => $this->CONFIG['filePathFormat'],
                    "maxSize" => $this->CONFIG['fileMaxSize'],
                    "allowFiles" => $this->CONFIG['fileAllowFiles']
                );
                $fieldName = $this->CONFIG['fileFieldName'];
                break;
        }
        /* 生成上传实例对象并完成上传 */
        $up = new Uploader($fieldName, $config, $base64);

        $imgMsg = $up->getFileInfo();
        if($imgMsg['state'] == 'SUCCESS'){

            if(request()->input('action') == 'uploadimage'){
                //加水印
                $water = Image::make(public_path().'\logo.gif')->opacity(50);
                $newImg = Image::make(public_path().$imgMsg['url'])->insert($water, 'bottom-right', 5, 5)->save(public_path().$imgMsg['url']);
            }

        }else {

            $imgMsg = $imgMsg['state'];

        }

        /* 返回数据 */
        return json_encode($up->getFileInfo());

    }
}
