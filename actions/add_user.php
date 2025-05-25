<?php
// Path fix: this file is in admin/actions/, so to reach includes we go two levels up
#require_once($_SERVER['DOCUMENT_ROOT'] . "/IIDI-web/admin/includes/auth_check.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/IIDI-web/includes/db.php");

// Initialize variables
$username = '';
$password = '';
$role = '';
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role = $_POST['role'] ?? '';

    if ($username === '') {
        $errors[] = "Username is required.";
    }
    if ($password === '') {
        $errors[] = "Password is required.";
    }
    if ($role === '') {
        $errors[] = "Role is required.";
    }

    if (empty($errors)) {
        // Check if username exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin_users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        if ($stmt->fetchColumn() > 0) {
            $errors[] = "Username already exists.";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO admin_users (username, password, role) VALUES (:username, :password, :role)");
            $inserted = $stmt->execute([
                'username' => $username,
                'password' => $passwordHash,
                'role' => $role,
            ]);
            if ($inserted) {
                $success = "User '$username' added successfully.";
                $username = $password = $role = '';
            } else {
                $errors[] = "Failed to add user. Please try again.";
            }
        }
    }
}
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/IIDI-web/admin/includes/header.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/IIDI-web/admin/includes/sidebar.php"); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Add New User</h1>
  </section>

  <section class="content">
    <div class="container-fluid">

      <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
          <ul>
            <?php foreach ($errors as $e): ?>
              <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
      <?php endif; ?>

      <form method="POST" action="/IIDI-web/admin/actions/add_user.php" class="needs-validation" novalidate>
        <div class="form-group">
          <label for="username">Username <span class="text-danger">*</span></label>
          <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" class="form-control" required />
          <div class="invalid-feedback">Please enter a username.</div>
        </div>

        <div class="form-group">
          <label for="password">Password <span class="text-danger">*</span></label>
          <input type="password" id="password" name="password" class="form-control" required />
          <div class="invalid-feedback">Please enter a password.</div>
        </div>

        <div class="form-group">
          <label for="role">Role <span class="text-danger">*</span></label>
          <select id="role" name="role" class="form-control" required>
            <option value="" disabled <?= $role === '' ? 'selected' : '' ?>>Select role</option>
            <option value="admin" <?= $role === 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="editor" <?= $role === 'editor' ? 'selected' : '' ?>>Editor</option>
            <option value="viewer" <?= $role === 'viewer' ? 'selected' : '' ?>>Viewer</option>
          </select>
          <div class="invalid-feedback">Please select a role.</div>
        </div>

        <button type="submit" class="btn btn-primary">Add User</button>
        <a href="/IIDI-web/admin/users.php" class="btn btn-secondary">Back to Users</a>
      </form>

    </div>
  </section>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/IIDI-web/admin/includes/footer.php"); ?>

<script>
(() => {
  'use strict';
  window.addEventListener('load', () => {
    const forms = document.getElementsByClassName('needs-validation');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
