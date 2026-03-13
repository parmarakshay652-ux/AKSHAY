<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

include '../config/database.php';
include '../classes/Blog.php';

$blog = new Blog();
$posts = $blog->getAllBlogs();

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($blog->deleteBlog($id)) {
        header('Location: manage-blog.php?deleted=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blog - Admin</title>
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
            <div class="header-actions">
                <h1>Manage Blog Posts</h1>
                <a href="add-blog.php" class="btn">Add New Post</a>
            </div>
            
            <?php if (isset($_GET['deleted'])): ?>
                <div class="success">Blog post deleted successfully</div>
            <?php endif; ?>
            
            <div class="data-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><?php echo $post['id']; ?></td>
                                <td><?php echo $post['title']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($post['created_at'])); ?></td>
                                <td>
                                    <a href="edit-blog.php?id=<?php echo $post['id']; ?>" class="btn-small">Edit</a>
                                    <a href="?delete=<?php echo $post['id']; ?>" class="btn-small delete" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>