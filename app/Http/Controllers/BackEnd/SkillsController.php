<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Skills\SkillsRequest;
use App\Models\Skill;

class SkillsController extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }

    public function store(SkillsRequest $request)
    {
        $this->model->create($request->all());
        alert()->success('Added Successfully','Done');
        return redirect()->route('skills.index');
    }

    public function update(Skill $skill , SkillsRequest $request)
    {
        $skill->update($request->all());
        alert()->success('Updated Successfully','Done');
        return redirect()->route('skills.edit',$skill->id);
    }
}
