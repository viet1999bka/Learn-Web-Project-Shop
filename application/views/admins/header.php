<!DOCTYPE html>
<html lang="vn">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title><?php echo $title ?></title>
  <link href="<?php echo BASEPATH ?>/public/css/reset.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo BASEPATH ?>/public/css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- Header đăng nhập-->
  <div class="header">
    <div class="header-top">
      <div class="navbar-link">
        <?php if(isset($_SESSION['admin_id'])): ?>
          <div class="dropdown">
          <img src="<?php echo PATH_URL_IMG ?>user.png">
          <button style="padding-bottom: 15px; margin-bottom:5px;" onclick="myFunction()" class="dropbtn"><?php echo $_SESSION['admin_acc'];?></button>
          <div id="myDropdown" class="dropdown-content">
            <a href="<?php echo BASEPATH ?>/admins/profile">Profie</a>
            <a href="<?php echo BASEPATH ?>/admins/logout">Log out</a>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="header-content">
      <div class="logo">
        <a href="<?php echo BASEPATH ?>/admins/index"><img src="<?php echo PATH_URL_IMG ?>logo.png" alt="shop logo"></a>
      </div>
    </div>
  </div>