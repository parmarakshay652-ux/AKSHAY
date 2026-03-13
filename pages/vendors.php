<?php
include '../includes/header.php';
include '../includes/navbar.php';
include '../classes/Vendor.php';
include '../includes/functions.php';

$vendor = new Vendor();

// Get filters
$category = isset($_GET['category']) ? sanitize($_GET['category']) : '';
$city = isset($_GET['city']) ? sanitize($_GET['city']) : '';
$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';

// Get vendors based on filters
if ($search) {
    $vendors = $vendor->searchVendors($search);
} elseif ($category) {
    $vendors = $vendor->getVendorsByCategory($category);
} elseif ($city) {
    $vendors = $vendor->getVendorsByCity($city);
} else {
    $vendors = $vendor->getAllVendors();
}

getMetaTags('Wedding Vendors', 'Find the best wedding vendors in your city');
?>

<section class="page-header">
    <div class="container">
        <h1>Wedding Vendors</h1>
        <p>Discover the perfect vendors for your special day</p>
    </div>
</section>

<section class="vendors-section">
    <div class="container">
        <div class="filters">
            <form method="GET" class="filter-form">
                <select name="category">
                    <option value="">All Categories</option>
                    <option value="photographer" <?php echo $category == 'photographer' ? 'selected' : ''; ?>>Photographer</option>
                    <option value="makeup-artist" <?php echo $category == 'makeup-artist' ? 'selected' : ''; ?>>Makeup Artist</option>
                    <option value="wedding-planner" <?php echo $category == 'wedding-planner' ? 'selected' : ''; ?>>Wedding Planner</option>
                    <option value="venue" <?php echo $category == 'venue' ? 'selected' : ''; ?>>Venue</option>
                    <option value="decorator" <?php echo $category == 'decorator' ? 'selected' : ''; ?>>Decorator</option>
                    <option value="mehndi-artist" <?php echo $category == 'mehndi-artist' ? 'selected' : ''; ?>>Mehndi Artist</option>
                </select>
                <select name="city">
                    <option value="">All Cities</option>
                    <option value="mumbai" <?php echo $city == 'mumbai' ? 'selected' : ''; ?>>Mumbai</option>
                    <option value="delhi" <?php echo $city == 'delhi' ? 'selected' : ''; ?>>Delhi</option>
                    <option value="bangalore" <?php echo $city == 'bangalore' ? 'selected' : ''; ?>>Bangalore</option>
                </select>
                <button type="submit" class="btn">Filter</button>
            </form>
        </div>
        
        <div class="vendor-grid">
            <?php if (count($vendors) > 0): ?>
                <?php foreach ($vendors as $v): ?>
                    <div class="vendor-card">
                        <img src="<?php echo $v['image'] ?: '/assets/images/placeholder.jpg'; ?>" alt="<?php echo $v['name']; ?>">
                        <div class="content">
                            <h3><?php echo $v['name']; ?></h3>
                            <p class="city"><?php echo $v['city']; ?></p>
                            <div class="rating"><?php echo getRatingStars($v['rating']); ?></div>
                            <p class="price"><?php echo formatPrice($v['price']); ?></p>
                            <a href="/vendor/<?php echo $v['slug']; ?>" class="btn">View Profile</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No vendors found matching your criteria.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>