<?php
include('C:\xampp\htdocs\IIDI-web\public\includes\header.php');

// Connect to DB
require_once('../../includes/db.php');

// Fetch data from directors table
$stmt = $pdo->query("SELECT * FROM directors ORDER BY id ASC");
$directors = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Board of Directors</title>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
<link href="../assets/css/main.css" rel="stylesheet" />

</head>
<body>
  <div class="container py-5">
    <h2 class="text-center mb-4">Board of Directors</h2>
    <div class="row">
      <?php foreach ($directors as $director): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow">
            <?php if (!empty($director['image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/../uploads/" . $director['image'])): ?>
            <img src="/../uploads/<?= htmlspecialchars($director['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($director['name']) ?>">
            <?php else: ?>
            <img src="/../uploads/default.jpg" class="card-img-top" alt="Default Image">
            <?php endif; ?>


            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($director['name']) ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($director['designation']) ?></h6>
              <p class="card-text"><?= nl2br(htmlspecialchars($director['bio'])) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>

<?php
include('C:\xampp\htdocs\IIDI-web\public\includes\footer.php');
?>