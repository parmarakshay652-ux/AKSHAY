<?php
include '../includes/header.php';
include '../includes/navbar.php';
include '../classes/Vendor.php';
include '../includes/functions.php';

$vendor = new Vendor();
$slug = isset($_GET['slug']) ? sanitize($_GET['slug']) : '';
$vendorData = $vendor->getVendorBySlug($slug);

if (!$vendorData) {
    header('Location: /pages/vendors.php');
    exit;
}

getMetaTags($vendorData['name'], truncateText($vendorData['description'], 150), '', $vendorData['image']);
?>

<section class="page-header">
    <div class="container">
        <h1><?php echo $vendorData['name']; ?></h1>
        <p><?php echo $vendorData['category']; ?> in <?php echo $vendorData['city']; ?></p>
    </div>
</section>

<section class="vendor-details">
    <div class="container">
        <div class="vendor-content">
            <div class="vendor-image">
                <img src="<?php echo $vendorData['image'] ?: '/assets/images/placeholder.jpg'; ?>" alt="<?php echo $vendorData['name']; ?>">
            </div>
            <div class="vendor-info">
                <div class="rating"><?php echo getRatingStars($vendorData['rating']); ?></div>
                <p class="price"><?php echo formatPrice($vendorData['price']); ?></p>
                <div class="description">
                    <h3>About</h3>
                    <p><?php echo $vendorData['description']; ?></p>
                </div>
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p><strong>Category:</strong> <?php echo ucfirst(str_replace('-', ' ', $vendorData['category'])); ?></p>
                    <p><strong>City:</strong> <?php echo $vendorData['city']; ?></p>
                    <a href="/pages/contact.php?vendor=<?php echo $vendorData['id']; ?>" class="btn">Contact Vendor</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>