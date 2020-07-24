<?php $__env->startSection('content'); ?>
        
<div class="container contact-form">
    <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
    </div>
    <form role="form" action="<?php echo e(route('Idea-Submission.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <h3><?php echo e($event->eventname); ?></h3>
        <p class="text-center"><i>Idea Submission</i></p>
        
       <div class="row">
            <input type="hidden" name="user_id" value="<?php echo e(Auth::guard('entrepreneur')->user()->id); ?>">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name *" value="<?php echo e(Auth::guard('entrepreneur')->user()->name); ?>" readonly />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="E Mail *" value="<?php echo e(Auth::guard('entrepreneur')->user()->email); ?>" readonly />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <select class="form-control" name="standard">
                      <option value="">Select Your Standard</option>
                      <option value="FE">FE</option>
                      <option value="SE">SE</option>
                      <option value="TE">TE</option>
                      <option value="BE">BE</option>
                      <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <select class="form-control" name="branch">
                        <option value="">Select Your Branch</option>
                      <option value="E&TC">E&TC</option>
                      <option value="MECH">MECH</option>
                      <option value="COMP">COMP</option>
                      <option value="IT">IT</option>
                      <option value="Others">Others</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" required name="contact" Required class="form-control" placeholder="Your Contact No *"  />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="collegename" class="form-control" placeholder="Your College *"  />
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name2" class="form-control" placeholder="Name:Team Member 2 *" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="email2" class="form-control" placeholder="E-Mail:Team Member 2 *" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name3" class="form-control" placeholder="Name:Team Member 3 *" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="email3" class="form-control" placeholder="E-Mail:Team Member 3 *" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name4" class="form-control" placeholder="Name:Team Member 4*" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="email4" class="form-control" placeholder="E-Mail:Team Member 4 *" />
                </div>
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="title" Required class="form-control" placeholder="Suitable Title.*"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="description" Required class="form-control" placeholder="Brief Description About Your Idea(Problem Targetted, technology aassotiated and your Solution).*" style="width: 100%; height: 180px;"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-5">
                <div class="form-group">
                    <select class="form-control" Required name="category">
                      <option value="">Select Your Idea Category</option>
                      <option value="Agriculture">Agriculture</option>
                      <option value="Healthcare">Healthcare</option>
                      <option value="Defence">Defence</option>
                      <option value="FinTech">FinTech</option>
                      <option value="E-Commerce">E-Commerce</option>
                      <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="form-group">
                    <select class="form-control" Required name="domain">
                      <option value="">Select Domain</option>
                      <option value="Elecronics">Elecronics</option>
                      <option value="AI/ML">AI/ML</option>
                      <option value="Data Analytics">Data Analytics</option>
                      <option value="Mechanical Design">Mechanical Design</option>
                      <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="form-group">
                    <select class="form-control" Required name="projectstatus">
                      <option value="">Project Status</option>
                      <option value="Ideation Phase">Ideation Phase</option>
                      <option value="Prototype Ready">Prototype Ready</option>
                      <option value="Funding Stage">Funding Stage</option>
                      <option value="Need Market Assitance">Need Market Assitance</option>
                      <option value="Already Won Hackathons">Already Won Hackathons</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleFormControlFile1"> <b> Upload Your Idea File </b></label>
                    <input type="file" name="ideafile" id="exampleFormControlFile1">
                  </div>
            </div>
        </div>


        <div class="row text-center">
            <div class=" col-md-12 col-lg-12">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" required name="registration" value="1" <?php echo e(old('registration') ? 'checked' : ''); ?>> <?php echo e(__('Agrre with AIT E-cell T&C.')); ?>

                    </label>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Submit Your Idea" />
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('entrepreneur.entrepreneur-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>