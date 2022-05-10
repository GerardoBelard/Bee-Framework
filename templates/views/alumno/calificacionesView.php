<?php require_once INCLUDES.'inc_header.php'; ?>

<style>
    .cali{
        padding: 5px;
        font-weight:bold;
    }
</style>
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
                  <br>
                  <?php if($d->a->basico1 < 80): ?>
                  <label class="cali" ><?php echo $d->a->basico1; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali" ><?php echo $d->a->basico2; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>

                </div>
  
                <div class="form-group">
                  <label for="basico2">Basico 2</label>
                  <br>
                  <?php if($d->a->basico2 < 80): ?>
                  <label class="cali" ><?php echo $d->a->basico2; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali" ><?php echo $d->a->basico2; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta2/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                </div>
  
                <div class="form-group">
                  <label for="basico3">Basico 3</label>
                  <br>
                  <?php if($d->a->basico3 < 80): ?>
                  <label class="cali"><?php echo $d->a->basico3; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->basico3; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta3/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                </div>
  
                <div class="form-group">
                  <label for="basico4">Basico 4</label>
                  <br>
                  <?php if($d->a->basico4 < 80): ?>
                  <label class="cali"><?php echo $d->a->basico4; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->basico4; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta4/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                </div>
  
                <div class="form-group">
                  <label for="basico5">Basico 5</label>
                  <br>
                  <?php if($d->a->basico5 < 80): ?>
                  <label class="cali"><?php echo $d->a->basico5; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->basico5; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta5/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                </div>

                </div>
                
                <div class="col">
                <div class="form-group">
                    <label for="intermedio1">Intermedio 1</label>
                    <br>
                    <?php if($d->a->intermedio1 < 80): ?>
                  <label class="cali"><?php echo $d->a->intermedio1; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->intermedio1; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta6/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>
    
                  <div class="form-group">
                    <label for="intermedio2">Intermedio 2</label>
                    <br>
                    <?php if($d->a->intermedio2 < 80): ?>
                  <label class="cali"><?php echo $d->a->intermedio2; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->intermedio2; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta7/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>
    
                  <div class="form-group">
                    <label for="intermedio3">Intermedio 3</label>
                    <br>
                    <?php if($d->a->intermedio3 < 80): ?>
                  <label class="cali"><?php echo $d->a->intermedio3; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->intermedio3; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta8/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>
    
                  <div class="form-group">
                    <label for="intermedio4">Intermedio 4</label>
                    <br>
                    <?php if($d->a->intermedio4 < 80): ?>
                  <label class="cali"><?php echo $d->a->intermedio4; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->intermedio4; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta9/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>
    
                  <div class="form-group">
                    <label for="intermedio5">Intermedio 5</label>
                    <br>
                    <?php if($d->a->intermedio5 < 80): ?>
                  <label class="cali"><?php echo $d->a->intermedio5; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->intermedio5; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta10/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>

                </div>

                <div class="col">
                <div class="form-group">
                    <label for="avanzado1">Avanzado 1</label>
                    <br>
                    <?php if($d->a->avanzado1 < 80): ?>
                  <label class="cali"><?php echo $d->a->avanzado1; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->avanzado1; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta11/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>
    
                  <div class="form-group">
                    <label for="avanzado2">Avanzado 2</label>
                    <br>
                    <?php if($d->a->avanzado2 < 80): ?>
                  <label class="cali"><?php echo $d->a->avanzado2; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->avanzado2; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta12/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>
    
                  <div class="form-group">
                    <label for="avanzado3">Avanzado 3</label>
                    <br>
                    <?php if($d->a->avanzado3 < 80): ?>
                  <label class="cali"><?php echo $d->a->avanzado3; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->avanzado3; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta13/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>
    
                  <div class="form-group">
                    <label for="avanzado4">Avanzado 4</label>
                    <br>
                    <?php if($d->a->avanzado4 < 80): ?>
                  <label class="cali"><?php echo $d->a->avanzado4; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->avanzado4; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta14/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>
    
                  <div class="form-group">
                    <label for="avanzado5">Avanzado 5</label>
                    <br>
                    <?php if($d->a->avanzado5 < 80): ?>
                  <label class="cali"><?php echo $d->a->avanzado5; ?></label>
                  <label class="cali">No se ha aprobado el nivel</label>
                  <?php else: ?>
                  <label class="cali"><?php echo $d->a->avanzado5; ?></label>
                  <a class="btn btn-danger btn-sm" href="<?php echo 'alumno/boleta15/'.$d->a->id; ?>"><b>PDF</b></a>
                  <?php endif ?>
                  </div>

                </div>


              </div>
              

            </form>
          </div>
      </div>
    </div>
  </div>
</div>

<?php require_once INCLUDES.'inc_footer.php'; ?>