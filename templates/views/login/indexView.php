<?php require_once INCLUDES.'inc_header_minimal.php'; ?>

<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-8 col-md-8">

          <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                
                    
                          <div class="p-5">
                              <div class="text-center">
                                  <img src="<?php echo IMAGES.'cle.jpeg' ?>" alt="<?php echo get_sitename(); ?>" width="400px" class="img-fluid mb-3">
                                  <h1 class="h4 text-gray-900 mb-4"><?php echo sprintf('¡Bienvenido a %s!', get_sitename()); ?></h1>
                              </div>
                              <?php echo Flasher::flash(); ?>
                              <form class="user" action="login/post_login" method="post" >
                              <?php echo insert_inputs(); ?>

                                  <div class="form-group">
                                      <input type="email" class="form-control form-control-user"
                                      name="email"
                                          id="email" aria-describedby="emailHelp"
                                          placeholder="Correo Electronico" required> 
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control form-control-user"
                                      name="password"    
                                      id="password" 
                                          placeholder="Contraseña" required>
                                  </div>
                                  
                        
                                 <button class="btn btn-primary btn-user btn-block" type="submit" >Ingresar</button 
                                 </a>
                                 <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                      <i class="fab fa-google fa-fw"></i> Login with Google
                                  </a>
                                  <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                  </a> -->
                              </form>
                              <hr>
                               <div class="text-center">
                                  <a class="small" href="login/recuperacion">¿Olvidaste tu contraseña?</a>
                              </div>
                           
                      </div>
                  </div>
              </div>
          </div>

      </div>

  </div>

</div>


<?php require_once INCLUDES.'inc_footer_minimal.php'; ?>