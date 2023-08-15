<x-layout>
    <div class="h-container">
        <!-- left-sidebar starts -->
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="#"><img src="images/news.png" > Latest News</a>
                <a href="#"><img src="images/friends.png" > friends</a>
                <a href="#"><img src="images/group.png" > Group</a>
                <a href="#"><img src="images/marketplace.png" > Marketplace</a>
                <a href="#"><img src="images/watch.png" > watch</a>
                <a href="#">See more</a>
            </div>

            <div class="shortcut-links">
                <p>Your Shortcuts</p>
                <a href="#"><img src="images/shortcut-1.png" >Web developers</a>
                <a href="#"><img src="images/shortcut-2.png" >Web design course</a>
                <a href="#"><img src="images/shortcut-3.png" >Full stack development </a>
                <a href="#"><img src="images/shortcut-4.png" >Web developers</a>
            </div>
        </div>
        <!-- left-sidebar ends -->

        <!-- main-content starts -->
        <div class="main-content">

            <div class="write-post-container">
                 
                <div class="user-profile">
                     <img src="images/profile-pic.png" >
                     <div>
                        <p>Ishan</p>
                        <small>Public</small>
                     </div>
                </div>

                <!-- input container -->
                <div class="post-input-container">
                    <textarea name="" id=""  rows="3" placeholder="What's on your mind, ishan"></textarea>
                </div>

            </div>

            <!-- post container -->
            <div class="post-container">
                <div class="user-profile">
                    <img src="images/profile-pic.png" >
                    <div>
                        <p>Ishan</p>
                        <span>june 15, 2023</span>
                    </div>
                </div>
                <p class="post-text">Learn advance php step by step</p>
                <img src="images/feed-image-1.png" class="post-img">
            </div>

            <!-- 2 -->
            <div class="post-container">
                <div class="user-profile">
                    <img src="images/profile-pic.png" >
                    <div>
                        <p>Ishan</p>
                        <span>june 15, 2023</span>
                    </div>
                </div>
                <p class="post-text">Learn advance php step by step</p>
                <img src="images/feed-image-1.png" class="post-img">
            </div>

            <!-- 3 -->
            <div class="post-container">
                <div class="user-profile">
                    <img src="images/profile-pic.png" >
                    <div>
                        <p>Ishan</p>
                        <span>june 15, 2023</span>
                    </div>
                </div>
                <p class="post-text">Learn advance php step by step</p>
                <img src="images/feed-image-1.png" class="post-img">
            </div>

            

        </div>
        <!-- main-content ends -->

        <!-- right-sidebar starts -->
        <div class="right-sidebar">

            <div class="sidebar-title">
                <h4>Events</h4>
                <a href="#">See All</a>
            </div>

            <!-- Event -->
            <div class="event">
                <div class="left-event">
                    <h3>18</h3>
                    <span>March</span>
                </div>
                <div class="right-event">
                    <h4>Social Media</h4>
                    <p>Galewela</p>
                    <a href="#">More info </a>
                </div>
            </div>

            <div class="event">
                <div class="left-event">
                    <h3>18</h3>
                    <span>March</span>
                </div>
                <div class="right-event">
                    <h4>Social Media</h4>
                    <p>Galewela</p>
                    <a href="#">More info </a>
                </div>
            </div>

            <!-- Advertisment start -->
            <div class="sidebar-title">
                <h4>Advertisment</h4>
                <a href="#">Close</a>
            </div>
            <img src="images/advertisement.png" class="sidebar-ads">
            <!-- Advertisment Ends -->

            <!-- Conversation  -->
            <div class="sidebar-title">
                <h4>Conversation</h4>
                <a href="#">Hide chat</a>
            </div>
            <div class="online-list">
                <div class="online">
                    <img src="images/member-1.png" >
                </div>
                <p>Ishan</p>
            </div>

            <div class="online-list">
                <div class="online">
                    <img src="images/member-1.png" >
                </div>
                <p>Ishan</p>
            </div>

        </div>
        <!-- right-sidebar ends -->

    </div>

</x-layout>


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