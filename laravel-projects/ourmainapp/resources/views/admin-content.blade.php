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
                                    
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg"
                                                class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">test</p>
                                        {{-- <p class="inbox-item-text font-12">Hey! there I'm available...</p> --}}
                                        {{-- <p class="inbox-item-date">13:40 PM</p> --}}
                                    </div>
                                    
                                </a>
                                
                            </div>

                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-8">
                        <div class="card-box">
                            <h4 class="header-title mb-4">Recent Posts</h4>

                            <div class="table-responsive">
                                <table class="table table table-hover m-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Post Tittle</th>
                                            <th>Author Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>
                                                <img src="assets/images/users/avatar-6.jpg" alt="user"
                                                    class="avatar-sm rounded-circle" />
                                            </th>
                                            <td>
                                                <h5 class="m-0 font-15">Java</h5>
                                                <p class="m-0 text-muted font-13"><small>ishan</small></p>
                                            </td>
                                            <td>tony</td>
                                            <td>Active</td>
                                            <td>07/08/2016</td>
                                        </tr>

                                        

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



</x-layout_admin>
