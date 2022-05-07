<?= $this->extend("App\Views\admin\layout") ?>
<?= $this->section('main') ?>

      
<div class="card">
    <div class="card-header pb-0">
              <div class="d-lg-flex">
                <div>
                  <h5 class="mb-0">All Booking</h5>
                  <p class="text-sm mb-0">
                    A lightweight, extendable, dependency-free javascript HTML table plugin.
                  </p>
                </div>
                <div class="ms-auto my-auto mt-lg-0 mt-4">
                  <div class="ms-auto my-auto">
                    <a href="<?php echo admin_url("posts/manager");?>" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Product</a>
                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                      Import
                    </button>
                    <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog mt-lg-10">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                            <i class="fas fa-upload ms-3" aria-hidden="true"></i>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>You can browse your computer for a file.</p>
                            <input type="text" placeholder="Browse file..." class="form-control mb-3" onfocus="focused(this)" onfocusout="defocused(this)">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="importCheck" checked="">
                              <label class="custom-control-label" for="importCheck">I accept the terms and conditions</label>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
                  </div>
                </div>
              </div>
            </div>
    <div class="card-body">
        <div class="table-responsive">
             <div class="dataTable-container">

              	<table class="table table-flush dataTable-table" id="datatable-search">
                    <thead class="thead-light">
                      <tr>
                        <th data-sortable="" style="width: 1%;"><a href="#" class="dataTable-sorter">Token ID</a></th>
                      	<th data-sortable="" style="width: 14.6805%;"><a href="#" class="dataTable-sorter">Name</a></th>
                      	
                        
                        <th data-sortable="" style="width: 16.3212%;"><a href="#" class="dataTable-sorter">Hotel</a></th>
                        <th data-sortable="" style="width: 16.3212%;"><a href="#" class="dataTable-sorter">Check in</a></th>
                      	<th data-sortable="" style="width: 16.2349%;"><a href="#" class="dataTable-sorter">Check out</a></th>
                      	<th data-sortable="" style="width: 19.6028%;"><a href="#" class="dataTable-sorter">Country</a></th>
                      	
                      	<th data-sortable="" style="width: 10.7945%;"><a href="#" class="dataTable-sorter">Revenue</a></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <td><b><?php echo $value->tokenid;?></b></td>
                                <td><?php echo $value->firstname;?> <?php echo $value->lastname;?><br><?php echo $value->phonenumber;?></td>
                                
                                
                                <td><?php echo $value->hotel_localtion;?></td>
                                <td><?php echo $value->hotel_checkin;?></td>
                                
                                <td><?php echo $value->hotel_checkout;?></td>
                                <td><?php echo $value->hotel_country;?></td>
                                
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?php echo admin_url("booking/manager/".$value->id);?>">Confirm</a>
                                    
                                    <a class="btn btn-sm btn-primary" href="<?php echo admin_url("booking/delete/".$value->id);?>">Delete</a>

                                </td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>
              	</table>


          	</div>
      	</div>
    </div>

    <div class="card-footer">
        Page : 
    </div>
</div>


<?= $this->endSection() ?>