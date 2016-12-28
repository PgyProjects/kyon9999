<?php

namespace App\Http\Controllers;

use App\Http\Traits\CustomInfo;
use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;

class LoanController extends ResourceController
{
    use CustomInfo;

    public function __construct()
    {
        $this->model = 'App\Loan';
        $this->fields_list();
        $this->path = 'loan';
        parent::__construct();
    }

    public function update(LoanRequest $request)
    {
        //todo :: request里 过滤请求条件 , 中间件里 验证权限
        $this->middleware('loan');

        return parent::update($request,$request->input('id'));
    }
}
