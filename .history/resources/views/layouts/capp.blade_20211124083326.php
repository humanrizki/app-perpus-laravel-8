<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/neumorphism.css">
    <title>Mantap</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-light shadow-soft navbar-theme-primary mb-4">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-5" href="../../index.html">
                <img class="navbar-brand-dark" src="../../assets/img/brand/light.svg" alt="pixel logo">
                <img class="navbar-brand-light" src="../../assets/img/brand/dark.svg" alt="pixel logo">
            </a>
            <div class="navbar-collapse collapse" id="navbar-default-primary">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                           <a class="navbar-brand mr-lg-5" href="../../index.html">
                                <img class="navbar-brand-dark" src="../../assets/img/brand/light.svg" alt="pixel logo">
                                <img class="navbar-brand-light" src="../../assets/img/brand/dark.svg" alt="pixel logo">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <i class="fas fa-times" data-toggle="collapse" role="button"
                                data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                                aria-expanded="false" aria-label="Toggle navigation"></i>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" role="button">
                            <i class="fas fa-angle-down nav-link-arrow"></i>
                            <span class="nav-link-inner-text">Dropdown 2 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Dropdown item 1</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown item 2</a></li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle dropdown-item d-flex justify-content-between align-items-center" aria-haspopup="true" aria-expanded="false">Dropdown item 3 <i class="fas fa-angle-right nav-link-arrow"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" class="dropdown-item">Submenu item 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item">Submenu item 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="#">Dropdown item 4</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <p class="text-dark mb-0">Primary navbar</p>
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse"
                    data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</body>
</html>