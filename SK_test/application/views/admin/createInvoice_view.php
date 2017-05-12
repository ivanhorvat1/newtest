<?php if(count(@$client)){ ?>
<div class="container">
    <?php
    echo form_open('Admin_controller/createInvoice', ['class'=>'form-horizontal']); ?>
    <fieldset>
        <div class="hidden">
            <legend>Create invoice</legend>
            <div class="row">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Clients</label>
                            <div class="col-lg-8">
                                <select name="client" id="sel" class="form-control">
                                    <?php foreach($client as $c){ ?>
                                        <option value="<?php  echo $c['user_id']; ?>"><?php  echo $c['firstname']." ".$c['lastname'];  ?></option>
                                    <?php } ?>
                                </select><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Sum*</label>
                            <div class="col-lg-9">
                                <?php echo form_input(['name'=>'sum','class'=>'form-control','placeholder'=>'Sum','value'=>set_value('sum'), 'required'=>'required']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('sum'); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Title*</label>
                            <div class="col-lg-9">
                                <?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Title','value'=>set_value('title'), 'required'=>'required']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('title'); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">ICO*</label>
                            <div class="col-lg-9">
                                <?php echo form_input(['name'=>'ico','class'=>'form-control','placeholder'=>'Identifikačné číslo organizácie','value'=>set_value('ico'), 'required'=>'required']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('ico'); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">DIC*</label>
                            <div class="col-lg-9">
                                <?php echo form_input(['name'=>'dic','class'=>'form-control','placeholder'=>'Daňové identifikačné číslo','value'=>set_value('dic'), 'required'=>'required']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('dic'); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Description*</label>
                            <div class="col-lg-9">
                                <?php echo form_textarea(['name'=>'description','class'=>'form-control','placeholder'=>'Description','value'=>set_value('description'), 'required'=>'required']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('description'); ?></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <?php echo form_reset('reset','Reset',['class'=>'btn bg-default']);
                        echo form_submit('submit','Create',['class'=>'btn bg-primary']); ?>
                    </div>
                </div>
            </div>
    </fieldset>
    <?= form_close(); ?>
</div>
<?php }
else
{
    ?>
    <div class="alert alert-warning col-md-4" style="margin-left: 200px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Info</strong> You don't have clients!!<br> Please  <?= anchor('addClient', 'add client') ?>
    </div>
<?php } ?>
