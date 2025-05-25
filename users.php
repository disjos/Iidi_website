<?php
require_once(__DIR__ . '/../includes/db.php');
include('includes/header.php');
include('includes/sidebar.php');

// Fetch all users
$stmt = $pdo->query("SELECT id, username, role FROM admin_users ORDER BY id ASC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>User Management</h1>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">

      <div class="mb-3">
        <a href="actions/add_user.php" class="btn btn-success">Add New User</a>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Admin Users</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
              <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <td>
                  <a href="actions/edit_user.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="actions/delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>

<?php include('includes/footer.php'); ?>
