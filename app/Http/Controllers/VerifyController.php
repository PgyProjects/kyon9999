<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\CustomInfo;
use Illuminate\Support\Facades\Auth;
use App\Verify;
use App\Customer;
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
        $this->orderBy = 'id';
        $this->path = 'verify';
        $this->fields_list();
        parent::__construct();
    }

//    public function index(Request $request){
//        $model = new $this->model;
//        $whereRaw = ;
//        $query1 = $model->whereRaw($whereRaw)->toSql();
//        $query2 = $model->where($whereRaw)->get()->toArray();
//
//        echo $query1;
//        dd($query2);
//    }

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

    public function index(Request $request)
    {
        $this->manager=1;
//        dd( Customer::find(1)->verify()->get()->toArray() );
//        dd( Verify::where('status',1)->get()->customer());
//        return Verify::where('status',1)->where('verify_by', $this->manager)->get()->customer();//->customer()->get();
//        return Verify::find(1)->customer();
        $model = new $this->model;
        $res = $model::whereHas('verify', function($query){
            $query->where('status',1)->where('manager',$this->manager);
        })
            ->toSql();
        dd($res);
    }


}
