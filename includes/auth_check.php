<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /IIDI-web/admin/auth/login.php');
    exit;
}
