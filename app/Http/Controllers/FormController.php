<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;

abstract class FormController extends Controller
{
    // 对应的模型 -> 表示这个Controller是对哪个Model进行单表操作的
    protected $model;

    public $controller_name;

    // 所有的字段 -> 显示名字，字段是否要进行搜索，字段类型是什么
    public $fields_all;

    // 列表index页中需要显示的字段
    public $fields_index;

    // 编辑edit页面需要显示的字段
    public $fields_edit;

    // 创建create页面中要显示的字段
    public $fields_create;

    // 详情show页面中要显示的字段
    public $fields_show;

    // 声明index方法对应的view页面路径
    public $path;

    // 构造方法
    public function __construct()
    {

        // TODO:做一些基础的判断，如果没有的话就抛出异常

        $route = Route::currentRouteAction();
        list($this->controller, $action) = explode('@', $route);

        // 取得Controller 的名字，不包含命名空间.
        $this->controller_name = substr($this->controller, strrpos($this->controller, "\\") + 1);
        view()->share('controller', $this->controller_name);

        $fields_index = array();
        foreach ($this->fields_index as $field) {
            $fields_index[$field] = $this->fields_all[$field];
        }
        view()->share('fields_index', $fields_index);

        $fields_edit = array();
        foreach ($this->fields_edit as $field) {
            $fields_edit[$field] = $this->fields_all[$field];
        }
        view()->share('fields_edit', $fields_edit);

        $fields_create = array();
        foreach ($this->fields_create as $field) {
            $fields_create[$field] = $this->fields_all[$field];
        }
        view()->share('fields_create', $fields_create);

        $fields_show = array();
        foreach ($this->fields_show as $field) {
            $fields_show[$field] = $this->fields_all[$field];
        }
        view()->share('fields_show', $fields_show);
    }


    /*下面开始重写resource路由的控制器方法*/


    /**
     * Index方法
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $model = new $this->model;
        $builder = $model->orderBy('id', 'desc');

        $input = $request->all();
        foreach ($input as $field => $value) {
            if (empty($value)) {
                continue;
            }
            if (!isset($this->fields_all[$field])) {
                continue;
            }
            $search = $this->fields_all[$field];
            $builder->whereRaw($search['search'], [$value]);
        }
        $models = $builder->paginate(20);

        return view($this->path.'/lists', [
            'models' => $models,
        ]);
    }


    /**
     * create方法
     *
     * @param null $arr
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($arr=null)
    {
//        return view($this->path.'/add', [$arr]);
    }

    //store方法
    public function store(Request $request)
    {
        $model = new $this->model;
        $model->fill($request->all())->save();
        return Redirect::to(action($this->controller_name.'@index'));
    }

    //edit方法
    public function edit($id)
    {
        $model = new $this->model;
        $model = $model->find($id);
        return view($this->path.'/edit', compact('model'));
    }

    //update方法
    public function update(Request $request,$id)
    {
        $model = new $this->model;
        $model = $model->find($id);
        $model->fill($request->all());
        $model->save();
        return $this->controller_name;
        return Redirect::to(action($this->controller_name . '@index'));
    }

    //destroy方法
    public function destroy($id)
    {
        $model = new $this->model;
        $model->destroy($id);

        return redirect()->to(action($this->controller_name . '@index'));
    }

    public function show($id){
        $model = new $this->model;
        $model->find($id);

        return view($this->path.'/show', compact('model'));
    }
}
