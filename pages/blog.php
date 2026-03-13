<?php
include '../includes/header.php';
include '../includes/navbar.php';
include '../classes/Blog.php';

$blog = new Blog();
$posts = $blog->getAllBlogs();

getMetaTags('Wedding Blog', 'Latest wedding planning tips, trends, and advice');
?>

<section class="page-header">
    <div class="container">
        <h1>Wedding Blog</h1>
        <p>Latest tips, trends, and wedding planning advice</p>
    </div>
</section>

<section class="blog-section">
    <div class="container">
        <div class="blog-grid">
            <?php if (count($posts) > 0): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="blog-card">
                        <img src="<?php echo $post['image'] ?: '/assets/images/blogs/placeholder.jpg'; ?>" alt="<?php echo $post['title']; ?>">
                        <div class="content">
                            <h3><?php echo $post['title']; ?></h3>
                            <p><?php echo truncateText($post['content'], 150); ?></p>
                            <a href="/blog/<?php echo $post['slug']; ?>" class="btn">Read More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="blog-card">
                    <img src="/assets/images/blogs/placeholder.jpg" alt="Blog Post">
                    <div class="content">
                        <h3>Wedding Planning Tips</h3>
                        <p>Essential tips for planning your dream wedding...</p>
                        <a href="/pages/blog-details.php?id=1" class="btn">Read More</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>