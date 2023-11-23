@include('admins.dashboard.layout.styles')
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Admin Dashboard</h3>
                            </a>
                        </div>
                          @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                            <div>
                                <form method="POST" action="{{ route('admin.login.submit') }}">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                                        <label for="email">Email address</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->

    <!-- JavaScript Libraries -->
@include('admins.dashboard.layout.scripts')

