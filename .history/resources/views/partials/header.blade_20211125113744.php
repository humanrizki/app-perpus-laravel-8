
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('home')) ? 'active':'';}}" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ (request()->is('collections*')) ? 'active':'';}}" href="/collections">Collections</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('lists')) ? 'active':'';}}" href="/lists">Book lists</a>
          </li>
        </ul>
        <div class="container-login">
            <a href="/login" class="btn btn-success">Login</a>
        </div>
      </div>
    </div>
  </nav>