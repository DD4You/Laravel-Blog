<x-header />
{{-- {{$post}} --}}
<div class="row mt-0 mt-md-5">
    <!-- Posts -->
    <div class="col-lg-8">
        <div class="full_post mt-5">
            <img src="assets/image/{{$post->thumbnail}}" alt="" data-aos="zoom-in" data-aos-easing="ease-out-back">
            <h2 class="post_title" data-aos="fade-right"><span class="text">
                    <div>{{$post->title}}</div>
                </span></h2>
            <div class="content" data-aos="fade-up">{{$post->description}}</div>
        </div>
        <!-- Post Comment -->
        <div class="col-md-12 mt-5 comment_input_box">
            <h4 class="heading" data-aos="fade-right">Post Your Comments</h4>
            <form action="" method="post" data-aos="fade-left">
                <textarea class="form-control" rows="6" aria-label="With textarea"
                    placeholder="Write your comment..."></textarea>
                <button class="post float-end">Post Comment <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
        <div class="col-md-12 full_post_comment" data-aos="fade-down-right">
            <!-- Comment -->
            <div class="comment_box mt-3">
                <div class="comment">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Reprehenderit, inventore Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Molestias,
                    nobis.
                </div>
                <div class="comment_by">
                    Vinay Singh
                </div>
            </div>
            <div class="comment_box mt-3">
                <div class="comment">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Reprehenderit, inventore Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Molestias,
                    nobis.
                </div>
                <div class="comment_by">
                    Unknowen
                </div>
            </div>
            <!-- Comment End -->
        </div>
        <!-- Post Comment End -->
    </div>
    <!-- Posts End -->

    <!-- Right Side -->
    <div class="col-lg-4 mt-5">
        <div class="row">
            <!-- Latest Blog -->
            <x-LatestBlog />
            <!-- Latest Blog End -->

            <!-- Categories -->
            <x-SideCategories />
            <!-- Categories End -->
        </div>
    </div>
    <!-- Right Side End -->
</div>
<x-footer />