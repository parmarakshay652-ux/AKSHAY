<?php
include '../includes/header.php';
include '../includes/navbar.php';

getMetaTags('Real Wedding Stories', 'Get inspired by beautiful real wedding stories and photos');
?>

<section class="page-header">
    <div class="container">
        <h1>Real Wedding Stories</h1>
        <p>Get inspired by beautiful weddings</p>
    </div>
</section>

<section class="weddings-section">
    <div class="container">
        <div class="weddings-grid">
            <div class="wedding-card">
                <img src="/assets/images/weddings/wedding1.jpg" alt="Wedding Story">
                <div class="content">
                    <h3>Romantic Beach Wedding</h3>
                    <p>A beautiful destination wedding at Goa beach with stunning sunset views.</p>
                    <a href="/pages/wedding-story.php?id=1" class="btn">Read Story</a>
                </div>
            </div>
            <div class="wedding-card">
                <img src="/assets/images/weddings/wedding2.jpg" alt="Wedding Story">
                <div class="content">
                    <h3>Garden Ceremony</h3>
                    <p>An elegant garden wedding with floral decorations and intimate ceremony.</p>
                    <a href="/pages/wedding-story.php?id=2" class="btn">Read Story</a>
                </div>
            </div>
            <!-- Add more wedding stories -->
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>