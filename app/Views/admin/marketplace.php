<?= $this->extend("App\Views\admin\layout") ?>
<?= $this->section('javascript') ?>
      <script src="/assets/blockchain/marketplace.js?v=2.0.2"></script>
      <script src="/assets/blockchain/nfttravel.js?v=2.0.2"></script>
      <script type="text/javascript">
        
        $(".syncdata").on("click", async function(){
            var id = $(this).attr("data-id");
            var data = await axios.get('/admin/marketplace/ajaxsync/'+id);
            await SmartApp.Marketplace.sync(data.data);

        });

        $(".synccontent").on("click", async function(){
            var id = $(this).attr("data-id");
            var data = await axios.get('/admin/marketplace/ajaxsync/'+id);
            await SmartApp.Marketplace.syncContent(data.data);

        });

        
        $(".seterc").on("click", async function(){
            var address = $(".tokenpayment").val();
            if(address == ""){
              alert("Address Token Empty");
              return false;
            }
            await SmartApp.Marketplace.setTokenMoney(address);
        });
        
        $(".setnft").on("click", async function(){
            var address = $(".nftaddress").val();
            if(address == ""){
              alert("Address NFT Token Empty");
              return false;
            }
            await SmartApp.Marketplace.setNFT(address);
        });

        $(".setfatory").on("click", async function(){
            var address = $(".nftfatory").val();
            if(address == ""){
              alert("Address NFT Token Empty");
              return false;
            }
            await SmartApp.Travel.setFatory(address);
        });
        
        
        $(".withdraw").on("click", async function(){
            
            await SmartApp.Marketplace.withdrawBNB();
        });

      </script>
<?= $this->endSection() ?>
<?= $this->section('main') ?>


<div class="card">
    <div class="card-header pb-0">
      <h5 class="mb-0">Settings</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          Set NFT Travel
          <div class="row">
            <div class="col-md-8">
              <input type="text" class="form-control nftaddress" placeholder="Enter NFT Travel Address" >
            </div>
            <div class="col-md-4">
              <button class="btn btn-outline-secondary setnft" type="button">Set NFT Travel</button>
            </div>
          </div>
          
        </div>

        <div class="col-md-6">
          Set Token Payment
          <div class="row">
            <div class="col-md-8">
              <input type="text" class="form-control tokenpayment" placeholder="Enter Token Address" >
            </div>
            <div class="col-md-4">
              <button class="btn btn-outline-secondary seterc" type="button">Set Token</button>
            </div>
          </div>

          
        </div>


        <div class="col-md-6">
          Set NFT Factory
          <div class="row">
            <div class="col-md-8">
              <input type="text" class="form-control nftfatory" placeholder="Enter Fatory Address" >
            </div>
            <div class="col-md-4">
              <button class="btn btn-outline-secondary setfatory" type="button">Set Fatory</button>
            </div>
          </div>

          
        </div>

        <div class="col-md-6">
          <br>
          <button class="btn btn-outline-secondary withdraw" type="button">Widthdraw BNB</button>
          <button class="btn btn-outline-secondary withdraw" type="button">Enable Event's</button>
        </div>

        

      </div>

    </div>
</div>
<br>
      
<div class="card">
    <div class="card-header pb-0">
              <div class="d-lg-flex">
                <div>
                  <h5 class="mb-0">All NFT Marketplace</h5>
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
                      	<th data-sortable="" style="width: 14.6805%;"><a href="#" class="dataTable-sorter">Id</a></th>
                      	<th data-sortable="" style="width: 16.3212%;"><a href="#" class="dataTable-sorter">Name</a></th>
                        <th data-sortable="" style="width: 16.3212%;"><a href="#" class="dataTable-sorter">Price</a></th>
                      	<th data-sortable="" style="width: 16.2349%;"><a href="#" class="dataTable-sorter">Night</a></th>
                      	<th data-sortable="" style="width: 19.6028%;"><a href="#" class="dataTable-sorter">Bed</a></th>
                      	<th data-sortable="" style="width: 22.3661%;"><a href="#" class="dataTable-sorter">Round</a></th>
                      	<th data-sortable="" style="width: 10.7945%;"><a href="#" class="dataTable-sorter">Revenue</a></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->item_id;?></td>
                                <td><?php echo $value->name;?></td>
                                <td><?php echo $value->price;?></td>
                                
                                <td><?php echo $value->night;?></td>
                                <td><?php echo $value->bed;?></td>
                                <td><?php echo $value->chuky;?></td>
                                
                                <td>
                                    
                                    <button class="btn btn-sm btn-primary syncdata" data-id="<?php echo $value->id;?>">Sync</button>
                                    <button class="btn btn-sm btn-primary synccontent" data-id="<?php echo $value->id;?>">Sync Content</button>
                                    <a class="btn btn-sm btn-primary" href="<?php echo admin_url("marketplace/manager/".$value->id);?>">Edit</a>
                                    <a class="btn btn-sm btn-primary" href="<?php echo admin_url("marketplace/delete/".$value->id);?>">Delete</a>

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