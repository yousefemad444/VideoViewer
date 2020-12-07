<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\Comments\CommentsRequest;
use App\Models\Comment;

trait CommentTrait {
    public function commentStore(CommentsRequest $request)
    {
        $requestArray=$request->all() + ['user_id' =>auth()->user()->id];
        Comment::create($requestArray);
        return redirect()->route('videos.edit',$requestArray['video_id']);
    }

    public function commentDelete(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('videos.edit',$comment->video_id);
    }

    public function commentUpdate(Comment $comment ,CommentsRequest $request)
    {
        $comment->update($request->all());
        return redirect()->route('videos.edit',$comment->video_id);
    }
}
