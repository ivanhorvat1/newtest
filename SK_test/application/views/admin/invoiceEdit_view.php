<div class="container">
    <?php if(count(@$invoice)){
        $id = @($invoice->invoice_id);
        echo form_open("Admin_controller/invoiceEdit/{$id}", ['class'=>'form-horizontal']); ?>
        <fieldset>
            <div class="hidden">
                <legend>Update invoice</legend>
                <div class="row">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Clients</label>
                                <div class="col-lg-8">
                                    <select name="client" id="sel" class="form-control">
                                        <?php
                                        foreach ($client as $c){
                                            $selected="";
                                            if($c['user_id'] == $invoice->user_id){ $selected="selected"; } ?>
                                            <option value="<?php  echo $c['user_id']; ?>" <?php echo $selected ;?>> <?php  echo $c['firstname']." ".$c['lastname'];  ?></option>
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
                                    <?php echo form_input(['name'=>'sum','class'=>'form-control','placeholder'=>'Sum','value'=>set_value('sum', @$invoice->sum), 'required'=>'required']) ?>
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
                                    <?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Title','value'=>set_value('title', @$invoice->title), 'required'=>'required']) ?>
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
                                    <?php echo form_input(['name'=>'ico','class'=>'form-control','placeholder'=>'Identifikačné číslo organizácie','value'=>set_value('ico', @$invoice->ico), 'required'=>'required']) ?>
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
                                    <?php echo form_input(['name'=>'dic','class'=>'form-control','placeholder'=>'Daňové identifikačné číslo','value'=>set_value('dic', @$invoice->dic), 'required'=>'required']) ?>
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
                                    <?php echo form_textarea(['name'=>'description','class'=>'form-control','placeholder'=>'Description','value'=>set_value('description' , @$invoice->description), 'required'=>'required']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4" style="font-size: 15px"> <?php echo form_error('description'); ?></div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <?php echo form_reset('reset','Reset',['class'=>'btn bg-default']);
                            echo form_submit('submit','Update',['class'=>'btn bg-primary']); ?>
                        </div>
                    </div>
                </div>
        </fieldset>
        <?= form_close(); ?>
    <?php }
    else
    {
        ?>
        <div class="alert alert-warning col-md-4">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning</strong>  Invoice you are looking for does not exist!!<br> Please return to <?= anchor('dashboard', 'dashboard') ?>
        </div>
    <?php } ?>
</div>

