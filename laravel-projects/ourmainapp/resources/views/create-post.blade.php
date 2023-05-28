<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/create-post" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
            <input value=" {{old('title')}} " name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('title')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}} </p>
            @enderror
          </div>
  
          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
            <textarea name="body" id="post-body" class="body-content tall-textarea form-control" type="text">{{old('body')}} </textarea>
            @error('body')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}} </p>
            @enderror
          </div>

          {{-- Start post image upload HTML --}}
          <label for="post-thumb" class="text-muted mb-1"><small>Thumbnail photo</small></label><br>
          <input type="file" name="thumb" id="thumb">
          @error('thumb')
          <p class="alert small alert-danger shadow-sm ">{{$message}} </p>
          @enderror
          <div class="image-preview" id="imagePreview">
              <img src="" alt="Image Preview" class="image-preview__image">
              <span class="image-preview__default-text">Image imagePreview</span>
          </div>
          {{-- Start post image upload HTML  --}}
  
          <button class="btn btn-primary">Save New Post</button>
        </form>
      </div>
</x-layout>