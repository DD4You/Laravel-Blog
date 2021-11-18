<x-header />
<!-- Content -->
<div class="row mt-0 mt-md-5">
    <!-- Posts -->
    <div class="col-lg-8">
        {{-- {{dd($posts)}} --}}
        @foreach ($posts as $post)
                @php
                    $i = $loop->index;
                @endphp
                 <x-Blog imageLeft='{{ $i % 2 == 0 ? true : false }}' :post="$post" :comment="$counts[$i]"/>
        @endforeach
        {{ $posts->links('vendor.pagination.custom') }}
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
