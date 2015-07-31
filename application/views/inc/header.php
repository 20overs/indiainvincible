<html>
<head>
   <?php
   if(!isset($title)){
      $title = "Indiainvincible.com";
   }
   ?>
   <title><?=$title?></title>
   <script src="<?=site_url()?>public/js/jquery.min.js"></script>
   <script src="<?=site_url()?>public/js/main.js"></script>
   <script src="<?=site_url()?>public/js/bootstrap.min.js"></script>
   <script src="<?=site_url()?>public/js/jquery.light.js"></script>
   <script src="<?=site_url()?>public/js/notify.min.js"></script>
   <script src="<?=site_url()?>public/js/scrolling.js"></script>
   <link rel="stylesheet" href="<?=site_url()?>public/css/bootstrap.min.css" />
   <link rel="stylesheet" href="<?=site_url()?>public/css/main.css" />
   <link rel="stylesheet" href="<?=site_url()?>public/css/index.css" />
   <link rel="stylesheet" href="<?=site_url()?>public/css/jquery.light.css" />
   
   <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>
<div class="logo">
   <span class="name">India Invincible</span>
</div>
<body>
<div class="container-fluid header-bg">

<div class="col-lg-12">
<ul class="nav nav-pills cust-nav-pills">
   <li><a href="<?=site_url()?>" class="active">HOME</a></li>
   <?php
   foreach ($nav as $row) {
      ?>
         <li><a href="<?=site_url('welcome/page')?>/<?=$row['cat_id']?>"><?=$row['cat']?></a></li>
      <?php
      }
   if($this->session->userdata('logged_in')==true){
   ?>
      <li><a href="<?=site_url('user/logout')?>">LOGOUT</a></li>
   <?php
   }else if($this->session->userdata('admin_logged_in')==true){
   ?>
      <li><a href="<?=site_url('admin/logout')?>">ADMIN LOGOUT</a></li>
   <?php
   }
   ?>
</ul>
</div>
</div>