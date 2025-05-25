<?php
// Show errors (development only)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load DB connection
require_once __DIR__ . '/../../includes/db.php';

// Check if ID is passed and valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../cms.php?error=invalid_id");
    exit;
}

$page_id = (int) $_GET['id'];

// Prepare and execute delete query
$stmt = $pdo->prepare("DELETE FROM pages WHERE id = :id");
$stmt->execute([':id' => $page_id]);

// Redirect back to CMS listing
header("Location: ../cms.php?deleted=success");
exit;
