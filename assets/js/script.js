// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const navbarToggle = document.querySelector('.navbar-toggle');
    const navbarMenu = document.querySelector('.navbar-menu');
    
    if (navbarToggle) {
        navbarToggle.addEventListener('click', function() {
            navbarMenu.classList.toggle('active');
        });
    }
    
    // Search functionality
    const searchBtn = document.getElementById('search-btn');
    const searchInput = document.getElementById('search-input');
    
    if (searchBtn && searchInput) {
        searchBtn.addEventListener('click', function() {
            const query = searchInput.value.trim();
            if (query) {
                window.location.href = `/pages/vendors.php?search=${encodeURIComponent(query)}`;
            }
        });
        
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchBtn.click();
            }
        });
    }
    
    // Filter functionality
    const filterBtn = document.getElementById('filter-btn');
    const citySelect = document.getElementById('city-select');
    const categorySelect = document.getElementById('category-select');
    
    if (filterBtn) {
        filterBtn.addEventListener('click', function() {
            const city = citySelect.value;
            const category = categorySelect.value;
            let url = '/pages/vendors.php?';
            if (city) url += `city=${city}&`;
            if (category) url += `category=${category}&`;
            window.location.href = url.slice(0, -1);
        });
    }
    
    // Load featured vendors
    loadFeaturedVendors();
});

function loadFeaturedVendors() {
    fetch('/api/vendors.php?limit=6')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('featured-vendors');
            if (container && data.length > 0) {
                container.innerHTML = data.map(vendor => `
                    <div class="vendor-card">
                        <img src="${vendor.image || '/assets/images/placeholder.jpg'}" alt="${vendor.name}">
                        <div class="content">
                            <h3>${vendor.name}</h3>
                            <p class="city">${vendor.city}</p>
                            <div class="rating">${getRatingStars(vendor.rating)}</div>
                            <p class="price">${formatPrice(vendor.price)}</p>
                            <a href="/vendor/${vendor.slug}" class="btn">View Profile</a>
                        </div>
                    </div>
                `).join('');
            }
        })
        .catch(error => console.error('Error loading vendors:', error));
}

function getRatingStars(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= rating) {
            stars += '<i class="fas fa-star"></i>';
        } else if (i - 0.5 <= rating) {
            stars += '<i class="fas fa-star-half-alt"></i>';
        } else {
            stars += '<i class="far fa-star"></i>';
        }
    }
    return stars;
}

function formatPrice(price) {
    return '₹' + price.toLocaleString();
}