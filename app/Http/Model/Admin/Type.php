<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps =false;
    protected $fillable = ['parent_id','name','sort','status'];

}
