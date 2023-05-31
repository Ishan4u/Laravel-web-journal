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

    {{-- featured post start --}}
    <div class="f-body">
        <h2 class="text-center mb-4">The feature posts</h2>
        <div class="wrapper">
            <img class="feauture-img" src="https://www.capetours.co.uk/wp-content/uploads/2019/02/Mauritius-beach-800x400.jpg" alt="">
            <div class="text-box">
                <h2>Align image and text aside</h2>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            </div>
        </div>

        <div class="wrapper">
            <img class="feauture-img" src="https://www.capetours.co.uk/wp-content/uploads/2019/02/Mauritius-beach-800x400.jpg" alt="">
            <div class="text-box">
                <h2>Align image and text aside</h2>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            </div>
        </div>
    </div>
    {{-- featured post End   --}}

</x-layout>
