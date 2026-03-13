# The Wedding House

A modern, responsive wedding vendor directory website built with PHP, MySQL, HTML5, CSS3, and JavaScript.

## Features

- **Responsive Design**: Mobile-first approach with luxury wedding theme
- **SEO Optimized**: Clean URLs, meta tags, sitemap, robots.txt
- **Admin Panel**: Complete CRUD operations for vendors, blog posts, and gallery
- **Vendor Search**: Filter by category, city, and search functionality
- **Real Wedding Stories**: Showcase beautiful wedding experiences
- **Blog System**: Wedding planning tips and advice
- **Gallery**: Wedding inspiration photos
- **Contact Forms**: Easy communication with vendors

## Technology Stack

- **Backend**: PHP 7+ (Core PHP)
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Styling**: Custom CSS with luxury color palette (Gold #C9A96A, Dark #1A1A1A, White #FFFFFF)
- **Fonts**: Playfair Display and Poppins

## Installation

1. **Clone or download** the project files to your web server root (e.g., `htdocs` for XAMPP)

2. **Database Setup**:
   - Create a new MySQL database named `wedding_house`
   - Import the `database.sql` file to create tables
   - Update database credentials in `config/database.php`

3. **Admin Setup**:
   - Access the admin panel at `/admin/login.php`
   - Default admin credentials: Create a user in the `users` table or modify the login logic

4. **File Permissions**:
   - Ensure `uploads/` directories have write permissions for file uploads

## Project Structure

```
the-wedding-house/
├── index.php                 # Homepage
├── .htaccess                 # URL rewriting rules
├── sitemap.xml              # SEO sitemap
├── robots.txt               # Search engine crawling rules
├── database.sql             # Database schema
├── config/
│   └── database.php         # Database connection
├── includes/
│   ├── header.php           # HTML head and opening tags
│   ├── navbar.php           # Navigation menu
│   ├── footer.php           # Footer and closing tags
│   ├── meta.php             # SEO meta tags
│   └── functions.php        # Utility functions
├── pages/
│   ├── vendors.php          # Vendor listing page
│   ├── vendor-details.php   # Individual vendor page
│   ├── real-weddings.php    # Wedding stories
│   ├── wedding-story.php    # Individual story
│   ├── gallery.php          # Photo gallery
│   ├── blog.php             # Blog listing
│   ├── blog-details.php     # Individual blog post
│   ├── about.php            # About page
│   └── contact.php          # Contact page
├── admin/
│   ├── login.php            # Admin login
│   ├── dashboard.php        # Admin dashboard
│   ├── add-vendor.php       # Add vendor form
│   ├── edit-vendor.php      # Edit vendor form
│   ├── manage-vendors.php   # Vendor management
│   ├── add-blog.php         # Add blog post
│   ├── manage-blog.php      # Blog management
│   ├── manage-gallery.php   # Gallery management
│   └── logout.php           # Admin logout
├── assets/
│   ├── css/
│   │   └── style.css        # Main stylesheet
│   ├── js/
│   │   └── script.js        # JavaScript functionality
│   └── images/              # Image assets
├── uploads/                 # User uploaded files
├── classes/                 # PHP classes
│   ├── Database.php         # Database class
│   ├── Vendor.php           # Vendor operations
│   ├── Blog.php             # Blog operations
│   └── Gallery.php          # Gallery operations
└── api/                     # API endpoints
    ├── search.php           # Search API
    ├── vendors.php          # Vendors API
    └── blog.php             # Blog API
```

## Key Features

### Homepage Sections
- Hero section with call-to-action
- Vendor search and filter
- Category showcase
- Featured vendors
- Real wedding stories preview
- Inspiration gallery
- Wedding blog preview

### Admin Panel
- Secure login system
- Dashboard with statistics
- CRUD operations for vendors, blogs, and gallery
- Image upload functionality

### SEO Features
- Clean URL structure (e.g., `/vendor/vendor-name`)
- Dynamic meta tags
- XML sitemap
- Robots.txt file
- Image alt tags

### Responsive Design
- Mobile-first approach
- Luxury wedding color scheme
- Elegant typography
- Smooth animations and transitions

## Usage

1. **Browse Vendors**: Use the search and filter options to find vendors
2. **View Details**: Click on vendors to see detailed profiles
3. **Read Stories**: Explore real wedding experiences
4. **Get Inspired**: Browse the gallery and blog for ideas
5. **Contact**: Use the contact form to get in touch

## Development

- **PHP Version**: 7.0 or higher
- **MySQL Version**: 5.6 or higher
- **Web Server**: Apache with mod_rewrite enabled
- **Browser Support**: Modern browsers (Chrome, Firefox, Safari, Edge)

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is open source and available under the MIT License.

## Support

For support or questions, please contact us through the website contact form.