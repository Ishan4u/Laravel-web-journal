<x-homepage>
    @unless ($posts->isEmpty())
        <!-- <========= Post starts =========> -->
        <div class="posts">
            @foreach ($posts as $post)
                <div class="post-card"> {{-- duplicate --}}
                    <div class="post-card-text">
                        <small><img class="author-img" src="{{ $post->user->avatar }}" alt=""><span
                                class="author">{{ $post->user->username }}</span><span class="following">&#x2022;
                                &nbsp;following</span></small>

                        <h3>{{ $post->title }}</h3>
                        <p class="desc">
                            @php
                                $desc = Illuminate\Mail\Markdown::parse(Str::limit($post->body, 200));
                                // $text = htmlentities($desc);
                            @endphp
                            {!! strip_tags($desc) !!}
                        </p>
                        <a class="btn-read" href="/post/{{ $post->id }}">Read More</a>
                    </div>

                    <div class="post-card-photo">
                        <img class="post-card-img" src="{{ $post->thumb }}" alt="">
                    </div>
                </div>
            @endforeach

        </div>
        <!-- <=========== Post Ends ==========> -->
    @else
        <!-- <========= Empty Post starts =========> -->
        <div class="posts">
            <div class="post-card"> {{-- duplicate --}}

                <div class="post-card-text">

                    <h3>Hello {{ auth()->user()->username }}, your feed is empty.</h3>
                    <p class="desc">The feed shows posts from people you follow. If you don't have friends to
                        follow, use search to find and follow users with similar interests. You can also check
                        featured posts below.</p>

                    <div style="display: flex; justify-content:space-evenly">
                        {{-- <a class="btn-read" href="#"><i  class='fas fa-search header-search-icon-2' style=" margin-right:10px;" ></i>Search interests</a> --}}
                        <a class="btn-read" href="/feautured"><i class='fas fa-star' style="margin-right:10px;" ></i>View Featured Posts</a>
                    </div>

                </div>


            </div>
        </div>

        <!-- <================== Empty Post Ends ==================> -->
    @endunless
</x-homepage>
