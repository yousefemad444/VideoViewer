<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Videos\UpdateVideosRequest;
use App\Http\Requests\BackEnd\Videos\VideosRequest;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;

class VideosController extends BackEndController
{
    use CommentTrait;
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    public function with()
    {
        return ['category', 'user'];
    }

    protected function append()
    {

        $array = [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments'=>[]
        ];
        $video = request()->route()->parameter('video');
        if ($video) {
            $array['selectedSkills'] = $this->model->find($video)->skills()->pluck('skills.id')->toArray();
            $array['selectedTags'] = $this->model->find($video)->tags()->pluck('tags.id')->toArray();
            $array['comments'] = $this->model->find($video)->comments()->orderByDesc('id')->with('user')->get();
        }

        return $array;
    }

    public function store(VideosRequest $request)
    {
        $fileName=$this->uploadImage($request);
        $requestArray =['user_id' => auth()->user()->id ,'image'=> $fileName]+$request->all();
        $row = $this->model->create($requestArray);
        $this->syncTagsSkills($row,$requestArray);
        alert()->success('Added Successfully','Done');
        return redirect()->route('videos.index');
    }

    public function update(Video $video, UpdateVideosRequest $request)
    {
        $requestArray = $request->all();
        if ($request->hasFile('image') && $request->image != null){
           $fileName=$this->uploadImage($request);
            $requestArray=['image'=> $fileName] +$requestArray;
        }
        $video->update($requestArray);
        $this->syncTagsSkills($video,$requestArray);
        alert()->success('Updated Successfully','Done');
        return redirect()->route('videos.edit', $video->id);
    }

    protected function syncTagsSkills($row,$requestArray){
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $row->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $row->tags()->sync($requestArray['tags']);
        }
    }

    protected function uploadImage($request){
        $file=$request->image;
        $fileName=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images/videos'),$fileName);
        return $fileName;
    }
}
