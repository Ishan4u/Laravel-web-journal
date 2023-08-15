<x-homepage>
    @unless ($feauturedPosts->isEmpty())
                <!-- <========= Post starts =========> -->
                <div class="posts">
                    @foreach ($feauturedPosts as $feauturedPost)
                        <div class="post-card"> {{-- duplicate --}}
                            <div class="post-card-text">
                                <small><img class="author-img" src="{{ $feauturedPost->user->avatar }}" alt=""><span
                                        class="author">{{ $feauturedPost->user->username }}</span><span class="following">&#x2022;
                                        &nbsp;following</span></small>

                                <h3>{{ $feauturedPost->title }}</h3>
                                <p class="desc">
                                    @php
                                        $desc = Illuminate\Mail\Markdown::parse(Str::limit($feauturedPost->body, 200));
                                        // $text = htmlentities($desc);
                                    @endphp
                                    {!! strip_tags($desc) !!}
                                </p>
                                <a class="btn-read" href="/post/{{ $feauturedPost->id }}">Read More</a>
                            </div>

                            <div class="post-card-photo">
                                <img class="post-card-img" src="{{ $feauturedPost->thumb }}" alt="">
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

                            <h3>Hello {{ auth()->user()->username }}, Feautured post is empty.</h3>
                            

                        </div>


                    </div>
                </div>

                <!-- <================== Empty Post Ends ==================> -->
            @endunless
</x-homepage>