<?php include(__DIR__ . '/../includes/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>IIDI Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS Files (relative to /public/index.php) -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

<header id="header" class="header sticky-top">
  <div class="container d-flex align-items-center justify-content-between">
    <a href="/public/index.php" class="logo d-flex align-items-center">
      <h1 class="sitename">IIDI</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="<?php echo BASE_URL; ?>index.php" class="active">Home</a></li>

        <li class="dropdown">
          <a href="#"><span>About Us</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?php echo BASE_URL; ?>about-us/about-iibh.php">About IIBH</a></li>
            <li><a href="<?php echo BASE_URL; ?>about-us/about-iidi.php">About IIDI</a></li>
            <li><a href="<?php echo BASE_URL; ?>about-us/board-of-directors.php">Board of Directors</a></li>
            <li><a href="<?php echo BASE_URL; ?>about-us/management-team.php">Management Team</a></li>
            <li><a href="<?php echo BASE_URL; ?>about-us/committees.php">Committees</a></li>
            <li><a href="<?php echo BASE_URL; ?>about-us/group-companies.php">Group Companies</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#"><span>Bullion Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?php echo BASE_URL; ?>bullion/client.php">Client</a></li>
            <li><a href="<?php echo BASE_URL; ?>bullion/member.php">Member</a></li>
            <li><a href="<?php echo BASE_URL; ?>bullion/vault-manager.php">Vault Manager</a></li>
            <li><a href="<?php echo BASE_URL; ?>bullion/knowledge-centre.php">Knowledge Centre</a></li>
            <li><a href="<?php echo BASE_URL; ?>bullion/bullion-using.php">Bullion ISIN</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#"><span>Security Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?php echo BASE_URL; ?>securities/how-to-become-a-dp.php">How to Become DP</a></li>
            <li><a href="<?php echo BASE_URL; ?>securities/list-of-iidi-dps.php">List of IIDI DPs</a></li>
            <li><a href="<?php echo BASE_URL; ?>securities/security-isin.php">Security ISIN</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#"><span>Investor Relations</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?php echo BASE_URL; ?>investor-relations/annual-reports.php">Annual Reports</a></li>
            <li><a href="<?php echo BASE_URL; ?>investor-relations/complaint-handling.php">Complaint Handling</a></li>
            <li><a href="<?php echo BASE_URL; ?>investor-relations/other-downloads.php">Other Downloads</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#"><span>Circulars</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?php echo BASE_URL; ?>circulars/bullion-circulars.php">Bullion Circulars</a></li>
            <li><a href="<?php echo BASE_URL; ?>circulars/securities-circulars.php">Securities Circulars</a></li>
            <li><a href="<?php echo BASE_URL; ?>circulars/tenders.php">Tenders</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#"><span>Regulations</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?php echo BASE_URL; ?>regulations/ifsc-authority.php">IFSC Authority</a></li>
            <li><a href="<?php echo BASE_URL; ?>regulations/iidi.php">IIDI</a></li>
          </ul>
        </li>

        <li><a href="<?php echo BASE_URL; ?>contact-us.php">Contact Us</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>
