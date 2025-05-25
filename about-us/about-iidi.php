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

<main id="main" class="container py-5">
  <section>
    <h2>About IIDI</h2>
    <p>This is the content for the About IIDI page. You can replace this with real info.</p>
  </section>
</main>

<?php include('../includes/footer.php'); ?>

</body>
</html>
