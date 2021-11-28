<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
        href="https://cdn.jsdelivr.net/npm/neomo@2.1.0/dist/neomo.min.css"
        rel="stylesheet"
    />

</head>
<body >
    <section >
        <ul class="nav">
          <div class="logo">
            <a href="#"
              ><img class="logo-img" src="https://neomo-ui.com/blacklogo.png"
            /></a>
          </div>
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <button class="dropdown-button nav-dropdown">
              shop
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">All Products</a>
              <hr />
              <a href="#">Popular Items</a>
              <a href="#">New Arrivals</a>
            </div>
          </li>
          <li class="nav-item nav-item--cart">
            <a class="nav-link button nav-link--cart" href="#">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              Cart
              <span class="number">0</span>
            </a>
          </li>
          <button data-collapse-id="collapse" class="button collapse menu-icon">
            <i class="fas fa-bars"></i>
          </button>
        </ul>
        <div data-collapse-id="collapse" class="mt-2 expanded">
          <div class="navbar">
            <div>
              <a href="#">Home</a>
              <a href="#">About</a>
              <button class="toggle-button">
                Shop
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="toggle-content">
                <a href="#">All Products</a>
                <a href="#">Popular Items</a>
                <a href="#">New Arrivals</a>
              </div>
              <a href="#">Cart</a>
            </div>
          </div>
        </div>
      </section>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/neomo@2.1.0/dist/neomo.min.js"></script>
</body>
</html>