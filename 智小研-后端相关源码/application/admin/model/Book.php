<?php

namespace app\admin\model;

use think\Model;


class Book extends Model
{

    

    

    // 表名
    protected $name = 'book';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'dpdata_text'
    ];
    

    
    public function getDpdataList()
    {
        return ['淘宝' => __('Dpdata 淘宝'), '当当' => __('Dpdata 当当')];
    }


    public function getDpdataTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['dpdata']) ? $data['dpdata'] : '');
        $list = $this->getDpdataList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
