<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BackEndController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with=$this->with();
        if (!empty($with)){
            $rows=$rows->with($with);
        }
        $rows = $rows->paginate(10);

        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $page_title = 'Control ' . $moduleName;
        $page_description = 'Here You can add / edit / delete ' . $moduleName;

        return view('back-end.' . $this->getClassNameFromModel() . '.index', compact('rows', 'moduleName', 'page_title', 'page_description', 'sModuleName', 'routeName'));
    }

    public function create()
    {
        $moduleName = $this->getModelName();
        $page_title = ' Create ' . $moduleName;
        $page_description = 'Here You can Create  ' . $moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append=$this->append();
        return view('back-end.' . $folderName . '.create', compact('moduleName', 'page_title', 'page_description', 'folderName', 'routeName'))->with($append);
    }

    public function edit($id)
    {
        $row = $this->model->findOrFail($id);
        $moduleName = $this->getModelName();
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append=$this->append();
        $page_title = ' Edit ' . $moduleName;
        $page_description = 'Here You can edit  ' . $moduleName;
        return view('back-end.' . $folderName . '.edit', compact('row', 'moduleName', 'page_title', 'page_description', 'folderName', 'routeName'))->with($append);
    }

    public function filter($row)
    {
        return $row;
    }

    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();
        alert()->success('Deleted Successfully','Done');
        return redirect()->route($this->getClassNameFromModel() . '.index');
    }

    protected function getClassNameFromModel()
    {

        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName()
    {
        return Str::plural($this->getModelName());
    }

    protected function getModelName()
    {
        return class_basename($this->model);
    }

    protected function with(){
        return[];
    }
    protected function append(){
        return [];
    }

}
