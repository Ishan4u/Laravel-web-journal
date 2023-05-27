<x-layout>
    <div class="container py-md-5 container--narrow">
        <div class="d-flex justify-content-between">
            <h2>{{ $post->title }} </h2>
            @can('update', $post)
                <span class="pt-2">
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

        {{-- Following part starts --}}
        <h2>
            <img class="avatar-small" src="{{ $post->user->avatar }}" /> <a
                href="/profile/{{ $post->user->username }}">{{ $post->user->username }} </a>
            @auth {{-- only for logged in user see follow and manage avatar button --}}
                @if (!$currentlyFollowing and auth()->user()->username != $post->user->username)
                    {{-- Blade code checks if the "$currentlyFollowing" variable is false and if the "username" of the currently authenticated user is not equal to the value of "$username". If both conditions are true, then the code inside the "if" block will be executed. Otherwise, it will be skipped. --}}
                    <form class="ml-2 d-inline" action="/create-follow/{{ $post->user->username }}" method="POST">
                        @csrf
                        <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                    </form>
                @endif

                @if ($currentlyFollowing)
                    <form class="ml-2 d-inline" action="/remove-follow/{{ $post->user->username }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
                    </form>
                @endif

                @if (auth()->user()->username == $post->user->username)
                    <a href="/manage-avatar" class="btn btn-secondary btn-sm">Manage Avatar</a>
                @endif
            @endauth

        </h2>
        {{-- Following part Ends --}}

        <div class="body-content">
            {!! $post->body !!}
        </div>
    </div>
</x-layout>
