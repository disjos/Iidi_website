<?php
// db.php

require_once __DIR__ . '/config.php';

try {
    // Set DSN for PostgreSQL
    $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";";
    // Create PDO instance with error exceptions
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    // Handle connection error gracefully
    die("Database connection failed: " . $e->getMessage());
}
