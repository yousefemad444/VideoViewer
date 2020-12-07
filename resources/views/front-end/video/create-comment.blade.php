@if(auth()->user())
    <form action="{{route('front.comment.store',$video->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label class="text-capitalize">Add Comment</label>
            <textarea name="comment" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endif
