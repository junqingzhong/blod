<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['name','type','title','group','extra','remark','value','create_time','update_time'];
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time'; // 同上
}
