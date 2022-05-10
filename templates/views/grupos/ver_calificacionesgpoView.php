<?php require_once INCLUDES.'inc_header.php'; ?>

<div class="row">
  <div class="col-xl-6 col-md-6 col-12">
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#alumno_data" class="d-block card-header py-3" data-toggle="collapse"
          role="button" aria-expanded="true" aria-controls="alumno_data">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $d->title; ?></h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="alumno_data">
          <div class="card-body">
            <form action="alumnos/editar_calificaciones" method="post">
              <?php echo insert_inputs(); ?>
              <input type="hidden" name="id" value="<?php echo $d->a->id; ?>" required>
              
              <div class="row">
                <div class="col">
                <div class="form-group">
                  <label for="basico1">Basico 1</label>
                  <input type="text" class="form-control" id="basico1" name="basico1" value="<?php echo $d->a->basico1; ?>" required>
                </div>
  
                <div class="form-group">
                  <label for="basico2">Basico 2</label>
                  <input type="text" class="form-control" id="basico2" name="basico2" value="<?php echo $d->a->basico2; ?>" required>
                </div>
  
                <div class="form-group">
                  <label for="basico3">Basico 3</label>
                  <input type="text" class="form-control" id="basico3" name="basico3" value="<?php echo $d->a->basico3; ?>" required>
                </div>
  
                <div class="form-group">
                  <label for="basico4">Basico 4</label>
                  <input type="text" class="form-control" id="basico4" name="basico4" value="<?php echo $d->a->basico4; ?>">
                </div>
  
                <div class="form-group">
                  <label for="basico5">Basico 5</label>
                  <input type="text" class="form-control" id="basico5" name="basico5" value="<?php echo $d->a->basico5; ?>">
                </div>

                </div>
                
                <div class="col">
                <div class="form-group">
                    <label for="intermedio1">Intermedio 1</label>
                    <input type="text" class="form-control" id="intermedio1" name="intermedio1" value="<?php echo $d->a->intermedio1; ?>" required>
                  </div>
    
                  <div class="form-group">
                    <label for="intermedio2">Intermedio 2</label>
                    <input type="text" class="form-control" id="intermedio2" name="intermedio2" value="<?php echo $d->a->intermedio2; ?>" required>
                  </div>
    
                  <div class="form-group">
                    <label for="intermedio3">Intermedio 3</label>
                    <input type="text" class="form-control" id="intermedio3" name="intermedio3" value="<?php echo $d->a->intermedio3; ?>" required>
                  </div>
    
                  <div class="form-group">
                    <label for="intermedio4">Intermedio 4</label>
                    <input type="text" class="form-control" id="intermedio4" name="intermedio4" value="<?php echo $d->a->intermedio4; ?>">
                  </div>
    
                  <div class="form-group">
                    <label for="intermedio5">Intermedio 5</label>
                    <input type="text" class="form-control" id="intermedio5" name="intermedio5" value="<?php echo $d->a->intermedio5; ?>">
                  </div>

                </div>

                <div class="col">
                <div class="form-group">
                    <label for="avanzado1">Avanzado 1</label>
                    <input type="text" class="form-control" id="avanzado1" name="avanzado1" value="<?php echo $d->a->avanzado1; ?>" required>
                  </div>
    
                  <div class="form-group">
                    <label for="avanzado2">Avanzado 2</label>
                    <input type="text" class="form-control" id="avanzado2" name="avanzado2" value="<?php echo $d->a->avanzado2; ?>" required>
                  </div>
    
                  <div class="form-group">
                    <label for="avanzado3">Avanzado 3</label>
                    <input type="text" class="form-control" id="avanzado3" name="avanzado3" value="<?php echo $d->a->avanzado3; ?>" required>
                  </div>
    
                  <div class="form-group">
                    <label for="avanzado4">Avanzado 4</label>
                    <input type="text" class="form-control" id="avanzado4" name="avanzado4" value="<?php echo $d->a->avanzado4; ?>">
                  </div>
    
                  <div class="form-group">
                    <label for="avanzado5">Avanzado 5</label>
                    <input type="text" class="form-control" id="avanzado5" name="avanzado5" value="<?php echo $d->a->avanzado5; ?>">
                  </div>

                </div>


              </div>
              
              <button class="btn btn-success" type="submit" >Guardar cambios</button>

            </form>
          </div>
      </div>
    </div>
  </div>
</div>

<?php require_once INCLUDES.'inc_footer.php'; ?>