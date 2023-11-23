        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Dashboard</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset("assets/dashboard/img/user.jpg") }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">ca
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.home" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                @can('products')<a href="{{ route('products.index') }}" class="dropdown-item">products</a>@endcan
                            @can('add product')<a href="{{ route('products.create') }}" class="dropdown-item">add product</a>@endcan
                        </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>category</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('categories.index') }}" class="dropdown-item">categories</a>
                        
                            <a href="{{ route('categories.create')}}" class="dropdown-item">add category</a>
                        
                        </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>order</a>
                        <div class="dropdown-menu bg-transparent border-0">
        <a href="{{ route('orders.index') }}" class="dropdown-item">orders</a>
                    <a href="{{ route('orders.create') }}" class="dropdown-item">add order</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>user</a>
                        <div class="dropdown-menu bg-transparent border-0">
    <a href="{{ route('users.index') }}" class="dropdown-item">users</a>
                <a href="{{ route('users.create') }}" class="dropdown-item">add user</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>role</a>
                        <div class="dropdown-menu bg-transparent border-0">
    @can('roles')
        <button><a href="{{ route('roles.index') }}" class="dropdown-item">roles</a></button>
    @endcan
                <a href="{{ route('roles.create') }}" class="dropdown-item">add new </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>admin</a>
                        <div class="dropdown-menu bg-transparent border-0">
        <a href="{{ route('admins.index') }}" class="dropdown-item">admins</a>
                    <a href="{{ route('admins.create') }}" class="dropdown-item">add new </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>permissions</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('permissions.index') }}" class="dropdown-item">permission</a>
                            <a href="{{ route('permissions.create') }}" class="dropdown-item">add permission</a>
                        </div>
                    </div>

                    <div class="nav-ite<a href="{{ route('settings.index') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>settings</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>