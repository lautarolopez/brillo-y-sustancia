<nav>
    <ul>
        <a href="#"><li>Configuraciones</li></a>
        <a href="<?php echo e(route('users.index')); ?>"><li>Usuarios</li></a>
        <a href="<?php echo e(route('categories.index')); ?>"><li>Categorías</li></a>
        <a href="<?php echo e(route('admin-products.index')); ?>"><li>Productos</li></a>
        <a href="<?php echo e(route('sales.index')); ?>"><li>Ventas</li></a>
        <a href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit()">
            Cerrar sesión    
        </a>
    </ul>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display:none">
        <?php echo csrf_field(); ?>
    </form>
</nav><?php /**PATH C:\Users\Edgar\Desktop\brillo-y-sustancia\resources\views/partials/admin_navbar.blade.php ENDPATH**/ ?>