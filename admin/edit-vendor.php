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
$id = intval($_GET['id']);
$vendorData = $vendor->getVendorById($id); // Need to add this method

if (!$vendorData) {
    header('Location: manage-vendors.php');
    exit;
}

if (isset($_POST['update_vendor'])) {
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
    
    if ($vendor->updateVendor($id, $data)) {
        $success = "Vendor updated successfully";
        $vendorData = $vendor->getVendorById($id);
    } else {
        $error = "Failed to update vendor";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vendor - Admin</title>
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
            <h1>Edit Vendor</h1>
            
            <?php if (isset($success)): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" class="admin-form">
                <div class="form-group">
                    <label>Vendor Name</label>
                    <input type="text" name="name" value="<?php echo $vendorData['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" required>
                        <option value="photographer" <?php echo $vendorData['category'] == 'photographer' ? 'selected' : ''; ?>>Photographer</option>
                        <option value="makeup-artist" <?php echo $vendorData['category'] == 'makeup-artist' ? 'selected' : ''; ?>>Makeup Artist</option>
                        <option value="wedding-planner" <?php echo $vendorData['category'] == 'wedding-planner' ? 'selected' : ''; ?>>Wedding Planner</option>
                        <option value="venue" <?php echo $vendorData['category'] == 'venue' ? 'selected' : ''; ?>>Venue</option>
                        <option value="decorator" <?php echo $vendorData['category'] == 'decorator' ? 'selected' : ''; ?>>Decorator</option>
                        <option value="mehndi-artist" <?php echo $vendorData['category'] == 'mehndi-artist' ? 'selected' : ''; ?>>Mehndi Artist</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" value="<?php echo $vendorData['city']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Price (₹)</label>
                    <input type="number" name="price" step="0.01" value="<?php echo $vendorData['price']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Rating (1-5)</label>
                    <input type="number" name="rating" min="1" max="5" step="0.1" value="<?php echo $vendorData['rating']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="5" required><?php echo $vendorData['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Image URL</label>
                    <input type="url" name="image" value="<?php echo $vendorData['image']; ?>">
                </div>
                <button type="submit" name="update_vendor" class="btn">Update Vendor</button>
            </form>
        </main>
    </div>
</body>
</html>