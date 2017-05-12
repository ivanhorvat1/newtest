<div class="container">
    <div id="add" class="row">
        <?= anchor('addClient','Add client',['class'=>'btn bg-primary btn-lg']) ?>
        <?= anchor('addInvoice','Add invoice',['class'=>'btn bg-primary btn-lg']) ?><br><br>
    </div>
    <?php
    if(count($client)>0) {
        ?>
    <?php if($this->session->flashdata('client')){
        $class = $this->session->flashdata('classC') ?>
        <div class="col-md-12">
            <div class="row">
                <div id="div1" class="alert alert-dismissible <?= $class ?>">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('client'); ?></strong>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="col-md-12">
        <h3>Client List</h3>
            <div style="overflow-x:auto;">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Adress</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($client as $profile) {
                        ?>
                        <tr>
                            <td><?=  $count ?></td>
                            <td><?= $profile['firstname'] ?></td>
                            <td><?= $profile['lastname'] ?></td>
                            <td><?= $profile['address'] ?></td>
                            <td><?= $profile['email'] ?></td>
                            <td><a href="<?= base_url("clientEdit/{$profile['user_id']}") ?>" ><span style="font-size: 15px" class='glyphicon glyphicon-edit btn bg-primary' title="edit"></span></a>
                                <a href="<?= base_url("clientDelete/{$profile['user_id']}") ?>" ><span style="font-size: 15px" class='glyphicon glyphicon-trash btn btn-danger' title="delete" onclick="return doconfirm();"></span></a></td>
                        </tr>
                        <?php
                        $count++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
    </div>
    <?php if($this->session->flashdata('invoice')){
        $class = $this->session->flashdata('classI')?>
        <div class="col-md-12" style="margin-top: 50px">
            <div class="row">
                <div id="div1" class="alert alert-dismissible <?= $class ?>">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('invoice'); ?></strong>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    if(count($invoice)>0) {
    ?>
    <div class="col-md-12" style="margin-top: 20px">
        <h3>Invoice List</h3>
        <div style="overflow-x:auto;">
            <table id="myTable1" class="table table-hover">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Client</th>
                    <th>Sum</th>
                    <th>Title</th>
                    <th>Identification number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count=1;
                foreach ($invoice as $invo) {
                    ?>
                    <tr class="tab1">
                        <td><?=  $count ?></td>
                        <?php
                        foreach ($client as $profile) {
                            if ($profile['user_id'] == $invo['user_id']) {
                                echo "<td>" . $profile['firstname'] . " " . $profile['lastname'] . "</td>";
                            }
                        } ?>
                        <td><?= $invo['sum'] ?></td>
                        <td><?= $invo['title'] ?></td>
                        <td><?= $invo['identification_number'] ?></td>
                        <td><a href="<?= base_url("invoiceEdit/{$invo['invoice_id']}") ?>" ><span style="font-size: 15px" class='glyphicon glyphicon-edit btn bg-primary' title="edit"></span></a>
                            <a href="<?= base_url("invoiceDelete/{$invo['invoice_id']}") ?>" ><span style="font-size: 15px" class='glyphicon glyphicon-trash btn btn-danger' title="delete" onclick="return doconfirm();"></span></a>
                            <a target="_blank" href="<?= base_url("createPDF/{$invo['invoice_id']}") ?>" ><span style="font-size: 15px" class='glyphicon glyphicon-floppy-save btn bg-primary' title="Download PDF file"></span></a></td>
                    </tr>
                    <?php
                    $count++;
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
        }
        else
        {
            ?>
            <div class="alert alert-warning col-md-4">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info</strong> You don't have invoice!!<br> Please  <?= anchor('addInvoice', 'add invoice') ?>
            </div>
        <?php } ?>
        <?php
        }
        else
        {
            ?>
            <div class="alert alert-warning col-md-4">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info</strong> You don't have clients!!<br> Please  <?= anchor('addClient', 'add client') ?>
            </div>
        <?php } ?>
    </div>
</div>



