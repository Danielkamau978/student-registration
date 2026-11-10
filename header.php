<?php
require_once __DIR__ . '/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand-logo">🎓 School Manager</a>
            <nav class="nav-links">
                <a href="index.php">Register Student</a>
                <a href="view.php">Student List</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <?php display_flash_message(); ?>
