<nav class="col-md-2 d-md-block bg-light sidebar mb-3 mt-3">
    <div class="sidebar-sticky">

        <h4 class="sidebar-heading d-flex justify-content-between align-items-center mt-3 mb-3 text-muted border-bottom">
            <span>Edit</span>
            <a class="d-flex align-items-center text-muted">
                <span data-feather="edit"></span>
            </a>
        </h4>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link disabled" href="/home">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href={{ route('users.index') }}>
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href={{ route('admins.index') }}>
                    <span data-feather="user-plus"></span>
                    Admins
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href={{ route('categories.index') }}>
                    <span data-feather="box"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href={{ route('products.index') }}>
                    <span data-feather="gift"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href={{ route('bids.index') }}>
                    <span data-feather="dollar-sign"></span>
                    Bids
                </a>
            </li>
        </ul>

        <h4 class="sidebar-heading d-flex justify-content-between align-items-center mt-5 mb-4 text-muted border-bottom">
            <span>View</span>
            <a class="d-flex align-items-center text-muted">
                <span data-feather="eye"></span>
            </a>
        </h4>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link disabled" href={{ route('metrics.index') }}>
                    <span data-feather="bar-chart-2"></span>
                    Metrics
                </a>
            </li>
        </ul>
    </div>
</nav>