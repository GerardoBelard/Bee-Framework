<?php if (!empty($d)): ?>
<ul class="list-group">
<?php foreach ($d as $m): ?>
      <?php echo sprintf('<li class="list-group-item">%s <button class="btn btn-danger btn-sm float-right quitar_materia_profesor" data-id="%s"><i class="fas fa-trash"></i>
      </button></li>', $m->nombre, $m->id); ?>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<div class="text-center py-5">
<img src="<?php echo IMAGES.'undraw_taken.png';?>" alt="No hay registros" class="img-fluid" style="width: 200px;">
<p class="text-muted">No hay materias Asignadas al profesor</p>
</div>
<?php endif; ?>
