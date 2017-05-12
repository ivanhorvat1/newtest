    <div class="container">
        <?= form_open('Admin_controller/registerClient', ['class'=>'form-horizontal']); ?>
        <fieldset>
            <div class="hidden">
            <legend>Register Client</legend>
            <div class="row">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-3 control-label">First Name*</label>
                        <div class="col-lg-9">
                            <?php echo form_input(['name'=>'firstname','class'=>'form-control','placeholder'=>'First Name','value'=>set_value('firstname'), 'required'=>'required']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('firstname'); ?></div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-3 control-label">Last Name*</label>
                        <div class="col-lg-9">
                            <?php echo form_input(['name'=>'lastname','class'=>'form-control','placeholder'=>'Last Name','value'=>set_value('lastname'), 'required'=>'required']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('lastname'); ?></div>
            </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Adress*</label>
                            <div class="col-lg-9">
                                <?php echo form_input(['name'=>'address','class'=>'form-control','placeholder'=>'Address','value'=>set_value('address'), 'required'=>'required']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('address'); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Email*</label>
                            <div class="col-lg-9">
                                <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email'), 'required'=>'required']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('email'); ?></div>
                </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <?php echo form_reset('reset','Reset',['class'=>'btn bg-default']);
                    echo form_submit('submit','Register',['class'=>'btn bg-primary']); ?>
                </div>
            </div>
                </div>
        </fieldset>
        <?= form_close(); ?>
    </div>

