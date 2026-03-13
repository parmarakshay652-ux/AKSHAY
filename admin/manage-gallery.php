<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

include '../config/database.php';
include '../classes/Gallery.php';

$gallery = new Gallery();
$images = $gallery->getAllImages();

if (isset($_POST['add_image'])) {
    $data = [
        'title' => sanitize($_POST['title']),
        'image' => sanitize($_POST['image']),
        'category' => sanitize($_POST['category'])
    ];
    
    if ($gallery->addImage($data)) {
        header('Location: manage-gallery.php?added=1');
        exit;
    }
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($gallery->deleteImage($id)) {
        header('Location: manage-gallery.php?deleted=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery - Admin</title>
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
            <h1>Manage Gallery</h1>
            
            <?php if (isset($_GET['added'])): ?>
                <div class="success">Image added successfully</div>
            <?php endif; ?>
            <?php if (isset($_GET['deleted'])): ?>
                <div class="success">Image deleted successfully</div>
            <?php endif; ?>
            
            <div class="add-form">
                <h2>Add New Image</h2>
                <form method="POST">
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Image Title" required>
                    </div>
                    <div class="form-group">
                        <input type="url" name="image" placeholder="Image URL" required>
                    </div>
                    <div class="form-group">
                        <select name="category">
                            <option value="wedding">Wedding</option>
                            <option value="engagement">Engagement</option>
                            <option value="portrait">Portrait</option>
                        </select>
                    </div>
                    <button type="submit" name="add_image" class="btn">Add Image</button>
                </form>
            </div>
            
            <div class="gallery-grid">
                <?php foreach ($images as $image): ?>
                    <div class="gallery-item-admin">
                        <img src="<?php echo $image['image']; ?>" alt="<?php echo $image['title']; ?>">
                        <div class="actions">
                            <a href="?delete=<?php echo $image['id']; ?>" class="btn-small delete" onclick="return confirm('Are you sure?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</body>
</html>