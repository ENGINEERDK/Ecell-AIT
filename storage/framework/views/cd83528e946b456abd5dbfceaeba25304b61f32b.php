<?php $__env->startSection('stylesheets'); ?>
  <link href="<?php echo e(asset('css/custom-css.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_header'); ?>
<header id="header" class="header-fixed">

    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="/" class="scrollto"><img src="<?php echo e(asset('img/logo.png')); ?>" alt="E-Cell AIT" title="E-Cell AIT"></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class=""><a href="/">Home</a></li>
          <li class=""><a href="<?php echo e(url('/admin/login')); ?>">Admin Login</a></li>
          <?php if(auth()->guard()->guest()): ?>
              <li class="team-btn"><a href="<?php echo e(route('login')); ?>">Login</a></li>
              <li class="buy-tickets"><a href="<?php echo e(route('register')); ?>">Register</a></li>
              
          <?php elseif(Auth::guard('admin')->check()): ?> 
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <b><?php echo e(Auth::user()->name); ?> <span class="caret"></span></b>
                  </a>

                  <ul class="dropdown-content">
                    <li><a href="#" class="" href="#">Profile </a></li>
                    <li><a href="#" class="" href="#">Password Reset</a></li>
                    <li><a class="" href="<?php echo e(route('logout')); ?>"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          <?php echo e(__('Logout')); ?>

                      </a>
                    </li>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                      </form>

                  </ul>
              </li>
          <?php endif; ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
</header>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page_content'); ?>
 <main id="main"  class="main-page">
    <?php echo $__env->yieldContent('content'); ?>
</main>
  
<footer id="footer" class="fixed-bottom">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>AIT ENTREPRENEURSHIP CELL</strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
      Designed by <a href="https://www.facebook.com/engineerdk.ait/">Web Team, E-Cell AIT</a>
    </div>
  </div>
</footer><!-- #footer -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>