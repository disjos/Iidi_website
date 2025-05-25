<?php
ob_start();
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
require_once '../includes/db.php';

$upload_dir = 'media/uploads/';
$upload_path = __DIR__ . '/media/uploads/';

// Create directory if not exists
if (!file_exists($upload_path)) {
    mkdir($upload_path, 0777, true);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media_file'])) {
    $file = $_FILES['media_file'];
    $filename = basename($file['name']);
    $filetype = pathinfo($filename, PATHINFO_EXTENSION);
    $new_filename = uniqid() . '.' . $filetype;
    $destination = $upload_path . $new_filename;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $stmt = $pdo->prepare("INSERT INTO media_files (filename, filepath, filetype) VALUES (?, ?, ?)");
        $stmt->execute([$filename, $upload_dir . $new_filename, $filetype]);
        header("Location: media.php?success=1");
        exit;
    } else {
        echo "Upload failed!";
    }
}

// Handle file deletion
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $stmt = $pdo->prepare("SELECT filepath FROM media_files WHERE id = ?");
    $stmt->execute([$id]);
    $file = $stmt->fetch();

    if ($file) {
        $fullPath = __DIR__ . '/' . $file['filepath'];
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }

        $pdo->prepare("DELETE FROM media_files WHERE id = ?")->execute([$id]);
    }

    header("Location: media.php?deleted=1");
    exit;
}

// Fetch all media
$media = $pdo->query("SELECT * FROM media_files ORDER BY uploaded_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Media Manager</title>
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <style>
        .media-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
            text-align: center;
        }
        .media-box img {
            max-width: 100%;
            height: 150px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper p-3">
        <h2>Media Manager</h2>

        <form action="" method="POST" enctype="multipart/form-data" class="mb-3">
            <div class="form-group">
                <label>Select a file</label>
                <input type="file" name="media_file" required class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <div class="row">
            <?php foreach ($media as $file): ?>
                <div class="col-md-3 media-box">
                    <?php if (in_array(strtolower($file['filetype']), ['jpg', 'jpeg', 'png', 'gif'])): ?>
                        <img src="<?= $file['filepath'] ?>" alt="<?= htmlspecialchars($file['filename']) ?>">
                    <?php else: ?>
                        <i class="fas fa-file-alt fa-5x my-3"></i>
                        <p><?= htmlspecialchars($file['filename']) ?></p>
                    <?php endif; ?>
                    <a class="btn btn-sm btn-success mb-1" href="<?= $file['filepath'] ?>" target="_blank">View</a>
                    <a class="btn btn-sm btn-danger mb-1" href="media.php?delete=<?= $file['id'] ?>" onclick="return confirm('Delete this file?')">Delete</a>
                    <button class="btn btn-sm btn-secondary mb-1" onclick="copyFileToCMSById(<?= $file['id'] ?>)">Copy to CMS</button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
function copyFileToCMSById(fileId) {
    if (window.opener && window.opener.receiveFileFromMediaManager) {
        window.opener.receiveFileFromMediaManager(fileId);
        window.close();
    } else {
        alert("CMS editor not detected.");
    }
}
</script>
</body>
</html>

<?php 
ob_end_flush();
require_once 'includes/footer.php'; ?>

