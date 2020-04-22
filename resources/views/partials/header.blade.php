<header>
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ route('home') }}">Brillo y Sustancia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#contact">Contactanos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorías
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('products.index')}}">Productos</a>
                            @foreach ($categories as $category)
                                <a class="dropdown-item" href="{{ route('products.index.category', $category->name)}}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    @auth
                        <a class="link-icons" href="{{ route('cart') }}"><i class="fas fa-shopping-cart mx-2"></i></a>
                        <a class="link-icons" href="{{ route('profile') }}"><i class="far fa-user mx-2"></i></a>
                        <a class="btn my-2 my-sm-0 mx-1" href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit()">
                            Cerrar sesión    
                        </a>   
                    @else 
                        <a class="btn my-2 my-sm-0 mx-1" href="{{ route('login') }}">Ingresá</a>
                        <a class="btn my-2 my-sm-0 mx-1" href="{{ route('register') }}">Registrate</a>
                    @endauth
                </div>
            </div>
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
            @csrf
        </form>
    </header>