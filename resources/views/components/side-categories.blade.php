<div class="col-md-12 ms-0 ms-md-3 categories" data-aos="fade-left">
    <h4 class="heading">Categories</h4>
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="/category/{{$category->id}}"><i class="fas fa-band-aid"></i> {{$category->name}} ({{$category->count}})</a>
            </li>
        @endforeach
    </ul>
</div>
