<nav>
    <ul>
        <a href="#"><li>Configuraciones</li></a>
        <a href="{{route('users.index')}}"><li>Usuarios</li></a>
        <a href="{{route('categories.index')}}"><li>Categorías</li></a>
        <a href="{{route('admin-products.index')}}"><li>Productos</li></a>
        <a href="{{route('sales.index')}}"><li>Ventas</li></a>
        <a href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit()">
            Cerrar sesión    
        </a>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
        @csrf
    </form>
</nav>