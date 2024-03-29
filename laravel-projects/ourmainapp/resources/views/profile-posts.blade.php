<x-layout>
    <div class="container py-md-5 container--narrow">
        <h2>
          <img class="avatar-small" src="{{$avatar}}" /> {{$username}}
          @auth {{-- only for logged in user see follow and manage avatar button--}}
          @if (!$currentlyFollowing AND auth()->user()->username != $username)
          {{-- Blade code checks if the "$currentlyFollowing" variable is false and if the "username" of the currently authenticated user is not equal to the value of "$username". If both conditions are true, then the code inside the "if" block will be executed. Otherwise, it will be skipped. --}}
          <form class="ml-2 d-inline" action="/create-follow/{{$username}}" method="POST">
            @csrf
            <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
          </form>
          @endif

          @if($currentlyFollowing)
          <form class="ml-2 d-inline" action="/remove-follow/{{$username}}" method="POST">
            @csrf
             <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
          </form>
          @endif

          @if(auth()->user()->username == $username)
            <a href="/manage-avatar" class="btn btn-secondary btn-sm">Manage Avatar</a>
            @endif
          @endauth
          
        </h2>
  
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{$postCount}}</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a>
        </div>
  
        <div class="list-group">
          @foreach ($posts as $post)
          <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
            <img class="avatar-tiny" src="{{$post->user->avatar}}" />
            <strong>{{$post->title}} </strong> {{$post->created_at->format('n/j/Y')}}
          </a>
          @endforeach
        </div>
      </div>
</x-layout>