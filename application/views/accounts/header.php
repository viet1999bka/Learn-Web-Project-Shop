<!DOCTYPE html>
<html lang="vn">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title><?php echo $title ?></title>
  <link href="<?php echo BASEPATH ?>/public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASEPATH ?>/public/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- Header đăng nhập-->
  <div class="header">
    <div style="display: flex;align-items: center;height: 100%;justify-content: space-between;">
      <div style="display: flex;align-items: center;">
        <a href="<?php echo BASEPATH ?>/home/index" style="margin-left: 10px;"><img src="<?php echo PATH_URL_IMG ?>logo.png" alt="shop logo"></a>
        <div class="line"></div>
        <span style="padding-left: 20px;font-size: 24px;color: white;">
        <?php echo $title ?> 
        </span>
      </div>
      <a href="#" style="text-decoration: none; margin-right: 1rem;cursor: pointer;">
        <p>Cần hỗ trợ ?</p>
      </a>
    </div>
  </div>
