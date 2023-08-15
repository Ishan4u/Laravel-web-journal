<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    {{-- CSRF AJAX --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SLIATE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
        integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />


    {{-- <link rel="stylesheet" href="/main.css" /> --}}

    {{-- ckeditor path --}}
    <script src="/assets/vendor/ckeditor5/build/ckeditor.js"></script>
    <link rel="stylesheet" href="/assets/ck-style.css">




    {{-- Start post image upload css --}}
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }

        .image-preview {
            width: 100%;
            height: 320px;
            border: 2px solid #dddddd;
            margin-top: 15px;
            margin-bottom: 15px;

            /* Default text */
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #cccccc;
        }

        .image-preview__image {
            display: none;
            width: 100%;
            height: 100%;
        }
    </style>
    {{-- Ends post image upload css  --}}

    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>

<body>
    <header class="header-bar mb-3">
        <div class="container d-flex flex-column flex-md-row align-items-center p-3">
            <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">SLIATE
                    ExpertiseExchange</a></h4>

            @auth
                <div class="flex-row my-3 my-md-0">
                    <a href="#" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip"
                        data-placement="bottom"><i class="fas fa-search"></i></a>
                    <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip"
                        data-placement="bottom"><i class="fas fa-comment"></i></span>
                    <a href="/profile/{{ auth()->user()->username }}" class="mr-2"><img title="My Profile"
                            data-toggle="tooltip" data-placement="bottom"
                            style="width: 32px; height: 32px; border-radius: 16px" src="{{ auth()->user()->avatar }}" /></a>
                    <a class="btn btn-sm btn-success mr-2" href="/create-post"><i class="fas fa-edit"></i> Write Article</a>
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-secondary">Sign Out</button>
                    </form>
                </div>
            @else
                <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                            <input name="loginusername" class="form-control form-control-sm input-dark" type="text"
                                placeholder="Username" autocomplete="off" />
                        </div>
                        <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                            <input name="loginpassword" class="form-control form-control-sm input-dark" type="password"
                                placeholder="Password" />
                        </div>
                        <div class="col-md-auto">
                            <button class="btn btn-primary btn-sm">Sign In</button>
                        </div>
                    </div>
                </form>
            @endauth


        </div>
    </header>
    <!-- header ends here -->

    @if (session()->has('success'))
        <div class="container container--narrow">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session()->has('failure'))
        <div class="container container--narrow">
            <div class="alert alert-danger text-center">
                {{ session('failure') }}
            </div>
        </div>
    @endif

    {{ $slot }}

    <!-- Display message sweet alert ------->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('success-popup'))
        <script>
            Swal.fire({
                /* position: 'top-end', */
                icon: 'success',
                title: '{{ session('success-popup') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <!-- Ends Display message sweet alert -->

    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">Copyright &copy; {{ date('Y') }} <a href="/" class="text-muted">Ishan</a>. All
            rights reserved.</p>
    </footer>

    {{-- STEP 7 --}}
    @auth
        <div data-username="{{ auth()->user()->username }}" data-avatar="{{ auth()->user()->avatar }}" id="chat-wrapper"
            class="chat-wrapper shadow border-top border-left border-right"> </div>
    @endauth



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
        $('[data-toggle="tooltip"]').tooltip()
    </script>

    {{-- JQUERY CDN --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        // featured btn in single-post
        $(document).ready(function() { //jqdoc

            // on event clic
            $(document).on('click', '.btn_feature', function(e) {
                e.preventDefault();

                // alert("hello");

                var button = $(this);
                // get all value in one variable
                var data = {
                    'post_id': $(this).data('post-id'),
                    'status': $(this).data('status')
                }

                // console.log(data);

                //CSRF
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/update-featured",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);



                    }
                });

            });
        });
    </script>{{-- // Ends featured btn in single-post --}}


</body>

</html>
