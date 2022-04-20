<?= $this->extend("App\Views\home") ?>
<?= $this->section('main') ?>
  <?= $this->section('javascript') ?>
  
  <?= $this->endSection() ?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-7">
          <div class="card">
            <div class="card-header d-flex pb-0 p-3">
              <h6 class="my-auto">Cameras</h6>
              <div class="nav-wrapper position-relative ms-auto w-50">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                      Lounge
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                      Office
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false">
                      Attic
                    </a>
                  </li>
                </ul>
              </div>
              <div class="dropdown pt-2">
                <a href="javascript:;" class="text-secondary ps-4" id="dropdownCam" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end me-sm-n4 px-2 py-3" aria-labelledby="dropdownCam">
                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Pause</a></li>
                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Stop</a></li>
                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Schedule</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove</a></li>
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
                      
                      <h5 class="mb-0 text-end me-1"><?php echo number_format($item->price);?></h5>
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
                  <h6 class="mb-0 font-weight-bolder">Living Room</h6>
                  <p class="opacity-8 mb-0 text-sm">Temperature</p>
                </div>
              </div>
            </div>
            
            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1 class="text-gradient text-primary"><span id="status1" countto="21">Bed</span> <span class="text-lg ms-n2">°C</span></h1>
                  <h6 class="mb-0 font-weight-bolder">Living Room</h6>
                  <p class="opacity-8 mb-0 text-sm">Temperature</p>
                </div>
              </div>
            </div>
            

            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1 class="text-gradient text-primary"><span id="status1" countto="21">Round</span> <span class="text-lg ms-n2">°C</span></h1>
                  <h6 class="mb-0 font-weight-bolder">Living Room</h6>
                  <p class="opacity-8 mb-0 text-sm">Temperature</p>
                </div>
              </div>
            </div>


            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <br><br>
                  <button class="btn btn-primary btn-lg">Buy Now</button>
                 
                </div>
              </div>
            </div>

          </div>

          
          
        </div>
      </div>


      <div class="card mt-4">
        <div class="card-header"><h4>Infomation</h4></div>
        <div class="card-body">
          
          <?php echo nl2br($item->description);?>
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
                      <h6 class="mb-0"><a href="/marketplance/item-<?php echo $value->id;?>.html"><?php echo $value->name;?></a></h6>
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
      
     <?= $this->endSection() ?>