<?= $this->extend("App\Views\home") ?>
<?= $this->section('main') ?>
    <?= $this->section('javascript') ?>

    
    <script src="/assets/js/socket.io.js?v=2.0.2"></script>
    <script type="text/javascript">
      var socket = io("https://expressiq.co", {
        withCredentials: false,
        extraHeaders: {
          "username": "<?php echo user_id();?>"
        }
      });

     
    (function(){
        setInterval(function(){
            var html =`<ins class="adsbygoogle" style="display:inline-block;width:100%;height:250px" data-ad-client="ca-pub-4099957745291159" data-ad-slot="1384479382"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});<\/script>`;
          $(".adsbygoogle").html(html);
        },600000);
    })();
    </script>

    

    <script type="text/javascript">

    function timeout() {
        setTimeout(function () {

            getData();
            timeout();
        },60000);
    }
let vnd = 23000;
let kwr = 18000;
function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
  try {
    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

    const negativeSign = amount < 0 ? "-" : "";

    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
    let j = (i.length > 3) ? i.length % 3 : 0;

    var data = negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
    return data;
  } catch (e) {
    console.log(e)
  }
};
function getData() {
         fetch("https://api1.binance.com/api/v3/ticker/price").then(response => {
                // handle the response
                response.json().then(d => {
                        d.forEach((v) =>{
                            
                            if(v.symbol.search(/USDT/) !== -1){
                                var classBuy = ".buy"+v.symbol;
                                var classSell = ".sell"+v.symbol;
                                var priceUSDT = parseFloat(v.price).toFixed(2);
                                let buyPrice = calcBuy(priceUSDT);
                                let sellPrice = calcSell(priceUSDT);
                                $(classBuy).html(formatMoney(buyPrice));
                                $(classBuy+"_vnd").html(formatMoney(parseFloat(buyPrice*vnd).toFixed(2),0));
                                $(classBuy+"_kwr").html(formatMoney(parseFloat(buyPrice*kwr).toFixed(2),0));

                                $(classSell).html(formatMoney(sellPrice));
                                $(classSell+"_vnd").html(formatMoney(parseFloat(sellPrice*vnd).toFixed(2),0));
                                $(classSell+"_kwr").html(formatMoney(parseFloat(sellPrice*kwr).toFixed(2),0));
                            }
                            
                        });
                    });
                //console.log(response.data);
            })
            .catch(error => {
                // handle the error
            });
        }
    getData();
    timeout();

    function calcBuy(usdt) {
        return parseFloat(usdt * 1.025).toFixed(2);
    }
    function calcSell(usdt) {
        return parseFloat(usdt * 0.975).toFixed(2);
    }
</script>

    <?= $this->endSection() ?>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="fas fa-wifi text-white p-2"></i>
                    <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                          <h6 class="text-white mb-0">Jack Peterson</h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                          <h6 class="text-white mb-0">11/22</h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fas fa-landmark opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Signal</h6>
                      <span class="text-xs">Belong Interactive</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">+$2000</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mt-md-0 mt-4">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fab fa-paypal opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Win</h6>
                      <span class="text-xs">Freelance Payment</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">$455.00</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mt-md-0 mt-4">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fab fa-paypal opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Loss</h6>
                      <span class="text-xs">Freelance Payment</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">$455.00</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mt-md-0 mt-4">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fab fa-paypal opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">USD</h6>
                      <span class="text-xs">Freelance Payment</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">$455.00</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-9 mt-4">
          
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Mã giao dịch</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablesignal">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Symbol</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" colspan="3">Bán</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="3">Mua</th>
                      
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                    <tr>
                      <td></td>
                      <td>USD</td>
                      <td>VND</td>
                      <td>KWR</td>
                      <td>USD</td>
                      <td>VND</td>
                      <td>KWR</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $item){?>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-<?php echo $item->type == "buy" ? "info" : "danger";?> mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-<?php echo $item->type == "buy" ? "up" : "down";?>"></i></button>
                            <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark text-sm"><?php echo $item->symbol;?></h6>
                              <span class="text-xs"><?php echo $item->opentime;?></span>
                            </div>
                          </div>
                          
                      </td>

                      <td class="buy<?php echo $item->symbol;?>">--</td>
                        <td class="buy<?php echo $item->symbol;?>_vnd">--</td>
                        <td class="buy<?php echo $item->symbol;?>_kwr">--</td>
                        <td class="sell<?php echo $item->symbol;?>">--</td>
                        <td class="sell<?php echo $item->symbol;?>_vnd">--</td>
                        <td class="sell<?php echo $item->symbol;?>_kwr">--</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-primary" href="/exchange/buy/<?php echo $item->symbol;?>">Buy Now</a>
                            <a class="btn btn-sm btn-primary" href="/exchange/sell/<?php echo $item->symbol;?>">Sell Now</a>
                        </td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mt-4">
          
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Giao dịch hoàn tất</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                  <i class="far fa-calendar-alt me-2"></i>
                  <small><?php echo date('M-d-Y');?></small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              
              <ul class="list-group" id="orderComplete">
                <?php foreach($finish as $item){ ?>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-<?php echo $item->type == "buy" ? "info" : "danger";?> mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-<?php echo $item->type == "buy" ? "up" : "down";?>"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Vo khoa <?php echo $item->type;?> <?php echo $item->volume;?> <?php echo $item->symbol;?> </h6>
                      <span class="text-xs"><?php echo date("d-m h:i A",$item->opentime);?></span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-<?php echo $item->profit_pip > 0 ? "info text-gradient " : ($item->profit_pip < 0 ? "danger text-gradient " : "secondary");?> text-sm font-weight-bold">
                    Hoàn tất
                  </div>
                </li>
                <?php } ?>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
     
    </div>

<?= $this->endSection() ?>