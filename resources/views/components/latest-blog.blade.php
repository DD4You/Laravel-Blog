<div class="com-md-12 ms-0 ms-md-3 latest_post" data-aos="fade-left">
    <h4 class="heading">Latest from our Blog</h4>

    @foreach ($blogs as $blog)
        <div class="post_box">
            <a href="post/{{$blog->slug}}">
                <img width="70" height="50" class="post_image" src="uploads/post/{{$blog->thumbnail}}" alt="">
            </a>
            <div class="content">
                <a href="post/{{$blog->slug}}" class="post_title">{{Str::substr($blog->title, 0, 35). '...'}}</a>
                <div class="description">
                    {!! Str::substr($blog->description, 0, 68). '...' !!} 
                </div>
            </div>
        </div>
    @endforeach

</div>
