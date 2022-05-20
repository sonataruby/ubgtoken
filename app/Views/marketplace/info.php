<?= $this->extend("App\Views\home") ?>
<?= $this->section('main') ?>
  <?= $this->section('javascript') ?>
      <script src="/assets/blockchain/marketplace.js?v=2.0.2"></script>

      <script type="text/javascript">
          $('#staticBackdrop').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            var name = button.data('name') // Extract info from data-* attributes
            var star = button.data('star') // Extract info from data-* attributes
            var price = button.data('price') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body h1').text('Item NFT  ' + name + " "+star+" star")
            modal.find('.modal-footer button.marketplacebuyconfirm').attr("data-id",id);
          });

          $(".marketplacebuyconfirm").on("click", function(){
              var id = $(this).attr("data-id");
              var plance = Number($('.modal-body option:selected').val());
              console.log(plance, "ID : ", id);
              if(plance >= 365) SmartApp.Marketplace.buyTickets(id,plance);
          });
      </script>
  <?= $this->endSection() ?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-7">
          <div class="card">
            <div class="card-header d-flex pb-0 p-3">
              <h6 class="my-auto">Gallery</h6>
              <div class="nav-wrapper position-relative ms-auto w-50">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                      Gallery
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                      Video
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false">
                      Notes
                    </a>
                  </li>
                </ul>
              </div>
              
            </div>
            <div class="card-body p-3 mt-2">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show position-relative active height-400 border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1" style="background-image: url('<?php echo $item->banner;?>'); background-size:cover;">
                  <div class="position-absolute d-flex top-0 w-100">
                    <p class="text-white p-3 mb-0">17.05.2021 4:34PM</p>
                    <div class="ms-auto p-3">
                      <span class="badge badge-secondary">
                        <i class="fas fa-dot-circle text-danger"></i>
                        Recording</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade position-relative height-400 border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/smart-home-2.jpg'); background-size:cover;">
                  <div class="position-absolute d-flex top-0 w-100">
                    <p class="text-white p-3 mb-0">17.05.2021 4:35PM</p>
                    <div class="ms-auto p-3">
                      <span class="badge badge-secondary">
                        <i class="fas fa-dot-circle text-danger"></i>
                        Recording</span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade position-relative height-400 border-radius-lg" id="cam3" role="tabpanel" aria-labelledby="cam3" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/smart-home-3.jpg'); background-size:cover;">
                  <div class="position-absolute d-flex top-0 w-100">
                    <p class="text-white p-3 mb-0">17.05.2021 4:57PM</p>
                    <div class="ms-auto p-3">
                      <span class="badge badge-secondary">
                        <i class="fas fa-dot-circle text-danger"></i>
                        Recording</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-5 ms-auto mt-xl-0 mt-4">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8 my-auto">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Markets</p>
                        <h5 class="font-weight-bolder mb-0">
                          <?php echo $item->name;?>
                        </h5>
                        <?php for ($i=1; $i <= $item->star; $i++) { ?>
                        <span class="fa fa-star text-danger"></span>
                      <?php } ?>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      
                      <h5 class="mb-0 text-end me-1"><?php echo number_format($item->price * $item->chuky);?></h5>
                      <h3>UBG</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            
              
            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1 class="text-gradient text-primary"><span id="status1" countto="21">Night</span> <span class="text-lg ms-n2">°C</span></h1>
                  <h6 class="mb-0 font-weight-bolder"><?php echo number_format($item->night);?></h6>
                  
                </div>
              </div>
            </div>
            
            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1 class="text-gradient text-primary"><span id="status1" countto="21">Bed</span> <span class="text-lg ms-n2">°C</span></h1>
                  <h6 class="mb-0 font-weight-bolder"><?php echo number_format($item->bed);?></h6>
                 
                </div>
              </div>
            </div>
            

            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1 class="text-gradient text-primary"><span id="status1" countto="21">Round</span> <span class="text-lg ms-n2">°C</span></h1>
                  <h6 class="mb-0 font-weight-bolder"><?php echo number_format($item->chuky);?> days</h6>
                 
                </div>
              </div>
            </div>


            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <br>
                  <button class="btn btn-primary btn-lg marketplacebuynow" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?php echo $item->item_id; ?>" data-star="<?php echo $item->star; ?>" data-name="<?php echo $item->name; ?>" data-price="<?php echo $item->price; ?>"><?php echo lang("blockchian.buynow");?></button>
                 
                </div>
              </div>
            </div>

          </div>

          
          
        </div>
      </div>


      <div class="row">
        <div class="col-md-7">
          <div class="card mt-4">
            <div class="card-header"><h4><?php echo lang("blockchian.infomation");?></h4><hr></div>
            <div class="card-body">
              
              <?php echo nl2br($item->description);?>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card mt-4">
              <div class="card-header"><h4><?php echo lang("blockchian.notes");?></h4><hr></div>
                <div class="card-body">
                  
                  
                </div>
            </div>
          </div>
      </div>

      <div class="card mt-4">
        <div class="card-body">
          <h4>Market Plance</h4>
          <div class="row mt-4">
            <?php foreach ($marketplance as $key => $value) { ?>
              
            <div class="col-lg-3 mb-3">
              <div class="card">
                <img class="card-img-top" src="<?php echo $value->banner;?>" style="height: 180px;">
                <div class="card-body p-3">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h6 class="mb-0"><a href="/marketplace/item-<?php echo $value->id;?>.html"><?php echo $value->name;?></a></h6>
                      <?php for ($i=1; $i <= $value->star; $i++) { ?>
                        <span class="fa fa-star text-danger"></span>
                      <?php } ?>
                    </div>
                    <h5>
                      <?php echo $value->price;?> UBG
                    </h5>
                  </div>
                  <hr class="horizontal dark">
                  <div class="d-flex justify-content-between">
                    <h6 class="mb-0">Night</h6>
                    <span><?php echo $value->night;?></span>
                  </div>

                  <div class="d-flex justify-content-between">
                    <h6 class="mb-0">Bed</h6>
                    <span><?php echo $value->night;?></span>
                  </div>

                  <div class="d-flex justify-content-between">
                    <h6 class="mb-0">Start</h6>
                    <span><?php echo $value->start_date;?></span>
                  </div>

                  <div class="d-flex justify-content-between">
                    <h6 class="mb-0">End</h6>
                    <span><?php echo $value->end_date;?></span>
                  </div>

                </div>
                
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
     

      <div class="card mt-4">
        <div class="card-body">
          <h4>UBG Market</h4>
          <div class="row mt-4">
            <?php foreach ($nftmarket as $key => $value) { ?>
              
            <div class="col-lg-3 mb-3">
              <div class="card">
                <img class="card-img-top" src="<?php echo $value->banner;?>" style="height: 180px;">
                <div class="card-body p-3">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h6 class="mb-0"><a href="/market/item-<?php echo $value->id;?>.html"><?php echo $value->name;?></a></h6>
                      <?php for ($i=1; $i <= $value->star; $i++) { ?>
                        <span class="fa fa-star text-primary"></span>
                      <?php } ?>
                    </div>
                    <h5>
                      <?php echo $value->price;?> UBG
                    </h5>
                  </div>
                  <hr class="horizontal dark">
                  <div class="d-flex justify-content-between">
                    <h6 class="mb-0">Night</h6>
                    <span><?php echo $value->night;?></span>
                  </div>

                  <div class="d-flex justify-content-between">
                    <h6 class="mb-0">Bed</h6>
                    <span><?php echo $value->night;?></span>
                  </div>

                  <div class="d-flex justify-content-between">
                    <h6 class="mb-0">Start</h6>
                    <span><?php echo $value->start_date;?></span>
                  </div>

                  <div class="d-flex justify-content-between">
                    <h6 class="mb-0">End</h6>
                    <span><?php echo $value->end_date;?></span>
                  </div>

                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <hr class="horizontal dark my-5">
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Buy NFT</h5>
        
      </div>
      <div class="modal-body">
            
            Select Day
            <select  class="form-select" name="chuky">
                <?php for($i=1; $i <= 5; $i++) { ?>
              <option value="<?php echo $i*365; ?>"><?php echo $i*365; ?> Day - (<?php echo $i; ?> Year)</option>
          <?php } ?>
            </select>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary marketplacebuyconfirm">Confirm</button>
      </div> 
    </div>
  </div>
</div>
     <?= $this->endSection() ?>