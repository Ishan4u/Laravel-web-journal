<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            <p><small><strong><a href="/post/{{ $post->id }}">&laquo; Back to post</a></strong></small></p>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
                <input value=" {{ old('title', $post->title) }} " name="title" id="post-title"
                    class="form-control form-control-lg form-control-title" type="text" placeholder=""
                    autocomplete="off" />
                @error('title')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }} </p>
                @enderror
            </div>

            <div class="form-group">
                <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
                <textarea name="body" id="post-body" class="body-content tall-textarea form-control" type="text">{{ old('body', $post->body) }} </textarea>
                @error('body')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }} </p>
                @enderror
            </div>

            {{-- Start post image upload HTML --}}
            <label for="post-thumb" class="text-muted mb-1"><small>Thumbnail photo</small></label><br>
            <input type="file" name="thumb" id="thumb">
            @error('thumb')
                <p class="alert small alert-danger shadow-sm ">{{ $message }} </p>
            @enderror
            <div class="image-preview" id="imagePreview">
                <img src="" alt="Image Preview" class="image-preview__image">
                <span class="image-preview__default-text">Image imagePreview</span>
            </div>
            {{-- Start post image upload HTML  --}}

            <button class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    {{-- Start post image upload js --}}
    <script>
        const thumb = document.getElementById("thumb");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview__image");
        const previewDefaulText = previewContainer.querySelector(".image-preview__default-text");

        thumb.addEventListener("change", function() {
            const file = this.files[0];
            // console.log(file);

            if (file) {
                const reader = new FileReader();

                previewDefaulText.style.display = "none";
                previewImage.style.display = "block";

                reader.addEventListener("load", function() {
                    // console.log(this);
                    previewImage.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            } else {
                previewDefaulText.style.display = null;
                previewImage.style.display = null;
                previewImage.setAttribute("src", "");
            }
        });
    </script>
    {{-- End post image upload js --}}
</x-layout>
