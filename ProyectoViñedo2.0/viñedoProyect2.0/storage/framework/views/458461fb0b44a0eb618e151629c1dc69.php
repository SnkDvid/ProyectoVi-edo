

<?php $__env->startSection('content'); ?>
<section class="section">
          <div class="section-header">
            <h1>Editar Perfil</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Editar Perfil</div>
            </div>
          </div>
          <div class="section-body">

            <div class="row mt-sm-4">
              
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card profile-widget">
                  <form method="post" class="needs-validation" novalidate=""
                   action="<?php echo e(route('admin.profile.update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="profile-widget-header">
                      <img alt="image" src="<?php echo e(asset(Auth::user()->image)); ?>"
                      class="rounded-circle profile-widget-picture">
                      </div>

                    
                    <div class="card-body">
                        <div class="row">

                        <div class="form-group col-12">
                            <label>Imagen</label>
                            <input type="file" class="form-control" name="image">
                          </div>   

                          <div class="form-group col-md-6 col-12">
                            <label>Nombre y Apellido</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>" required="">
                            <div class="invalid-feedback">
                              Complete el campo con su Nombre y Apellido.
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Correo Electronico</label>
                            <input type="email" class="form-control" name="email" value="<?php echo e(Auth::user()->email); ?>" required="">
                            <div class="invalid-feedback">
                              Complete el campo con su Correo Electronico.
                            </div>
                          </div>
                        </div>
                        
                        
                       
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" >Guardar Cambios</button>
                    </div>
                  </form>
                </div>
              </div>


              
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card profile-widget">


                  
                
                  <form method="post" class="needs-validation" novalidate=""
                   action="<?php echo e(route('admin.password.update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    

                    
                    <div class="card-body">
                        <div class="row">

                        <div class="form-group col-12">
                            <label>Contraseña Actual</label>
                            <input type="password" class="form-control" name="current_password">
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label>Contraseña Nueva</label>
                            <input type="password" class="form-control" name="password">
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label>Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation">
                          </div>

                        </div>
                        
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Cambiar Contraseña</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\viñedoProyect\resources\views/admin/profile/index.blade.php ENDPATH**/ ?>