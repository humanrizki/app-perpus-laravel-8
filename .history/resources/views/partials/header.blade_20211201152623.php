
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('home')) ? 'active fw-bold':'';}}" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ (request()->is('collections*')) ? 'active fw-bold':'';}}" href="/collections">Collections</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('lists*')) ? 'active fw-bold':'';}}" href="/lists">Book lists</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('bucket*')) ? 'active fw-bold':'';}}" href="/bucket">Bucket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('bucket*')) ? 'active fw-bold':'';}}" href="/bucket">Loan</a>
          </li>
        </ul>
        @auth
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <form action="/logout" method="POST">
              @csrf
              <li class="dropdown-item"><button class="btn btn-danger w-100" type="submit">Logout</button></li>
            </form>
          </ul>
        </div>
        @else    
        <div class="container-login">
            <a href="/login" class="btn btn-success">Login</a>
        </div>
        @endauth
      </div>
    </div>
  </nav>