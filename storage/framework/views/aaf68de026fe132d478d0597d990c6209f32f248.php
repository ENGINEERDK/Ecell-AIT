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
          <li class="menu-active"><a href="/">Home</a></li>
          <li><a href="#">Upcoming Events</a></li>
          <li><a href="/#speakers">Participations</a></li>
          
          <li class="dropdown header-dropdown">
            <a role="button" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              Our Initiatives
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
            </div>
          </li>
          

          <?php if(Auth::guard('entrepreneur')->check()): ?> 
              <li><a href="#gallery">Your Profile</a></li>
              <li class="dropdown header-dropdown">
                <a role="button" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <b><?php echo e(Auth::guard('entrepreneur')->user()->name); ?></b>
                </a>
                <div class="dropdown-menu">
                 
                  <a class="dropdown-item" href="<?php echo e(url('/entrepreneur/logout')); ?>"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          <?php echo e(__('Logout')); ?>

                  </a>
                   <a class="dropdown-item" href="<?php echo e(url('/entrepreneur/password/reset')); ?>">Password Reset</a>
                  
                  <form id="logout-form" action="<?php echo e(url('/entrepreneur/logout')); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                      </form>
                </div>
              </li>
          <?php else: ?>
              <li><a href="<?php echo e(route('Login')); ?>">Login</a></li>
              
              
          <?php endif; ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
</header>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page_content'); ?>
 <main id="main"  class="main-page">

    <?php if(session('status')): ?>
        <div class="text-center alert alert-warning">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</main>
  
<footer id="footer">
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