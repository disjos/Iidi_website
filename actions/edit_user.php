<?php
require_once('../../includes/config.php');
require_once('../../includes/db.php');  // This defines $pdo

#require_once('../includes/auth_check.php');

// Get user ID from URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid user ID.");
}

$user_id = (int)$_GET['id'];

// Fetch user data
$stmt = $pdo->prepare("SELECT * FROM admin_users WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch();

if (!$user) {
    die("User not found.");
}

// Handle update
$update_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];

    if ($password !== '') {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE admin_users SET username = :username, password = :password, role = :role WHERE id = :id");
        $stmt->execute([
            'username' => $username,
            'password' => $hashed_password,
            'role' => $role,
            'id' => $user_id
        ]);
    } else {
        $stmt = $pdo->prepare("UPDATE admin_users SET username = :username, role = :role WHERE id = :id");
        $stmt->execute([
            'username' => $username,
            'role' => $role,
            'id' => $user_id
        ]);
    }

    $update_message = "User updated successfully!";
    // Refresh user info
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE id = :id");
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch();
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit User</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php if ($update_message): ?>
                <div class="alert alert-success"><?= $update_message ?></div>
            <?php endif; ?>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Admin User</h3>
                </div>
                <form method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required value="<?= htmlspecialchars($user['username']) ?>">
                        </div>
                        <div class="form-group">
                            <label>New Password (leave blank to keep existing)</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="editor" <?= $user['role'] === 'editor' ? 'selected' : '' ?>>Editor</option>
                                <option value="viewer" <?= $user['role'] === 'viewer' ? 'selected' : '' ?>>Viewer</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update User</button>
                        <a href="../users.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php include('../includes/footer.php'); ?>
