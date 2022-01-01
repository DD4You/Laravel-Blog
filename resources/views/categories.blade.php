<x-header />
<!-- Content -->
<div class="row mt-0 mt-md-5">
    <!-- Posts -->
    <div class="col-lg-8">
        <div class="row g-5" data-aos="fade-right">
            @foreach ($categories as $category)
                <div class="col-md-4 col-sm-6">
                    <a href="{{ url('category/' . $category->id) }}" class="category">
                        <h3 class="name">{{ $category->name }}</h3>
                        <h5 class="post_count">{{ $category->posts->count() }}
                            <span>Post</span>
                        </h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Posts End -->

    <!-- Right Side -->
    <div class="col-lg-4 mt-5">
        <div class="row">
            <!-- Latest Blog -->
            <x-LatestBlog />
            <!-- Latest Blog End -->

            <!-- Latest Comments -->
            <x-LatestComment />
            <!-- Latest Comments End -->

            <!-- Categories -->
            <x-SideCategories />
            <!-- Categories End -->
        </div>
    </div>
    <!-- Right Side End -->
</div>
<!-- Content End -->
<x-footer />
