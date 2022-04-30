<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title><?php echo $title;?></title>
  <link rel="canonical" href="<?php echo base_url();?>" />
  <?php 
  if(is_array($meta)){
      foreach($meta as $metakey => $metahead){
        ?>
        <meta name="<?php echo $metakey;?>" content="<?php echo $metahead;?>">
        <?php
      }
  }
  ?>
  <!--  Social tags      -->
  <meta name="keywords" content="<?php echo $keywords;?>">
  <meta name="description" content="<?php echo $description;?>">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="<?php echo $tiwter;?>">
  <meta name="twitter:title" content="<?php echo $title;?>">
  <meta name="twitter:description" content="<?php echo $description;?>">
  <meta name="twitter:creator" content="<?php echo $tiwter;?>">
  <meta name="twitter:image" content="<?php echo $image;?>">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="<?php echo $facebook;?>">
  <meta property="og:title" content="<?php echo $title;?>" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?php echo current_url();?>" />
  <meta property="og:image" content="<?php echo $image;?>" />
  <meta property="og:description" content="<?php echo $description;?>" />
  <meta property="og:site_name" content="<?php echo $title;?>" />

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/dashboard.css?v=2.0.2" rel="stylesheet" />
  <link id="pagestyle" href="/assets/css/style.css?v=2.0.2" rel="stylesheet" />
  

<body class="g-sidenav-show   bg-gray-100">
<?php echo blocks("header",["title" => "Administrator"]);?>
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/ " target="_blank">
        <img src="/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Administrator</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <?php echo blocks("admin\\menu");?>
    </div>
    <div class="sidenav-footer mx-3 ">
      <?php if(logged_in()){ ?>
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-30 mx-auto rounded-circle img-fluid border border-2 border-white" src="/assets/img/team-2.jpg" alt="sidebar_illustration">
      </div>
      <a href="/profile" class="btn btn-dark btn-sm w-100 mb-3">Profile</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="/logout" type="button">Logout</a>
      <?php }else{ ?>
        <div class="card card-plain shadow-none" id="sidenavCard">
          <img class="w-30 mx-auto rounded-circle img-fluid border border-2 border-white" src="/assets/img/team-2.jpg" alt="sidebar_illustration">
        </div>
        <a href="/login" class="btn btn-dark btn-sm w-100 mb-3">Login</a>
        <a class="btn btn-primary btn-sm mb-0 w-100" href="/register" type="button">Register</a>
      <?php } ?>
    </div>

  </aside>
  <main class="main-content position-relative border-radius-lg ">
    
    <!-- Navbar -->
    <?php echo blocks('nav'); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <?php if (session()->has('message')) : ?>
        <div class="alert alert-success">
          <?= session('message') ?>
        </div>
      <?php endif ?>
      <?= $this->renderSection('main') ?>
    </div>
  </main>
 
 <?php echo blocks("footer");?>

 <?= $this->renderSection('style') ?>

  <script src="/assets/js/jquery.js?v=2.0.2"></script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/moment.js?v=2.0.2"></script>
  <script src="/assets/js/axios.js?v=2.0.2"></script>
  <script src="/assets/blockchain/web3.js?v=2.0.2"></script>
  <script src="/assets/blockchain/provider.js?v=2.0.2"></script>
  <script src="/assets/blockchain/blockchain.js?v=2.0.2"></script>
  <script src="/assets/blockchain/token.js?v=2.0.2"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/dashboard.js?v=2.0.2"></script>
<?= $this->renderSection('javascript') ?>
  
</body>

</html>
