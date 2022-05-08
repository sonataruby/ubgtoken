<?= $this->extend("App\Views\home") ?>
<?= $this->section('main') ?>
  <?= $this->section('javascript') ?>
    
    <script src="/assets/js/nfttravel.js?v=2.0.2"></script>
    <script type="text/html" id="itemMyNFT">
      <div class="col-lg-4 col-md-10 mb-4 item">
          <div class="card card-lg-y animated pd-0" data-animate="fadeInUp" data-delay="1.4">
              <img class="card-img-top" {banner} style="max-height: 180px;">
              <div class="card-body">
                  <h4 class="title title-md title-dark mb-4">{name}</h4>
                  <ul>
                      <li class="d-flex justify-content-between"><div>Start : {star} </div><div> Bed : {bed}</div></li>
                      <li class="d-flex justify-content-between"><div>Night : {night}</div></li>
                      
                      <li class="d-flex justify-content-between"><div>Round : {songaymua}</div><div>Next Exit : {songayhetky}</div></li>
                      <li><hr></li>
                      <li class="d-flex justify-content-between"><div>Create : {opentime}</div></li>
                      <li class="d-flex justify-content-between"><div>Next Exit : {exittime}</div></li>
                      <li>Update : {lastupdate}</li>
                  </ul>
                  <hr>
                  <div>
                      
                      <a class="btn btn-sm btn-info" href="/mynft/sell-{item_id}.html">Sell Now</a>
                      <a class="btn btn-sm btn-primary" href="/mynft/booking-{item_id}.html">Booking</a>
                  </div>
              </div>

          </div>
      </div><!-- .col -->
    </script>
    <script type="text/javascript">
      $(document).ready(async () => {
          var item = $("#itemMyNFT").html();
          
          $("body").append('<div id="notifyWait"><div class="preloader"><span class="spinner spinner-round"></span></div></div>');
          await SmartApp.Travel.getMyNFT(item,'col-lg-4 col-md-10 mb-4 item','myNFT').then(()=>{
              $("body #notifyWait").remove();
              
          });
          
      })
  </script>
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
                        <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Wallet</p>
                        <h5 class="font-weight-bolder mb-0">
                          <?php echo user()->email;?>
                        </h5>
                        <?php for ($i=1; $i <= $item->star; $i++) { ?>
                        <span class="fa fa-star text-danger"></span>
                      <?php } ?>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      
                      <h5 class="mb-0 text-end me-1">Balance : <span class="balance"><?php echo number_format($item->price);?></span></h5>
                      
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
                  <h1 class="text-gradient text-primary"><span id="status1" countto="21">UBG NFT</span></h1>
                  <h6 class="mb-0 font-weight-bolder">0</h6>
                  
                </div>
              </div>
            </div>
            
            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1 class="text-gradient text-primary"><span id="status1" countto="21">Sell</span></h1>
                  <h6 class="mb-0 font-weight-bolder">0</h6>
                 
                </div>
              </div>
            </div>
            

            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1 class="text-gradient text-primary"><span id="status1" countto="21">Booking</span></h1>
                  <h6 class="mb-0 font-weight-bolder">0</h6>
                  
                </div>
              </div>
            </div>


            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <br><br>
                  
                 
                </div>
              </div>
            </div>

          </div>

          
          
        </div>
      </div>


      <h4 class="mt-4"><?php echo lang("blockchian.younft");?></h4>

      <div class="row justify-content-center" id="myNFT">
                             
            
      </div><!-- .row -->
      
     

      
     <?= $this->endSection() ?>