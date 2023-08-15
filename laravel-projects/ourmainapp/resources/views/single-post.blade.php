<x-layout>

    <div class="banner">
        <div class="banner-bg">
            <img src="{{ $post->thumb }}" alt="">
        </div>
        <div class="banner-img">
            <img src="{{ $post->thumb }}" alt="">
        </div>
    </div>


    <div class="container py-md-5 container--narrow">



        {{-- <div class="d-flex justify-content-between">
            <img class="thumb" src="{{ $post->thumb }}" alt="">
        </div> --}}

        <div class="d-flex justify-content-between">
            <h2>{{ $post->title }} </h2>
            @can('update', $post)
                <span class="pt-2">
                    {{-- Start - Featured buttton --}}

                    <button data-post-id="{{ $post->id }}" data-status="{{ $post->isFeatured == '0' ? '1' : '0' }}"
                        class="delete-post-button {{ $post->isFeatured == '0' ? 'text-success' : 'text-warning' }} mr-2 btn_feature"
                        data-toggle="tooltip" data-placement="top"
                        title="{{ $post->isFeatured == '0' ? 'Featured' : 'Not Featured' }}">
                        <i class="{{ $post->isFeatured == '0' ? 'far fa-star' : 'fas fa-star' }}"></i>
                    </button>

                    {{-- End - Featured buttton   --}}

                    <a href="/post/{{ $post->id }}/edit" class="text-primary mr-2" data-toggle="tooltip"
                        data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                    <form class="delete-post-form d-inline" action="/post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top"
                            title="Delete"><i class="fas fa-trash"></i></button>
                    </form>
                </span>
            @endcan
        </div>

        {{-- <p class="text-muted small mb-4">
            <a href="/profile/{{ $post->user->username }}"><img class="avatar-tiny"
                    src="{{ $post->user->avatar }}" /></a>
            Posted by <a href="/profile/{{ $post->user->username }}">{{ $post->user->username }} </a> on
            {{ $post->created_at->format('n/j/Y') }}
        </p> --}}

        <div class="profile-details"> {{-- Author profile start --}}
            <div class="pd-left">
                <div class="pd-row">
                    <a href="/profile/{{ $post->user->username }}"><img class="pd-image"
                            src="{{ $post->user->avatar }}" /></a>
                    <div>
                        <h3>Written by <a href="/profile/{{ $post->user->username }}">{{ $post->user->username }} </a>
                        </h3>
                        <p>Date published : {{ $post->created_at->format('n/j/Y') }} </p>

                    </div>
                </div>
            </div>
            <div class="pd-right">
                @auth
                    @if (!$currentlyFollowing and auth()->user()->username != $post->user->username)
                        <form class="ml-2 d-inline" action="/create-follow/{{ $post->user->username }}" method="POST">
                            @csrf
                            <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                        </form>
                    @endif

                    {{-- @if ($currentlyFollowing)
                        <form class="ml-2 d-inline" action="/remove-follow/{{ $post->user->username }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
                        </form>
                    @endif --}}
                @endauth
            </div>
        </div> {{-- Author profile Ends --}}






        <div class="body-content">
            {!! $post->body !!}

        </div>
    </div>
</x-layout>
