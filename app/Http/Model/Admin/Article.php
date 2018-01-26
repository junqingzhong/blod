<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // public $timestamps = false;
    protected $fillable = ['type_id','title','description','img_path','tags','audio_path','content','sort','create_time','update_time'];
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time'; // 同上
}
