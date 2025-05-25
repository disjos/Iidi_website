<?php
require_once('../../includes/config.php');
require_once('../../includes/db.php');  // This defines $pdo

#require_once('../includes/auth_check.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid user ID.");
}

$user_id = (int)$_GET['id'];

// Prevent deleting the currently logged-in user
if ($user_id == $_SESSION['admin_user_id']) {
    echo "You cannot delete your own account.";
    exit;
}

// Delete user
$stmt = $pdo->prepare("DELETE FROM admin_users WHERE id = :id");
$stmt->execute(['id' => $user_id]);

// Redirect back to user list
header("Location: ../users.php");
exit;
?>
