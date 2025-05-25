<?php
// header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel</title>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/IIDI-web/admin/assets/vendor/bootstrap/css/bootstrap.min.css" />
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/IIDI-web/admin/assets/vendor/fontawesome-free/css/all.min.css" />
  
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="/IIDI-web/admin/assets/css/adminlte.min.css" />
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/IIDI-web/admin/assets/css/custom.css" />
  
  <!-- Any other CSS files -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/IIDI-web/admin/dashboard.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/IIDI-web/admin/auth/logout.php" role="button">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
