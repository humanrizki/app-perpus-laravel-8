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
    @endif
    <li class="nav-item {{ request()->is('dashboard/students*') ? 'active' : ''; }}"> 
        <a class="nav-link" href="/dashboard/students">
            <i class="fas fa-handshake"></i>
            <span>Students</span></a>
    </li>
    <li class="nav-item {{ request()->is('dashboard/charts') ? 'active' : ''; }}"> 
        <a class="nav-link" href="/dashboard/charts">
            <i class="fas fa-chart-bar"></i>
            <span>Charts</span></a>
    </li>


    <!-- Divider -->
    

    <!-- Divider -->

    <!-- Sidebar Message -->

</ul>
<!-- End of Sidebar -->
