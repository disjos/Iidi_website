<?php
// Database connection config
$host = 'localhost';
$db   = 'iidi_db';
$user = 'postgres';        // Replace with your PostgreSQL username
$pass = 'neev@123';    // Replace with your PostgreSQL password
$port = "5432";

$dsn = "pgsql:host=$host;port=$port;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("Error connecting to the database: " . $e->getMessage());
}

// Define admin user details
$username = 'admin';
$password = 'admin123'; // Change this password after first login!
$role = 'admin'; // role can be admin, editor, etc.
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if admin user already exists
$stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = :username");
$stmt->execute(['username' => $username]);
$userExists = $stmt->fetch();

if ($userExists) {
    echo "Admin user already exists. Please delete this file after confirming.";
    exit;
}

// Insert admin user
$stmt = $pdo->prepare("INSERT INTO admin_users (username, password, role) VALUES (:username, :password, :role)");
$stmt->execute([
    'username' => $username,
    'password' => $hashed_password,
    'role' => $role
]);

echo "Admin user created successfully! Username: $username, Password: $password";

// IMPORTANT: Delete this file after running it once for security reasons.
?>
