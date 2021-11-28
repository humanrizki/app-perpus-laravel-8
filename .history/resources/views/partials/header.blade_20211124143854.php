<nav class="navbar navbar-expand-lg" style="background-color: rgb(24, 185, 185)">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-align-justify text-white"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ (request()->is('home')) ? 'active' : '';  }}">
                    <a class="nav-link" href="#">Beranda </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('collections')) ? 'active' : '';  }}" href="#">Daftar Koleksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('lists')) ? 'active' : '';  }}" href="#">Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('buckets')) ? 'active' : '';  }}" href="#">Keranjang peminjaman</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-info">Login</button>
                </li>
                </ul>
        </div>
    </div>
</nav>