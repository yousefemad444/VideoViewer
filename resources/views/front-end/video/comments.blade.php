<div class="row">
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header card-header-rose">
                <h5>Comments ({{$video->comments->count()}})</h5>
            </div>
            <div class="card-body">
                @foreach($video->comments as $comment)
                    <div class="row">
                        <div class="col-md-8">
                            <i class="nc-icon nc-chat-33"></i> :
                            <a href="{{route('front.profile',['user'=>$comment->user->id,'slug'=>slug($comment->user->name)])}}">{{$comment->user->name}}</a>

                        </div>
                        <div class="col-md-4 text-right">
                                        <span>
                                             <i class="nc-icon nc-calendar-60"></i> {{$comment->created_at}}
                                        </span>

                        </div>
                    </div>
                    <p> {{$comment->comment}}</p>
                    @auth
                        @if(auth()->user()->group=='admin' || auth()->user()->id ==$comment->user->id)
                            <a href=""
                               onclick="$(this).next('div').slideToggle(1000);return false;"
                               class="btn btn-outline-info btn-round mb-2">Edit</a>
                            <div style="display: none">
                                <form action="{{route('front.comment.update',$comment->id)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                                    <textarea name="comment" class="form-control"
                                                              rows="4">{{$comment->comment}}</textarea>
                                    </div>

                                    <button type="submit" class="btn">Update</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
