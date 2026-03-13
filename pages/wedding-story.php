<?php
include '../includes/header.php';
include '../includes/navbar.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Mock data - in real app, fetch from database
$stories = [
    1 => [
        'title' => 'Romantic Beach Wedding',
        'content' => 'Our beach wedding was everything we dreamed of...',
        'images' => ['/assets/images/weddings/wedding1.jpg']
    ],
    2 => [
        'title' => 'Garden Ceremony',
        'content' => 'The garden setting made our wedding magical...',
        'images' => ['/assets/images/weddings/wedding2.jpg']
    ]
];

$story = isset($stories[$id]) ? $stories[$id] : $stories[1];

getMetaTags($story['title'], 'Beautiful wedding story and inspiration');
?>

<section class="page-header">
    <div class="container">
        <h1><?php echo $story['title']; ?></h1>
    </div>
</section>

<section class="story-section">
    <div class="container">
        <div class="story-content">
            <div class="story-images">
                <?php foreach ($story['images'] as $image): ?>
                    <img src="<?php echo $image; ?>" alt="Wedding Photo">
                <?php endforeach; ?>
            </div>
            <div class="story-text">
                <p><?php echo nl2br($story['content']); ?></p>
            </div>
        </div>
        <a href="/pages/real-weddings.php" class="btn">Back to Stories</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>