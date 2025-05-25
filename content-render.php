<?php
// content-render.php
// Purpose: Load and display CMS page content by slug

// Adjust this path if your config is elsewhere
include_once __DIR__ . '/../includes/config.php';

// Check $slug is set either externally or via GET parameter
if (!isset($slug)) {
    if (isset($_GET['slug'])) {
        $slug = $_GET['slug'];
    } else {
        // No slug defined, show error or fallback
        echo "<p>Error: Page slug not defined.</p>";
        exit;
    }
}

// Prepare and execute the query safely
$query = 'SELECT content FROM cms_pages WHERE slug = $1 LIMIT 1';
$result = pg_prepare($dbconn, "get_cms_content", $query);

if (!$result) {
    echo "<p>Database query preparation failed.</p>";
    exit;
}

$result = pg_execute($dbconn, "get_cms_content", array($slug));

if ($result && pg_num_rows($result) > 0) {
    $row = pg_fetch_assoc($result);
    // Output the stored HTML content directly
    echo $row['content'];
} else {
    // No content found for this slug
    echo "<p>Sorry, content not found for this page.</p>";
}
?>
