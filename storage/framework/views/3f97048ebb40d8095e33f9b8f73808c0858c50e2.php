<?php $__env->startSection('sheets'); ?>
<script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">

    
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">

            <a href="/events/create"  class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New Events</h5>
                      <span class="h4 font-weight-bold mb-0 add-event">Add New Event</span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap">Add latest event to site.</span>
                  </p>
                </div>
              </div>
            </a>

            <a href="/events" class="col-xl-6 col-lg-8">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body tab-button">
                  <div class="row">
                    <div class="col">
                      <span class="pull-right"> Posted on : <?php echo e($event->created_at); ?></span>
                      <h5 class="card-title text-uppercase text-muted mb-0">Latest Event</h5>
                      <span class="h4 font-weight-bold mb-0"><?php echo e($event->eventname); ?> </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="pull-left">Total Registrations : <?php echo e(count($registrants)); ?></span>
                    <span class="pull-right">Total Submissions : <?php echo e(count($submissions)); ?></span>
                  </p>
                </div>
              </div>
            </a>

            

          </div>
        </div>
      </div>
    </div>

  <br><br>

<div class="table-responsive">
  <h3><b>Latest Event Registration </b></h3>
  <table id="dtBasicExample" class="table table-striped" style="background: white;">
    <?php if($registrants->isEmpty()): ?>
      <h4 class="text-center">No Registration yet.</h4>
    <?php else: ?>
    <!--Table head-->
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Standard</th>
        <th>Branch</th>
        <th>Contact</th>
        <th>Registered At</th>
        <th>Status</th>
      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      <?php $__currentLoopData = $registrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registrant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th scope="row"><?php echo e($loop->index + 1); ?></th>
        <td><?php echo e($registrant->name); ?></td>
        <td><?php echo e($registrant->standard); ?> </td>
        <td><?php echo e($registrant->branch); ?></td>
        <td><?php echo e($registrant->contact); ?></td>
        <td><?php echo e(date('F d, Y', strtotime($registrant->created_at))); ?></td>
        <td><i style="color: green">Registered</i></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    </tbody>
    <?php endif; ?>
  </table>
  <p class="pull-right"><i><?php echo e(count($registrants)); ?> : Registrations</i></p>
  
  <!--Table-->
</div>


<div class="table-responsive">
  <br><br>
  
  <h3><b>Latest Event Submissions</b></h3>
  <table id="dtBasicExample" class="table table-striped" style="background: white;">
    <?php if($submissions->isEmpty()): ?>
      <h4 class="text-center">No Idea Submissions yet.</h4>
    <?php else: ?>
    <!--Table head-->
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Standard</th>
        <th>Branch</th>
        <th>Contact</th>
        <th>Idea Title</th>
        <th>Submitted At</th>
        <th>Status</th>

      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th scope="row"><?php echo e($loop->index + 1); ?></th>
        <td><?php echo e($submission->name); ?></td>
        <td><?php echo e($submission->standard); ?> </td>
        <td><?php echo e($submission->branch); ?></td>
        <td><?php echo e($submission->contact); ?></td>
        <td><?php echo e($submission->description); ?></td>
        <td><?php echo e(date('F d, Y', strtotime($submission->created_at))); ?></td>
        <td><i style="color: green">Submitted</i></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <!--Table body-->
  <?php endif; ?>

  </table>
  <p class="pull-right"><i><?php echo e(count($submissions)); ?> : Submissions</i></p>
  <!--Table-->
</div>
<br>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>