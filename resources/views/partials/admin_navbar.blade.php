<nav class="admin-navbar">
    <i class="fas fa-chevron-left"></i>
    <ul>
        <a class="logo" href="{{route('admin.dashboard')}}">
            <h2>Brillo y Sustancia</h2>
            <p>Panel de administración</p>
        </a>
        <a href="#"><li><i class="fas fa-cogs"></i>Configuraciones</li></a>
        <a href="{{route('users.index')}}"><li><i class="fas fa-users"></i>Usuarios</li></a>
        <a href="{{route('categories.index')}}"><li><i class="fas fa-list-ol"></i>Categorías</li></a>
        <a href="{{route('admin-products.index')}}"><li><i class="fas fa-dolly"></i>Productos</li></a>
        <a href="{{route('sales.index')}}"><li><i class="fas fa-money-bill-wave"></i>Ventas</li></a>
        <a href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit()">
            <li><i class="fas fa-sign-out-alt"></i>Cerrar sesión    
        </li></a>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
        @csrf
    </form>
</nav>

<script>
    let nav = document.querySelector('nav.admin-navbar');
    let chevronButton = document.querySelector('i.fa-chevron-left');
    chevronButton.addEventListener('click', (e => {
        nav.classList.toggle('admin-nav-collapse');
        chevronButton.classList.toggle('collapsed');
    }))
</script>