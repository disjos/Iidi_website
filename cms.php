<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
require_once __DIR__ . '/../includes/db.php';

// Fetch all pages
$stmt = $pdo->query("SELECT id, title FROM pages ORDER BY id DESC");
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Manage Pages</h1>
      <a href="cms/cms_create.php" class="btn btn-success mb-3">+ Create New Page</a>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Page Title</th>
                <th style="width: 150px">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($pages): ?>
                <?php foreach ($pages as $index => $page): ?>
                  <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($page['title']) ?></td>
                    <td>
                      <a href="cms/cms_edit.php?id=<?= $page['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                      <a href="cms/cms_delete.php?id=<?= $page['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this page?')">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="3" class="text-center">No pages found.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php require_once 'includes/footer.php'; ?>
