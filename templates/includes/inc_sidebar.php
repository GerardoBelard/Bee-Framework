<?php 
	$slug = isset($d->slug) && !empty($d->slug) ? $d->slug : 'dashboard';
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark  fondoItgam accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo URL ?>">
        
        <div class="sidebar-brand-text mx-3">ITGAM</div>
    </a>
	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<?php $rol = get_user_role(); ?>
	

	<?php if (is_admin($rol)): ?>
		<?php require_once INCLUDES.'inc_sidebar_admin.php'; ?>
	<?php elseif(is_profesor($rol)): ?>
		<?php require_once INCLUDES.'inc_sidebar_profesor.php'; ?>
	<?php elseif(is_alumno($rol)): ?>
		<?php require_once INCLUDES.'inc_sidebar_alumno.php'; ?>
	<?php else: ?>
		No disponible.
	<?php endif; ?>

</ul>
<!-- End of Sidebar -->