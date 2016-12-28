<?php

namespace App\Http\Controllers;

use App\Dun;
use App\Http\Traits\CustomInfo;
use Illuminate\Http\Request;
use App\Http\Requests\DunRequest;
class DunController extends ResourceController
{
    use CustomInfo;

    public function __construct()
    {
        $this->model = 'App\Dun';

        $this->fields_list();
        parent::__construct();
    }

    public function update(DunRequest $request)
    {
        $this->middleware('dun');

        parent::update($request,$request->input('id'));
    }


}
