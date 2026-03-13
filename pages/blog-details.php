<?php
include '../includes/header.php';
include '../includes/navbar.php';
include '../classes/Blog.php';
include '../includes/functions.php';

$blog = new Blog();
$slug = isset($_GET['slug']) ? sanitize($_GET['slug']) : '';
$post = $blog->getBlogBySlug($slug);

if (!$post) {
    // Mock data for demo
    $post = [
        'title' => 'Wedding Planning Tips',
        'content' => 'Planning a wedding can be overwhelming, but with the right tips...',
        'image' => '/assets/images/blogs/placeholder.jpg'
    ];
}

getMetaTags($post['title'], truncateText($post['content'], 150), '', $post['image']);
?>

<section class="page-header">
    <div class="container">
        <h1><?php echo $post['title']; ?></h1>
    </div>
</section>

<section class="blog-details">
    <div class="container">
        <div class="blog-content">
            <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="featured-image">
            <div class="blog-text">
                <p><?php echo nl2br($post['content']); ?></p>
            </div>
        </div>
        <a href="/pages/blog.php" class="btn">Back to Blog</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>