<?= $this->extend("App\Views\home") ?>
<?= $this->section('main') ?>
  <?= $this->section('javascript') ?>
  <script src="/assets/js/plugins/chartjs.min.js"></script>
      <script>
    // Rounded slider
    const setValue = function(value, active) {
      document.querySelectorAll("round-slider").forEach(function(el) {
        if (el.value === undefined) return;
        el.value = value;
      });
      const span = document.querySelector("#value");
      span.innerHTML = value;
      if (active)
        span.style.color = 'red';
      else
        span.style.color = 'black';
    }

    document.querySelectorAll("round-slider").forEach(function(el) {
      el.addEventListener('value-changed', function(ev) {
        if (ev.detail.value !== undefined)
          setValue(ev.detail.value, false);
        else if (ev.detail.low !== undefined)
          setLow(ev.detail.low, false);
        else if (ev.detail.high !== undefined)
          setHigh(ev.detail.high, false);
      });

      el.addEventListener('value-changing', function(ev) {
        if (ev.detail.value !== undefined)
          setValue(ev.detail.value, true);
        else if (ev.detail.low !== undefined)
          setLow(ev.detail.low, true);
        else if (ev.detail.high !== undefined)
          setHigh(ev.detail.high, true);
      });
    });

    // Count To
    if (document.getElementById('status1')) {
      const countUp = new CountUp('status1', document.getElementById("status1").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status2')) {
      const countUp = new CountUp('status2', document.getElementById("status2").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status3')) {
      const countUp = new CountUp('status3', document.getElementById("status3").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status4')) {
      const countUp = new CountUp('status4', document.getElementById("status4").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status5')) {
      const countUp = new CountUp('status5', document.getElementById("status5").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status6')) {
      const countUp = new CountUp('status6', document.getElementById("status6").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }

    // Chart Doughnut Consumption by room
    var ctx1 = document.getElementById("chart-consumption").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    new Chart(ctx1, {
      type: "doughnut",
      data: {
        labels: ['Living Room', 'Kitchen', 'Attic', 'Garage', 'Basement'],
        datasets: [{
          label: "Consumption",
          weight: 9,
          cutout: 90,
          tension: 0.9,
          pointRadius: 2,
          borderWidth: 2,
          backgroundColor: ['#5e72e4', '#8392ab', '#11cdef', '#2dce89', '#fb6340'],
          data: [15, 20, 13, 32, 20],
          fill: false
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false,
            }
          },
        },
      },
    });

    // Chart Consumption by day
    var ctx = document.getElementById("chart-cons-week").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
        datasets: [{
          label: "Watts",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#3A416F",
          data: [150, 230, 380, 220, 420, 200, 70],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              beginAtZero: true,
              font: {
                size: 12,
                family: "Open Sans",
                style: 'normal',
              },
              color: "#9ca2b7"
            },
          },
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#9ca2b7'
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#9ca2b7'
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
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
                <div class="tab-pane fade show position-relative active height-400 border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/smart-home-1.jpg'); background-size:cover;">
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
                          UBG Token : 222.000.000$ Market
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <img class="w-50" src="../../assets/img/small-logos/icon-sun-cloud.png" alt="image sun">
                      <h5 class="mb-0 text-end me-1">Cloudy</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <?php foreach ($marketplance as $key => $value) { ?>
              
            <div class="col-md-6 mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1 class="text-gradient text-primary"><span id="status1" countto="21">21</span> <span class="text-lg ms-n2">°C</span></h1>
                  <h6 class="mb-0 font-weight-bolder">Living Room</h6>
                  <p class="opacity-8 mb-0 text-sm">Temperature</p>
                </div>
              </div>
            </div>
            <?php } ?>
            
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