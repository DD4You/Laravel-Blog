@if ($imageLeft == true)
    <section data-aos="zoom-in-up">
        <div class="card post_card mt-5">
            <div class="row tag_date" tag-date="{{ date('M d, Y', strtotime($postDate)) }}">
                <div class="col-md-5 text-center">
                    <a href="{{url('post/'.$slug)}}">
                        <img width="285" height="200" src="{{ asset('uploads/post/' . $thumbnail) }}"
                            class="post_image" alt="" style="--b: 53% 47% 74% 26% / 32% 30% 70% 68%">
                    </a>
                </div>
                <div class="col-md-7">
                    <h2>
                        <a href="{{url('post/'.$slug)}}" class="post_title">
                            {{ $title }}
                        </a>
                    </h2>
                    <div>{{ $category }} | {{ $commentCount }} Comments | {{ $timeToRead }} to read</div>
                    <div class="content justify">
                        {!! $description !!}
                    </div>
                    <div class="df_jcsb">
                        <div class="social_icons">
                            <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-whatsapp"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <a href="{{url('post/'.$slug)}}" class="read_more">
                            <i class="far fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <section data-aos="zoom-in-up">
        <div class="card post_card mt-5">
            <div class="row tag_date" tag-date="{{ date('M d, Y', strtotime($postDate)) }}">
                <div class="col-md-7">
                    <h2>
                        <a href="{{url('post/'.$slug)}}" class="post_title">
                            {{ $title }}
                        </a>
                    </h2>
                    <div>{{ $category }} | {{ $commentCount }} Comments | {{ $timeToRead }} to read</div>
                    <div class="content justify">
                        {{ $description }}
                    </div>
                    <div class="df_jcsb">
                        <div class="social_icons">
                            <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-whatsapp"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <a href="{{url('post/'.$slug)}}" class="read_more">
                            <i class="far fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <a href="{{url('post/'.$slug)}}">
                        <img width="285" height="200" src="{{ asset('uploads/post/' . $thumbnail) }}" class="post_image"
                            alt="" style="--b: 53% 47% 74% 26% / 32% 30% 70% 68%">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif
