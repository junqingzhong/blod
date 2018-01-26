<?php

namespace App\Http\Model\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Notifiable;
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['name','logo','sex','phone','email','password','description','ip','status','remember_token','create_time'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUpdatedAtColumn() {
        return null;
    }

    /**
     * 用户登录认证
     * @param  string  $username 用户名
     * @param  string  $password 用户密码
     * @param  integer $type     用户名类型 （1-用户名，2-邮箱，3-手机，4-UID）
     * @return integer           登录成功-用户ID，登录失败-错误编号
     */
    public function checkLogin($name,$password,$type = 1){

        switch ($type) {
            case '1':
                $where['name'] = $name;
                break;
            case '2':
                $where['email'] = $name;
                break;
            default:
                $where['phone'] = $name;
                break;
        }

        $user = $this->where($where)->first();

        if($user && $user->status == '1'){

            // 与解密后相比较
            if($password === decrypt($user->password) ){

                $this->updateLogin($user->id);
                return $user; //登录成功

            }else{

                return 0;//密码错误
            }
            
        }else{

            return -1;//用户不存在或被禁用
        }
    }

     /**
     * 更新用户登录信息
     * @param  integer $uid 用户ID
     */
    protected function updateLogin($id){

        $data= array(
            'id' => $id,
            'ip' => ip2long(request()->ip()),
            'logintime' => time(),
            );

        $this->where('id',$id)->increment('login',1,$data);

    }
}
