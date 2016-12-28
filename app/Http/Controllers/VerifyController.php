<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\CustomInfo;
use Illuminate\Support\Facades\Auth;

class VerifyController extends ResourceController
{

    use CustomInfo;

    /**
     * 构造函数
     * VerifyController constructor.
     */
    public function __construct()
    {
//        $this->manager = Auth::user()->id;
        $this->model = 'App\Customer';
        $this->fields_list();
        $this->path = 'verify';
        parent::__construct();
    }

    /**
     * 执行审核 通过or拒绝
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request, $id){
        $this->validate($request,[
            'status'=>'required|int',
            'comment'=>'required',
        ]);

        $request -> merge(['verify_at' => date('Y-m-d H:i:s'), 'verifyBy' => $this->manager]);
        return parent::update($request,$id);

        //TODO: 加入修改权限判断?
    }
}
