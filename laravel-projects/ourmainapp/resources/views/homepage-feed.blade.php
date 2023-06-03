<x-layout>
    <div class="container py-md-5 container--narrow">
        @unless ($posts->isEmpty())
            <h2 class="text-center mb-4">The latest posts from those you follow</h2>
            <div class="list-group">
                @foreach ($posts as $post)
                    <a href="/post/{{ $post->id }}" class="list-group-item list-group-item-action">
                        <img class="avatar-tiny" src="{{ $post->user->avatar }}" />
                        <strong>{{ $post->title }} </strong> <span class="text-muted small">by {{ $post->user->username }}
                            on {{ $post->created_at->format('n/j/Y') }} </span>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <h2>Hello <strong> {{ auth()->user()->username }} </strong>, your feed is empty.</h2>
                <p class="lead text-muted">Your feed displays the latest posts from the people you follow. If you don&rsquo;t
                    have any friends to follow that&rsquo;s okay; you can use the &ldquo;Search&rdquo; feature in the top
                    menu bar to find content written by people with similar interests and then follow them.</p>
            </div>
        </div>
    @endunless

    {{-- <======= Article Card Start =======> --}}
    <div class="container">
        {{-- <h2 class="text-center mb-4 mt-4">The Future post</h2> --}}
        <div class="row main-row p-2 ">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="blog-img">
                    <img class="img-fluid" src="https://www.1zoom.me/prev/297/296865.jpg" alt="">
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-2  ">
                        <ul class="list-group list-group-horizontal ul-cls">
                            <li class="list-group-item text-center">
                                
                                <img class="avatar-tiny" src="https://www.1zoom.me/prev/297/296865.jpg" /><span class="text-muted small">Written by Ishan </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="blog-title">
                    <h2>blog title</h2>
                </div>
                <div class="blog-date">
                    <span> friday</span>
                    <span> 2 june 2020</span>
                </div>

                <div class="blog-desc">
                    <p>
                        This is a wider card with supporting text below as a natural lead-in to additional content. This
                        card has even longer content than the first to show that equal height action.
                    </p>
                </div>
                <div class="blog-read-more">
                    <a href="" class="btn btn-outline-dark">Read more</a>
                </div>
            </div>
        </div>

        

        


    </div>
    {{-- <======= Article Card Ends========>  --}}

</x-layout>
