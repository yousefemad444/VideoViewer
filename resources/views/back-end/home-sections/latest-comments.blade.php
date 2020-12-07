<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Latest Comments</h4>
            <p class="card-category">Here you can see the latest comments in website</p>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                <th>ID</th>
                <th>Name</th>
                <th>Video</th>
                <th>Comment</th>
                <th>Date</th>
                <th>Control</th>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                 <tr>
                    <td>{{$comment->id}}</td>
                    <td><a href="{{route('users.edit',$comment->user->id)}}">{{$comment->user->name}}</a></td>
                     <td><a href="{{route('videos.edit',$comment->video->id)}}">{{$comment->video->name}}</a></td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        <a href="{{route('comment.delete',$comment->id)}}">  <i class="material-icons">close</i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {!! $comments->links() !!}
        </div>
    </div>
</div>
