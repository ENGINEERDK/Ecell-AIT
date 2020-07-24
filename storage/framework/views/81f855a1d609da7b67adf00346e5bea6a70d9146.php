<?php $__env->startSection('sheets'); ?>
    <link href="<?php echo e(URL::asset('css/background_css.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
          <?php if(session('status')): ?>
              <div class="text-center alert alert-warning">
                  <?php echo e(session('status')); ?>

              </div>
          <?php endif; ?>

          <?php if(session('success')): ?>
              <div class="text-center alert alert-success">
                  <?php echo e(session('success')); ?>

              </div>
          <?php endif; ?>
        <div class="section-header">
          <h2><?php echo e($event->eventname); ?></h2>
          <p><?php echo e($event->when); ?>, <?php echo e($event->where); ?></p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="storage/public/web_upload/eventphoto/<?php echo e($event->eventphoto); ?>" alt="Speaker 1" class="img-fluid">
          </div>

          <div class="col-md-6">
            <div class="details">
              <h2>Event Details</h2>
              <p><?php echo e($event->shortdescription); ?>.</p>
              <p><?php echo e($event->description); ?>.</p>
 
              <br>
              <?php if(!empty ( $event->eventfile)): ?>
                  <a class="pull-right btn btn-success" href="storage/public/web_upload/eventfiles/<?php echo e($event->eventfile); ?>" download="<?php echo e($event->eventfile); ?>"><b>Download the Event Book</b></a>
              <?php endif; ?>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      <div class="row event-links">
        <div class="col-lg-12">
          <?php if($event->status == '1'): ?>
            <h3 style="color: red" class="text-center">SORRY, Event Registration is Over.</h3>
          <?php else: ?>
            <div class="row">
              <div class="col-lg-6">
                <?php if($event->registration == '1'): ?>
                  <h5>Registration is Required to attend the event. Follow link below.</h5>
                     <a class="pull-right btn btn-primary" href="<?php echo e(route('Event-Registation.create')); ?>">Register to Event</a>
                <?php endif; ?>
              </div>
              
              <div class="col-lg-6">
                <?php if($event->participation == '1'): ?>
                  <h5>Register your Team and submit your Idea to get started. </h5>
                    <a class="pull-left btn btn-primary" href="<?php echo e(route('Idea-Submission.create')); ?>">Participate & Submit Idea</a>
                <?php endif; ?>
              </div>
              
            </div>
          <?php endif; ?>
        </div>
      </div>
        
      </div>

    </section>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>