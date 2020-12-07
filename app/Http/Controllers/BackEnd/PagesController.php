<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Pages\PagesRequest;
use App\Models\Page;

class PagesController extends BackEndController
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function store(PagesRequest $request)
    {
        $this->model->create($request->all());
        alert()->success('Added Successfully','Done');
        return redirect()->route('pages.index');
    }

    public function update(Page $page, PagesRequest $request)
    {
        $page->update($request->all());
        alert()->success('Updated Successfully','Done');
        return redirect()->route('pages.edit', $page->id);
    }
}
