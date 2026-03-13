<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

include '../config/database.php';
include '../classes/Blog.php';
include '../includes/functions.php';

$blog = new Blog();
$id = intval($_GET['id']);
$blogData = $blog->getBlogById($id); // Need to add this method

if (!$blogData) {
    header('Location: manage-blog.php');
    exit;
}

if (isset($_POST['update_blog'])) {
    $data = [
        'title' => sanitize($_POST['title']),
        'content' => sanitize($_POST['content']),
        'image' => sanitize($_POST['image']),
        'slug' => createSlug($_POST['title'])
    ];
    
    if ($blog->updateBlog($id, $data)) {
        $success = "Blog post updated successfully";
        $blogData = $blog->getBlogById($id);
    } else {
        $error = "Failed to update blog post";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post - Admin</title>
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
            <h1>Edit Blog Post</h1>
            
            <?php if (isset($success)): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" class="admin-form">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $blogData['title']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" rows="10" required><?php echo $blogData['content']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Image URL</label>
                    <input type="url" name="image" value="<?php echo $blogData['image']; ?>">
                </div>
                <button type="submit" name="update_blog" class="btn">Update Blog Post</button>
            </form>
        </main>
    </div>
</body>
</html>