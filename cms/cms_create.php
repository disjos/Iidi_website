<?php
ob_start();
// Show PHP errors (for development only)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include DB and layout files
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (!empty($title) && !empty($content)) {
        // Generate slug from title
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

        // Prepare and execute insert query including slug and timestamps
        $stmt = $pdo->prepare("INSERT INTO pages (title, slug, content, created_at, updated_at) VALUES (:title, :slug, :content, NOW(), NOW())");
        $stmt->execute([
            ':title' => $title,
            ':slug' => $slug,
            ':content' => $content
        ]);

        // Redirect back to cms.php after successful insert
        header("Location: ../cms.php?success=1");
        exit;
    } else {
        $error = "Both fields are required.";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Create New Page</h1>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Page Title</label>
                            <input type="text" name="title" id="title" class="form-control" required value="<?= isset($title) ? htmlspecialchars($title) : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="content">Page Content</label>
                            <textarea name="content" id="content" rows="10" class="form-control" required><?= isset($content) ? htmlspecialchars($content) : '' ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Create Page</button>
                        <a href="../cms.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php 
ob_end_flush();
require_once __DIR__ . '/../includes/footer.php'; 
?>
