<x-layout_admin>
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Zircos</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard </a></li>
                                    <li class="breadcrumb-item active">Dashboard 2</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard 2</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">

                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="header-title mb-4">Users</h4>

                            <div class="inbox-widget slimscroll" style="max-height: 360px;">
                                <a href="#">
                                    @foreach ($users as $user)
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{ $user->avatar }}"
                                                    class="rounded-circle" alt=""></div>
                                            <a href="/profile/{{ $user->username }}"
                                                class="inbox-item-author">{{ $user->username }}</a>

                                            {{-- <p class="inbox-item-text font-12">Hey! there I'm available...</p> --}}
                                            {{-- <p class="inbox-item-date">13:40 PM</p> --}}
                                        </div>
                                    @endforeach

                                </a>

                            </div>

                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-8">
                        <div class="card-box slimscroll">
                            <h4 class="header-title mb-4">Recent Posts</h4>

                            <div class="table-responsive">
                                <table class="table table table-hover m-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Post Tittle</th>
                                            <th>Author</th>
                                            <th>Approval</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>



                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <th>
                                                    <img src="assets/images/users/avatar-6.jpg" alt="user"
                                                        class="avatar-sm rounded-circle" />
                                                </th>
                                                <td>
                                                    <h5 class="m-0 font-15"><a href="/post/{{$post->id}}">{{ $post->title }}</a></h5>
                                                    <p class="m-0 text-muted font-13">
                                                        <small>{{ $post->user->username }}</small>
                                                    </p>
                                                </td>
                                                <td>{{ $post->user->username }}</td>
                                                {{-- @if ($post->approval) --}}
                                                @csrf
                                                <td>
                                                    <input data-id="{{ $post->id }}" class="toggle-class"
                                                        type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                        data-toggle="toggle" data-on="Active" data-off="InActive"
                                                        {{ $post->approval ? 'checked' : '' }}>

                                                </td>
                                                {{-- @elseif($post->approval === 0) --}}
                                                {{-- <td>Deactivate</td>
                                            @endif --}}
                                                <td>{{ $post->created_at->format('n/j/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- table-responsive -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->

        {{-- ajax code for toggle start  --}}
        <script>
            $(function() {
                // This is a jQuery shorthand for $(document).ready(function() { ... });
                // It ensures that the code is executed when the DOM is fully loaded.

                $('.toggle-class').change(function() {
                    // Selects all elements with the class 'toggle-class' and attaches a change event handler to them.
                    // The handler function will be executed when the change event occurs on any of these elements.

                    var approval = $(this).prop('checked') == true ? 1 : 0;
                    // Retrieves the value of the 'checked' property of the element that triggered the change event.
                    // If the property is true, it assigns 1 to the 'approval' variable; otherwise, it assigns 0.

                    var post_id = $(this).data('id');
                    // Retrieves the value of the 'data-id' attribute of the element that triggered the change event.
                    // It uses the jQuery data() method to access the value.

                    // alert(post_id);
                    $.ajax({
                        // Performs an AJAX request using jQuery's $.ajax() function.

                        type: "GET",
                        // Specifies the HTTP method for the AJAX request (in this case, a GET request).

                        dataType: "json",
                        // Sets the expected data type of the response from the server (JSON in this case).

                        url: '/changeStatus',
                        // Specifies the URL to which the AJAX request will be sent.

                        data: {
                            'approval': approval,
                            'post_id': post_id
                        },
                        // Defines the data to be sent along with the request.

                        success: function(data) {
                            // Defines a success callback function that will be executed if the request is successful.

                            console.log(data.success);
                            // Logs the value of the 'success' property in the response data to the console.
                        }
                    });
                });
            });
        </script>
        {{-- ajax code end --}}

</x-layout_admin>
