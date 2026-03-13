<?php
include '../includes/header.php';
include '../includes/navbar.php';
include '../classes/Gallery.php';

$gallery = new Gallery();
$images = $gallery->getAllImages();

getMetaTags('Wedding Gallery', 'Beautiful wedding inspiration photos and gallery');
?>

<section class="page-header">
    <div class="container">
        <h1>Wedding Gallery</h1>
        <p>Get inspired by beautiful wedding moments</p>
    </div>
</section>

<section class="gallery-section">
    <div class="container">
        <div class="gallery-grid">
            <?php if (count($images) > 0): ?>
                <?php foreach ($images as $image): ?>
                    <div class="gallery-item">
                        <img src="<?php echo $image['image']; ?>" alt="<?php echo $image['title']; ?>">
                        <div class="overlay">
                            <h3><?php echo $image['title']; ?></h3>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="gallery-item">
                    <img src="/assets/images/gallery/placeholder1.jpg" alt="Wedding Inspiration">
                </div>
                <div class="gallery-item">
                    <img src="/assets/images/gallery/placeholder2.jpg" alt="Wedding Inspiration">
                </div>
                <!-- Add more placeholder images -->
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>