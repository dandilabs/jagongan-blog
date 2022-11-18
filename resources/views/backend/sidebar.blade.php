    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fire">
                </i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-book-open"></i> <span>Post</span>
                </a>
                <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="{{ route('post.index') }}">
                        List Post
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('post.datasoft') }}">
                        List Post Trash
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-clipboard"></i> <span>Category</span>
                </a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('category.index') }}">List Category</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="far fa-bookmark"></i> <span>Tags</span>
                </a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('tag.index') }}">List Tags</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="far fa-user"></i> <span>User</span>
                </a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('user.index') }}">List Users</a></li>
                </ul>
            </li>
            </ul>
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
            </div>
        </aside>
    </div>