<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; Viñedo</title>
  <!-- Logo de la pestana -->
  <link rel="icon" type="image/png" href="<?php echo e(asset('backend/assets/img/viñedoLogo.png')); ?>">


  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/modules/fontawesome/css/all.min.css')); ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/modules/jqvmap/dist/jqvmap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/modules/weather-icon/css/weather-icons.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/modules/weather-icon/css/weather-icons-wind.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/modules/summernote/summernote-bs4.css')); ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/components.css')); ?>">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
        <!-- Barra de navegacion arriba-->
      <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- FIN Barra de navegacion arriba -->

      <!-- Barra lateral izquierda -->
      <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- FIN Barra lateral izquierda -->

      <!-- Contenido Dashboard -->
      <div class="main-content">
       <?php echo $__env->yieldContent('content'); ?>
      </div>
      <!-- FIN Contenido Dashboard -->
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Desarrollado Por <a href="https://fitgirl-repacks.site/">Maria Camila y David Tuay</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo e(asset('backend/assets/modules/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/popper.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/tooltip.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/moment.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/js/stisla.js')); ?>"></script>
  
  <!-- JS Libraies -->
  <script src="<?php echo e(asset('backend/assets/modules/simple-weather/jquery.simpleWeather.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/jqvmap/dist/jquery.vmap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/summernote/summernote-bs4.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')); ?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo e(asset('backend/assets/js/page/index-0.js')); ?>"></script>
  
  <!-- Template JS File -->
  <script src="<?php echo e(asset('backend/assets/js/scripts.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/js/custom.js')); ?>"></script>
   <script>
    <?php if($errors->any()): ?>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        toastr()->error($error,'Notificacion');
      ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
   </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\viñedoProyect\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>