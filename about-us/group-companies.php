<?php
// Optional: Turn on error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About IIDI</title>

  <!-- Correct relative path from /public/about-us/ to /public/assets/css/ -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/css/main.css" rel="stylesheet">
</head>
<body>

<?php include('../includes/header.php'); ?>

<main class="main">

  <!-- Group Companies Section -->
  <section id="group-companies" class="section light-background">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Group Companies</h2>
        <p>Click on a company to learn more</p>
      </div>

      <div class="row gy-4">

        <!-- Company Card 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="card shadow-sm border-0">
            <a href="https://www.iibx.co.in/" target="_blank">
              <img src="../assets/img/iibx.jpg" class="card-img-top img-fluid" alt="IIBX">
            </a>
            <div class="card-body text-center">
              <h5 class="card-title">India International Bullion Exchange</h5>
            </div>
          </div>
        </div>

        <!-- Add more cards as needed -->

      </div>
    </div>
  </section>

</main>

<?php include('C:\xampp\htdocs\IIDI-web\public\includes\footer.php'); ?>
