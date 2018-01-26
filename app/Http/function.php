<?php
/**
     * 记录行为日志，并执行该行为的规则
     * @param string $action 行为标识
     * @param string $model 触发行为的模型名
     * @param int $user_id 执行行为的用户id
     * @param int $record_id 触发行为的记录id
     * @return boolean
     * @author huajie <banhuajie@163.com>
     */
    function action_log($action = null, $model = null, $user_id = null , $record_id = null , $remark = null){

        //参数检查
        if(empty($action) || empty($model) || empty($record_id)){
            return back()->withErrors('参数不能为空');
        }

        //插入行为日志
        $data['action_name']      =   $action;
        $data['user_id']        =   $user_id;
        $data['action_ip']      =   ip2long(request()->ip());
        $data['model']          =   $model;
        $data['record_id']      =   $record_id;
        $data['create_time']    =   time();

        //解析日志规则,生成日志备注
        if(!empty($remark)){

            $data['remark']     =   $remark;
           
        }else{
            //未定义日志规则，记录操作url
            $data['remark']     =   '操作url：'.$_SERVER['REQUEST_URI'];
        }

        DB::table('action_log')->insert($data);

    }


    function type2Tree($data , $parent_id = '0' ){

        $array = $data;
        $tree = array();
        foreach ($array as $k => $val) {

            if($val['parent_id'] == $parent_id ){
                $tree[$k] = $val;
                $tree[$k]['childs'] = type2Tree($array,$val['id']);
            }
        }

        return $tree;

    }