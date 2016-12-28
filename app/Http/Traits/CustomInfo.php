<?php

/**
 * Created by PhpStorm.
 * User: Kyon
 * Date: 2016/12/27
 * Time: 上午9:31
 */
namespace App\Http\Traits;

trait CustomInfo
{
    public function fields_list(){
        $this->fields_all = [
            'id' => [
                'show' => 'ID',
            ],
            'name' => [
                'show' => '姓名',
                'search' => "name like CONCAT('%', ?, '%')"
            ],
            'idCard' => [
                'show' => '身份证号',
            ],
            'phone' => [
                'show' => '手机号',
            ],
            'education' => [
                'show' => '教育程度',
            ],
            'company' => [
                'show' => '公司名称',
            ],
            'company_addr' => [
                'show' => '公司地址',
            ],
            'address' => [
                'show' => '户籍地址',
            ],
            'email' => [
                'show' => '电子邮箱',
            ],
            'ip' => [
                'show' => 'IP地址',
            ],
            'sex' => [
                'show' => '性别',
            ],
            'age' => [
                'show' => '年龄',
            ],
            'native_addr' => [
                'show' => '户籍地址',
            ],
            'manager' => [
                'show' => '客户经理',
            ],
            'verify_status' => [
                'show' => '审核状态',
            ],
            'type' => [
                'show' => '客户类型',
            ],
            'verify_at' => [
                'show' => '审核时间',
            ],
            'verify_comment' => [
                'show' => '审核备注',
            ],
            'wx_name' => [
                'show' => '微信昵称',
            ],
            'wx_img' => [
                'show' => '微信头像',
            ],
            'wx_sex' => [
                'show' => '微信性别',
            ],
            'wx_addr' => [
                'show' => '微信地址',
            ],
            'position' => [
                'show' => '定位信息',
            ],
            'wangling' => [
                'show' => '手机网龄',
            ],
            'zhimafen' => [
                'show' => '芝麻分',
            ],
            'jdbaitiao' => [
                'show' => '京东白条',
            ],
            'huabei' => [
                'show' => '花呗额度',
            ],
        ];

        $this->fields_index = ['id','name','idCard','phone'];
        $this->fields_edit = [];
        $this->fields_create = [];
        $this->fields_show = [];
    }
}