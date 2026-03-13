<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<section class="hero">
    <div class="hero-content">
        <h1>Plan Your Dream Wedding</h1>
        <p>Find the best wedding vendors for your special day</p>
        <div class="search-box">
            <input type="text" placeholder="Search vendors..." id="search-input">
            <button id="search-btn">Search</button>
        </div>
    </div>
</section>

<section class="search-section">
    <div class="container">
        <h2>Find Your Perfect Vendor</h2>
        <div class="search-filters">
            <select id="city-select">
                <option value="">Select City</option>
                <option value="mumbai">Mumbai</option>
                <option value="delhi">Delhi</option>
                <option value="bangalore">Bangalore</option>
            </select>
            <select id="category-select">
                <option value="">Select Category</option>
                <option value="photographer">Photographer</option>
                <option value="makeup-artist">Makeup Artist</option>
                <option value="wedding-planner">Wedding Planner</option>
            </select>
            <button id="filter-btn">Search</button>
        </div>
    </div>
</section>

<section class="categories">
    <div class="container">
        <h2>Wedding Categories</h2>
        <div class="category-grid">
            <div class="category-card">
                <i class="fas fa-camera"></i>
                <h3>Photographers</h3>
            </div>
            <div class="category-card">
                <i class="fas fa-brush"></i>
                <h3>Makeup Artists</h3>
            </div>
            <div class="category-card">
                <i class="fas fa-calendar-check"></i>
                <h3>Wedding Planners</h3>
            </div>
            <div class="category-card">
                <i class="fas fa-building"></i>
                <h3>Wedding Venues</h3>
            </div>
            <div class="category-card">
                <i class="fas fa-palette"></i>
                <h3>Decorators</h3>
            </div>
            <div class="category-card">
                <i class="fas fa-hand-sparkles"></i>
                <h3>Mehndi Artists</h3>
            </div>
        </div>
    </div>
</section>

<section class="featured-vendors">
    <div class="container">
        <h2>Featured Vendors</h2>
        <div class="vendor-grid" id="featured-vendors">
            <!-- Vendors will be loaded here -->
        </div>
    </div>
</section>

<section class="wedding-stories">
    <div class="container">
        <h2>Real Wedding Stories</h2>
        <div class="stories-grid">
            <div class="story-card">
                <img src="/assets/images/weddings/wedding1.jpg" alt="Wedding Story">
                <h3>Romantic Beach Wedding</h3>
                <p>A beautiful wedding at Goa beach...</p>
                <a href="/pages/wedding-story.php">Read More</a>
            </div>
        </div>
    </div>
</section>

<section class="gallery-preview">
    <div class="container">
        <h2>Inspiration Gallery</h2>
        <div class="gallery-grid">
            <img src="/assets/images/gallery/img1.jpg" alt="Wedding Inspiration">
            <img src="/assets/images/gallery/img2.jpg" alt="Wedding Inspiration">
            <img src="/assets/images/gallery/img3.jpg" alt="Wedding Inspiration">
        </div>
        <a href="/pages/gallery.php" class="btn">View More</a>
    </div>
</section>

<section class="blog-preview">
    <div class="container">
        <h2>Wedding Blog</h2>
        <div class="blog-grid">
            <div class="blog-card">
                <img src="/assets/images/blogs/blog1.jpg" alt="Blog Post">
                <h3>Wedding Planning Tips</h3>
                <p>Essential tips for planning your wedding...</p>
                <a href="/pages/blog-details.php">Read More</a>
            </div>
        </div>
        <a href="/pages/blog.php" class="btn">Read More Posts</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>