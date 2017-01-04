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
        $this->path = 'backstage.pages';
        $this->fields_list();
        parent::__construct();
    }

    public function update(Request $request, $id)
    {
        $this->middleware('dun');

        parent::update($request,$request->input('id'));
    }

    public function index(Request $request){


        $model = new \App\Customer();

         $models = $model->get();

        return view('backstage.pages.overdueList', ['models' => $models]);
    }

    protected function query($model){
        $query = $model->orderBy('id');
        return $query;
    }

}
