<?php
$slug = isset($d->slug) && !empty($d->slug) ? $d->slug : 'dashboard';
?>

<style>
    .fondoItgam{
        background-color=#1B396A;
    }
</style>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark  fondoItgam accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo URL ?>">
        
        <div class="sidebar-brand-text mx-3">ITGAM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    
   <!-- <?php if (is_admin(get_user_role())): ?>
         <li class="nav-item <?php echo $slug === 'admin' ? 'active' : null; ?>">
        <a class="nav-link" href="admin">
            <i class="fas fa-fw fa-user-lock"></i>
            <span>Administracion</span></a>
    </li>-->
  
        
    <?php endif; ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $slug === 'dashboard' ? 'active' : null; ?>">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
   

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Profesor -->
    <li class="nav-item<?php echo $slug === 'profesores' ? 'active' : null; ?>">
        <a class="nav-link" href="profesores">
            <i class="fas fa-fw fa-users"></i>
            <span>Profesores</span></a>
    </li>

    <!-- Nav Item - Alumnos -->
  <li class="nav-item <?php echo $slug === 'alumnos' ? 'active' : null; ?>">
        <a class="nav-link" href="alumnos">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>Estudiantes</span></a>
    </li>


     <!-- Nav Item - Materias -->
     <li class="nav-item<?php echo $slug === 'materias' ? 'active' : null; ?>">
        <a class="nav-link" href="materias">
            <i class="fas fa-fw fa-book"></i>
            <span>Niveles</span></a>
    </li>

<!-- Nav Item - Grupos -->
<li class="nav-item<?php echo $slug === 'grupos' ? 'active' : null; ?>">
        <a class="nav-link" href="grupos">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Grupos</span></a>
    </li>

    <!-- Nav Item - Horarios
  <li class="nav-item<?php echo $slug === 'horarios' ? 'active' : null; ?>">
        <a class="nav-link" href="horarios">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>Horario</span></a>
    </li> -->

    <!-- Nav Item - lecciones 
  <li class="nav-item<?php echo $slug === 'lecciones' ? 'active' : null; ?>">
        <a class="nav-link" href="lecciones">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Lecciones</span></a>
    </li>-->


  

  
  

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>
<!-- End of Sidebar -->