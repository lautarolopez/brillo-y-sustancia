<nav class="admin-navbar">
    <i class="fas fa-chevron-left"></i>
    <ul>
        <a class="logo" href="<?php echo e(route('admin.dashboard')); ?>">
            <h2>Brillo y Sustancia</h2>
            <p>Panel de administración</p>
        </a>
        <a class="menu-element" href="#"><li><i class="fas fa-cogs"></i>Configuraciones</li></a>
        <a class="menu-element" href="<?php echo e(route('users.index')); ?>"><li><i class="fas fa-users"></i>Usuarios</li></a>
        <a class="menu-element" href="<?php echo e(route('categories.index')); ?>"><li><i class="fas fa-list-ol"></i>Categorías</li></a>
        <a class="menu-element" href="<?php echo e(route('admin-products.index')); ?>"><li><i class="fas fa-dolly"></i>Productos</li></a>
        <a class="menu-element" href="<?php echo e(route('sales.index')); ?>"><li><i class="fas fa-money-bill-wave"></i>Ventas</li></a>
        <button class="hambutton"><i class="fas fa-hamburger"></i></button>
        <a class="menu-element" href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit()">
            <li><i class="fas fa-sign-out-alt"></i>Cerrar sesión    
        </li></a>
        
    </ul>
    <span class="collapsed-nav"></span>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display:none">
        <?php echo csrf_field(); ?>
    </form>
</nav>
<script>
    let collapsedMenu = document.querySelector('span.collapsed-nav')
    let hamButton = document.querySelector('button.hambutton');
    let toggle = true
    let menuItems = []
    document.querySelectorAll('a.menu-element').forEach((element) => {
        menuItems.push(element.cloneNode(true));
    })

    hamButton.addEventListener('click', (e) =>{
        if (toggle){
            menuItems.forEach((element) => {
                collapsedMenu.appendChild(element);
            })
        } else {
            menuItems.forEach((element) => {
                collapsedMenu.removeChild(element);
            })
        }
        collapsedMenu.classList.toggle('collapsed');
        toggle = !toggle
    })


</script><?php /**PATH C:\Users\Edgar\Desktop\brillo-y-sustancia\resources\views/partials/admin_navbar.blade.php ENDPATH**/ ?>