<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Comment;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;

class HomeController extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function index()
    {
        $comments=Comment::with('user','video')->orderByDesc('id')->paginate(20);
        $videos_count=Video::count();
        $tags_count=Tag::count();
        $skills_count=Skill::count();
        $comments_count=Comment::count();
        return view('back-end.home',compact('comments','comments_count','videos_count','tags_count','skills_count'));
    }
}
