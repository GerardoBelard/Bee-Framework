<?php require_once INCLUDES.'inc_header.php'; ?>

<div class="row">
  <!-- info del grupo -->
  <div class="col-xl-4 col-md-6 col-12">
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#grupo_data" class="d-block card-header py-3" data-toggle="collapse"
          role="button" aria-expanded="true" aria-controls="grupo_data">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo sprintf('Grupo #%s', $d->g->numero); ?></h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="grupo_data">
          <div class="card-body">
            <form action="grupos/post_editar" method="post" enctype="multipart/form-data">
              <?php echo insert_inputs(); ?>
              <input type="hidden" name="id" value="<?php echo $d->g->id; ?>" required>
              
              <div class="form-group">
                <label for="nombre">Numero</label>
                <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $d->g->numero; ?>" required>
              </div>
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $d->g->nombre; ?>" required>
              </div>

              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" cols="10" rows="5" class="form-control"><?php echo $d->g->descripcion; ?></textarea>
              </div>

              <div class="form-group">
                <label for="horario">Horario de clases</label>
                <input type="file" class="form-control" id="horario" name="horario" accept="image/png, image/gif, image/jpeg">
              </div>

              <button class="btn btn-success" type="submit">Guardar cambios</button>
            </form>
          </div>
      </div>
    </div>

    


  

<?php require_once INCLUDES.'inc_footer.php'; ?>