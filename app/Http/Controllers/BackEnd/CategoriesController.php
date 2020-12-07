<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Categories\CategoriesRequest;
use App\Models\Category;

class CategoriesController extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function store(CategoriesRequest $request)
    {
       $this->model->create($request->all());
        alert()->success('Added Successfully','Done');
        return redirect()->route('categories.index');
    }

    public function update(Category $category , CategoriesRequest $request)
    {
        $category->update($request->all());
        alert()->success('Updated Successfully','Done');
        return redirect()->route('categories.edit',$category->id);
    }
}
