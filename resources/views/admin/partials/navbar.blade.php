<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CN LIBRARY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : ''; }}"> 
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/books*') ? 'active' : ''; }}"> 
        <a class="nav-link" href="/dashboard/books">
            <i class="fas fa-book"></i>
            <span>Books</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/categories*') ? 'active' : ''; }}"> 
        <a class="nav-link" href="/dashboard/categories">
            <i class="fas fa-book"></i>
            <span>Categories</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/collections*') ? 'active' : ''; }}"> 
        <a class="nav-link" href="/dashboard/collections">
            <i class="bi bi-collection-fill"></i>
            <span>Collections</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/bookcases*') ? 'active' : ''; }}"> 
        <a class="nav-link" href="/dashboard/bookcases">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Bookcases</span></a>
    </li>
    @if (auth('admin')->user()->hasRole('admin'))
        <li class="nav-item {{ request()->is('dashboard/loans*') ? 'active' : ''; }}"> 
            <a class="nav-link" href="/dashboard/loans">
                <i class="bi bi-card-heading"></i>
                <span>Loans</span></a>
        </li>
        <li class="nav-item {{ request()->is('dashboard/transactions*') ? 'active' : ''; }}"> 
            <a class="nav-link" href="/dashboard/transactions">
                <i class="bi bi-card-checklist"></i>
                <span>Transactions</span></a>
        </li>
    @elseif(auth('admin')->user()->hasRole('homeroom'))
    <li class="nav-item {{ request()->is('dashboard/agreements*') ? 'active' : ''; }}"> 
        <a class="nav-link" href="/dashboard/agreements">
            <i class="fas fa-handshake"></i>
            <span>Agreement</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/students*') ? 'active' : ''; }}"> 
        <a class="nav-link" href="/dashboard/students">
            <i class="fas fa-handshake"></i>
            <span>Students</span></a>
    </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->

    <!-- Sidebar Message -->

</ul>
<!-- End of Sidebar -->
