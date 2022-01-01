<div class="col-md-12 ms-0 ms-md-3 latest_comment">
    <h4 class="heading mt-3">Latest Comments</h4>
    @foreach ($comments as $comment)
        <div class="comment_box mt-3" data-aos="fade-left">
            <div class="comment">
                {{ Str::substr($comment->comment, 0, 125) . '...' }}
            </div>
            <div class="comment_by">
                Unknown on <a href="{{url('post/'.$comment->post->slug)}}">{{ Str::substr($comment->post->title, 0, 15).'...' }}</a>
            </div>
        </div>
    @endforeach
</div>
