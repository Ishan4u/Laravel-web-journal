<x-layout>

    <!-- <============ Content section Starts ==========> -->
    <div class="h-container">
        <!-- <========= left-sidebar starts =========> -->
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="/profile/{{ auth()->user()->username }}"><img style="border-radius: 20px;"
                        src="{{ auth()->user()->avatar }}"> My Profile</a>
                <a href="#"><img src="images/news.png"> Feautured articles </a>
                <a href="#"><img src="images/friends.png"> Followers</a>
                {{-- <a href="#"><img src="images/marketplace.png" > Marketplace</a> --}}
                <a href="#"><img src="images/news.png"> HNDIT</a>
                <a href="#">See more</a>
            </div>

            <div class="shortcut-links">
                <p>Your reading list</p>
                <a href="#"><img src="images/shortcut-1.png">Web developers</a>
                <a href="#"><img src="images/shortcut-2.png">Web design course</a>
                <a href="#"><img src="images/shortcut-3.png">Full stack development </a>
                <a href="#"><img src="images/shortcut-4.png">Web developers</a>
            </div>
        </div>
        <!-- <========= left-sidebar ends =========> -->

        <!-- <========= main-content starts =========> -->
        <div class="main-content">

            


            @unless ($posts->isEmpty())
                <!-- <========= Post starts =========> -->
            <div class="posts">
                @foreach($posts as $post)
                <div class="post-card"> {{-- duplicate --}}
                    <div class="post-card-text">
                        <small><img class="author-img"
                                src="{{ $post->user->avatar }}"
                                alt=""><span class="author">{{$post->user->username}}</span><span class="follow">&#x2022;
                                &nbsp;follow</span></small>

                        <h3>{{$post->title}}</h3>
                        <p class="desc">
                            @php
                                $desc = Illuminate\Mail\Markdown::parse(Str::limit($post->body, 200))
                            @endphp
                            {{ strip_tags($desc) }}
                            
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
            <p class="desc">The feed shows posts from people you follow. If you don't have friends to follow, use search to find and follow users with similar interests. You can also check featured posts below.</p>
            
        </div>

        
    </div>
</div>

<!-- <================== Empty Post Ends ==================> -->
            @endunless
            


        </div>
        <!-- <========= main-content ends =========> -->

        <!-- <========= right-sidebar starts =========> -->
        <div class="right-sidebar">

            <div class="sidebar-title">
                <h4>Newest shares you follow</h4>
                <a href="#">See All</a>
            </div>

            <!-- Event -->
            @foreach ($posts as $post)
                <div class="event">
                    <div class="left-event">
                        {{-- <h3>18</h3> --}}
                        <a href="/profile/{{ $post->user->username }}"><img class="le-img"
                                src="{{ $post->user->avatar }}"></a>
                        <span>{{ $post->user->username }} </span>
                    </div>
                    <div class="right-event">
                        <a style="color: #626262;" href="/post/{{ $post->id }}">
                            <h4 style="font-weight: 600;font-size: 14px;">{{ $post->title }}</h4>
                        </a>
                        <p>{{ $post->created_at->format('n/j/Y') }}</p>
                        <a href="/post/{{ $post->id }}">Read Now </a>
                    </div>
                </div>
            @endforeach

            <div>
                {{ $posts->links() }}
            </div>

            {{-- <div class="event">
                <div class="left-event">
                    <h3>18</h3>
                    <span>March</span>
                </div>
                <div class="right-event">
                    <h4>Social Media</h4>
                    <p>Galewela</p>
                    <a href="#">More info </a>
                </div>
            </div> --}}

            <!-- Advertisment start -->
            {{-- <div class="sidebar-title">
                <h4>Advertisment</h4>
                <a href="#">Close</a>
            </div>
            <img src="images/advertisement.png" class="sidebar-ads"> --}}
            <!-- Advertisment Ends -->

            <!-- Conversation  -->
            {{-- <div class="sidebar-title">
                <h4>Conversation</h4>
                <a href="#">Hide chat</a>
            </div>
            <div class="online-list">
                <div class="online">
                    <img src="images/member-1.png">
                </div>
                <p>Ishan</p>
            </div>

            <div class="online-list">
                <div class="online">
                    <img src="images/member-1.png">
                </div>
                <p>Ishan</p>
            </div> --}}
            <!-- End Conversation  -->

        </div>
        <!-- <========= right-sidebar ends =========> -->

    </div>
    <!-- <============ Content section Starts ==========> -->

</x-layout>
