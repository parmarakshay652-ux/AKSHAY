<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

include '../config/database.php';
include '../classes/Vendor.php';
include '../includes/functions.php';

$vendor = new Vendor();

if (isset($_POST['add_vendor'])) {
    $data = [
        'name' => sanitize($_POST['name']),
        'category' => sanitize($_POST['category']),
        'city' => sanitize($_POST['city']),
        'price' => floatval($_POST['price']),
        'rating' => floatval($_POST['rating']),
        'description' => sanitize($_POST['description']),
        'image' => sanitize($_POST['image']),
        'slug' => createSlug($_POST['name'])
    ];
    
    if ($vendor->addVendor($data)) {
        $success = "Vendor added successfully";
    } else {
        $error = "Failed to add vendor";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vendor - Admin</title>
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
            <h1>Add New Vendor</h1>
            
            <?php if (isset($success)): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" class="admin-form">
                <div class="form-group">
                    <label>Vendor Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" required>
                        <option value="photographer">Photographer</option>
                        <option value="makeup-artist">Makeup Artist</option>
                        <option value="wedding-planner">Wedding Planner</option>
                        <option value="venue">Venue</option>
                        <option value="decorator">Decorator</option>
                        <option value="mehndi-artist">Mehndi Artist</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" required>
                </div>
                <div class="form-group">
                    <label>Price (₹)</label>
                    <input type="number" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label>Rating (1-5)</label>
                    <input type="number" name="rating" min="1" max="5" step="0.1" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label>Image URL</label>
                    <input type="url" name="image">
                </div>
                <button type="submit" name="add_vendor" class="btn">Add Vendor</button>
            </form>
        </main>
    </div>
</body>
</html>