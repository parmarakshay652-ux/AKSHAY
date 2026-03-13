<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

include '../config/database.php';
include '../classes/Vendor.php';

$vendor = new Vendor();
$vendors = $vendor->getAllVendors();

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($vendor->deleteVendor($id)) {
        header('Location: manage-vendors.php?deleted=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vendors - Admin</title>
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
                <h1>Manage Vendors</h1>
                <a href="add-vendor.php" class="btn">Add New Vendor</a>
            </div>
            
            <?php if (isset($_GET['deleted'])): ?>
                <div class="success">Vendor deleted successfully</div>
            <?php endif; ?>
            
            <div class="data-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>City</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vendors as $v): ?>
                            <tr>
                                <td><?php echo $v['id']; ?></td>
                                <td><?php echo $v['name']; ?></td>
                                <td><?php echo $v['category']; ?></td>
                                <td><?php echo $v['city']; ?></td>
                                <td><?php echo $v['rating']; ?></td>
                                <td>
                                    <a href="edit-vendor.php?id=<?php echo $v['id']; ?>" class="btn-small">Edit</a>
                                    <a href="?delete=<?php echo $v['id']; ?>" class="btn-small delete" onclick="return confirm('Are you sure?')">Delete</a>
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