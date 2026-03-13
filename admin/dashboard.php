<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

include '../config/database.php';
include '../classes/Vendor.php';
include '../classes/Blog.php';
include '../classes/Gallery.php';

$vendor = new Vendor();
$blog = new Blog();
$gallery = new Gallery();

$vendorCount = count($vendor->getAllVendors());
$blogCount = count($blog->getAllBlogs());
$galleryCount = count($gallery->getAllImages());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - The Wedding House</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="admin-container">
        <nav class="admin-nav">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage-vendors.php">Vendors</a></li>
                <li><a href="manage-blog.php">Blog</a></li>
                <li><a href="manage-gallery.php">Gallery</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        
        <main class="admin-main">
            <h1>Dashboard</h1>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <h3><?php echo $vendorCount; ?></h3>
                    <p>Total Vendors</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo $blogCount; ?></h3>
                    <p>Blog Posts</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo $galleryCount; ?></h3>
                    <p>Gallery Images</p>
                </div>
            </div>
            
            <div class="quick-actions">
                <a href="add-vendor.php" class="btn">Add Vendor</a>
                <a href="add-blog.php" class="btn">Add Blog Post</a>
                <a href="manage-gallery.php" class="btn">Manage Gallery</a>
            </div>
        </main>
    </div>
</body>
</html>