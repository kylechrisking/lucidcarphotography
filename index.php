<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucid Car Photography - Professional Automotive Photography</title>
    <link rel="icon" type="image/png" href="/images/logo.jpg">
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <!-- Loading Overlay -->
    <div id="loading-overlay">
        <div class="tire-loader">
            <div class="smoke-container">
                <div class="smoke smoke1"></div>
                <div class="smoke smoke2"></div>
                <div class="smoke smoke3"></div>
            </div>
            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Tire outer -->
                <circle cx="50" cy="50" r="44" stroke="#222" stroke-width="12" fill="#222"/>
                <!-- Tire treads -->
                <g stroke="#444" stroke-width="4">
                    <line x1="50" y1="10" x2="50" y2="30"/>
                    <line x1="50" y1="70" x2="50" y2="90"/>
                    <line x1="10" y1="50" x2="30" y2="50"/>
                    <line x1="70" y1="50" x2="90" y2="50"/>
                    <line x1="25" y1="25" x2="38" y2="38"/>
                    <line x1="62" y1="62" x2="75" y2="75"/>
                    <line x1="25" y1="75" x2="38" y2="62"/>
                    <line x1="62" y1="38" x2="75" y2="25"/>
                </g>
                <!-- Tire sidewall -->
                <circle cx="50" cy="50" r="30" stroke="#888" stroke-width="8" fill="#222"/>
                <!-- Tire center -->
                <circle cx="50" cy="50" r="14" fill="#bbb" stroke="#888" stroke-width="3"/>
                <circle cx="50" cy="50" r="7" fill="#eee"/>
            </svg>
            <div class="tire-shadow"></div>
        </div>
    </div>
    <?php include 'includes/header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h1>Lucid Car Photography</h1>
                <p>Capturing the essence and beauty of automotive excellence</p>
                <a href="gallery.php" class="cta-button pulse">View Gallery</a>
            </div>
        </section>
        <!-- Featured Work -->
        <section class="featured-work">
            <h2>Featured Work</h2>
            <div class="gallery-grid">
                <!-- PHP will dynamically load featured images here -->
                <?php include 'includes/featured-images.php'; ?>
            </div>
        </section>
        <!-- Services Preview -->
        <section class="services-preview">
            <h2>Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <i class="fas fa-camera"></i>
                    <h3>Professional Photography</h3>
                    <p>High-quality automotive photography for private collectors and dealerships</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-video"></i>
                    <h3>Videography</h3>
                    <p>Dynamic video content showcasing your vehicle in motion</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-calendar"></i>
                    <h3>Events Coverage</h3>
                    <p>Professional coverage for car shows and automotive events</p>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    
    <script src="js/main.js"></script>
</body>
</html> 