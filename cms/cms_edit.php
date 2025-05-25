<?php
// Show errors (development only)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';

// Validate and fetch page ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>Invalid page ID.</div>";
    require_once __DIR__ . '/../includes/footer.php';
    exit;
}

$page_id = (int) $_GET['id'];

// Fetch page data
$stmt = $pdo->prepare("SELECT * FROM pages WHERE id = :id");
$stmt->execute([':id' => $page_id]);
$page = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$page) {
    echo "<div class='alert alert-danger'>Page not found.</div>";
    require_once __DIR__ . '/../includes/footer.php';
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (!empty($title) && !empty($content)) {
        $update = $pdo->prepare("UPDATE pages SET title = :title, content = :content WHERE id = :id");
        $update->execute([
            ':title' => $title,
            ':content' => $content,
            ':id' => $page_id
        ]);

        header("Location: ../cms.php");
        exit;
    } else {
        $error = "Both fields are required.";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Page</h1>
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
                            <input type="text" name="title" id="title" class="form-control" required value="<?= htmlspecialchars($page['title']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="content">Page Content</label>
                            <textarea name="content" id="content" class="form-control" rows="12" required><?= htmlspecialchars($page['content']) ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update Page</button>
                        <a href="../cms.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<!-- Load TinyMCE from local files -->
<script src="../assets/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: 'textarea#content',
    height: 600,
    menubar: true,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount emoticons',
        'wordcount',
    ],
    toolbar1: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | removeformat | help',
    toolbar2: 'link unlink anchor | image media | table | charmap emoticons | code fullscreen preview print',
    toolbar_mode: 'floating',
    image_advtab: true,
    relative_urls: false,
    remove_script_host: false,
    document_base_url: '/',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tiny.cloud/css/codepen.min.css'
    ],
    setup: function (editor) {
        editor.on('init', function () {
            console.log('TinyMCE initialized with full toolbar');
        });
    }
});
</script>


<?php require_once __DIR__ . '/../includes/footer.php'; ?>
