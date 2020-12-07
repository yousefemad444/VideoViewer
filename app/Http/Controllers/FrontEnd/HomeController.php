<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\Messages\MessagesRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos=Video::published()->orderByDesc('id');
        if (request()->has('search')&& request()->search != ''){
            $videos=$videos->where('name','like',"%" .request()->search."%");
        }
        $videos=$videos->paginate(30);
        return view('front-end.home',compact('videos'));
    }

    public function category(Category $category){
        $videos=$category->videos()->published()->orderByDesc('id')->paginate(30);
        return view('front-end.category.index',compact('videos','category'));
    }

    public function skills(Skill $skill){
        $videos=$skill->videos()->published()->orderByDesc('id')->paginate(30);
        return view('front-end.skill.index',compact('videos','skill'));
    }
    public function tags(Tag $tag){
        $videos=$tag->videos()->published()->orderByDesc('id')->paginate(30);
        return view('front-end.tag.index',compact('videos','tag'));
    }

    public function video(Video $video){
        $video=Video::with('skills','comments.user','tags','category','user')->find($video->id);
        return view('front-end.video.index',compact('video'));
    }

    public function page(Page $page ,$slug=null){
        return view('front-end.page.index',compact('page'));
    }

    public function messageStore(MessagesRequest $request){
        Message::create($request->all());
        alert()->success('Your Message Have been sent','Done');
        return redirect()->route('frontend.landing');
    }

    public function welcome(){
        $videos=Video::published()->orderByDesc('id')->paginate(9);
        $videos_count=Video::published()->count();
        $tags_count=Tag::count();
        $comments_count=Comment::count();
        return view('front-end.welcome',compact('videos','videos_count','tags_count','comments_count'));
    }


}
