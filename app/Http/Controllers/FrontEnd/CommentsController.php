<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\Comments\CommentsRequest;
use App\Models\Comment;
use App\Models\Video;

class CommentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Video $video,CommentsRequest $request){
        $video->comments()->create([
            'user_id'=>auth()->user()->id,
            'comment'=>$request->comment
        ]);
        alert()->success('Your Comment Have been Added','Done');
        return redirect()->route('frontend.video',$video->id);
    }

    public function update(Comment $comment,CommentsRequest $request){
        if (($comment->user_id == auth()->user()->id) || auth()->user()->group =='admin'){
            $comment->update(['comment'=>$request->comment]);
            alert()->success('Your Comment Have been Updated','Done');
        }else{
            alert()->error('We Dont Fount This Comment','Sorry');
        }
        return redirect()->route('frontend.video',$comment->video_id);
    }

}
