<?= $this->extend("App\Views\home") ?>
<?= $this->section('main') ?>
  <?= $this->section('javascript') ?>
    
    <script src="/assets/blockchain/nfttravel.js?v=2.0.3"></script>
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
          await SmartApp.Travel.getMyNFT(item,'myNFT').then(()=>{
              $("body #notifyWait").remove();
              
          });
          
      })
  </script>
  <?= $this->endSection() ?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-body mb-3">
              <div class="row">
                <div class="col-8 my-auto">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Wallet</p>
                    <div class="wallet_address"></div>
                  </div>
                </div>
                <div class="col-4 text-end">
                  
                  <h6 class="mb-0 text-end me-1"><span class="balance"><?php echo number_format($item->price);?></span></h6>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="row">
            
              
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="text-gradient text-primary"><span id="status1" countto="12">UBG NFT</span></h5>
                  <h6 class="mb-0 font-weight-bolder">0</h6>
                  
                </div>
              </div>
            </div>
            
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="text-gradient text-primary"><span id="status1" countto="12">Sell</span></h5>
                  <h6 class="mb-0 font-weight-bolder">0</h6>
                 
                </div>
              </div>
            </div>
            

            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="text-gradient text-primary"><span id="status1" countto="12">Booking</span></h5>
                  <h6 class="mb-0 font-weight-bolder">0</h6>
                  
                </div>
              </div>
            </div>


            

          </div>
        </div>
      </div>
      

      <div class="card">
        <div class="card-body">

      <h4 class="mt-4"><?php echo lang("blockchian.younft");?></h4>

      <div class="row justify-content-center" id="myNFT">
                             
            
      </div><!-- .row -->
      
     </div>
      </div>

      
     <?= $this->endSection() ?>