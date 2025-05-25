<?php
include('C:\xampp\htdocs\IIDI-web\public\includes\header.php');
require_once '../../includes/db.php'; // Adjusted relative path to db.php

try {
    $stmt = $pdo->query("SELECT * FROM management_team ORDER BY id ASC");
    $team_members = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Management Team</title>
   <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="../assets/css/main.css" rel="stylesheet" />
</head>
<body>

<div class="container py-5">
    <h1 class="mb-4">Management Team</h1>
    <div class="row">
        <?php foreach ($team_members as $member): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="/public/uploads/<?= htmlspecialchars($member['photo']) ?>" class="card-img-top" alt="<?= htmlspecialchars($member['name']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($member['name']) ?></h5>
                        <p class="card-subtitle text-muted mb-2"><?= htmlspecialchars($member['designation']) ?></p>
                        <p class="card-text"><?= htmlspecialchars($member['bio']) ?></p>
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