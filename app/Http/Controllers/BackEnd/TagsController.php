<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Tags\TagsRequest;
use App\Models\Tag;

class TagsController extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function store(TagsRequest $request)
    {
        $this->model->create($request->all());
        alert()->success('Added Successfully','Done');
        return redirect()->route('tags.index');
    }

    public function update(Tag $tag , TagsRequest $request)
    {
        $tag->update($request->all());
        alert()->success('Updated Successfully','Done');
        return redirect()->route('tags.edit',$tag->id);
    }
}
