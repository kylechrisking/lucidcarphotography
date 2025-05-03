# Lucid Car Photography Website

A modern, responsive website for Lucid Car Photography, showcasing automotive photography services and portfolio.

## Features

- Responsive design optimized for all devices
- Modern, dark theme with accent colors
- Image gallery with lightbox functionality
- Contact form with email integration
- Services showcase
- About page with company information
- Mobile-friendly navigation

## Requirements

- PHP 7.4 or higher
- Web server (Apache/Nginx)
- Mail server configuration for contact form

## Directory Structure

```
lucidcarphotography.com/
├── css/
│   └── style.css
├── js/
│   └── main.js
├── images/
│   ├── gallery/
│   └── about/
├── includes/
│   ├── header.php
│   └── footer.php
├── index.php
├── gallery.php
├── services.php
├── about.php
├── contact.php
└── README.md
```

## Setup Instructions

1. Clone the repository to your web server directory:
   ```bash
   git clone [repository-url]
   ```

2. Create the required directories:
   ```bash
   mkdir -p images/{gallery,about}
   ```

3. Set appropriate permissions:
   ```bash
   chmod 755 -R .
   chmod 777 -R images
   ```

4. Configure your web server to serve PHP files.

5. Update the contact form email in `contact.php` to your preferred email address.

6. Add your images to the `images/gallery` and `images/about` directories.

## Customization

### Colors
The website uses CSS variables for easy color customization. Edit the following in `css/style.css`:

```css
:root {
    --primary-color: #1a1a1a;
    --secondary-color: #333;
    --accent-color: #ff4d4d;
    --text-color: #ffffff;
}
```

### Content
- Update the content in each PHP file to match your needs
- Modify the services in `services.php`
- Update the about information in `about.php`
- Add your own images to the gallery

## Contact Form Setup

The contact form uses PHP's mail() function. To set it up:

1. Configure your server's mail settings
2. Update the recipient email in `contact.php`
3. Test the form to ensure emails are being sent correctly

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Credits

- Font Awesome for icons
- Lightbox2 for gallery functionality

## License

[Your chosen license] 