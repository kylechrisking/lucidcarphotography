<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Lucid Car Photography</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="services-page">
        <div class="services-container">
            <h1>Our Services</h1>
            <p>Professional automotive photography services tailored to your needs</p>

            <div class="services-grid">
                <!-- Car Photography -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3>Car Photography</h3>
                    <p>Professional automotive photography for private collectors, dealerships, and enthusiasts. We capture your vehicle's best angles and details.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Exterior & Interior Shots</li>
                        <li><i class="fas fa-check"></i> Detail Photography</li>
                        <li><i class="fas fa-check"></i> Location Shoots</li>
                        <li><i class="fas fa-check"></i> Studio Sessions</li>
                    </ul>
                    <a href="contact.php?service=car-photoshoot" class="service-cta">Book Now</a>
                </div>

                <!-- Event Coverage -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Event Coverage</h3>
                    <p>Comprehensive coverage of automotive events, car shows, and meets. We capture the atmosphere and highlights of your event.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Car Shows</li>
                        <li><i class="fas fa-check"></i> Cars & Coffee Events</li>
                        <li><i class="fas fa-check"></i> Track Days</li>
                        <li><i class="fas fa-check"></i> Private Events</li>
                    </ul>
                    <a href="contact.php?service=event-coverage" class="service-cta">Book Now</a>
                </div>

                <!-- Videography -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3>Automotive Videography</h3>
                    <p>Dynamic video content showcasing your vehicle in motion. Perfect for social media, advertising, or personal collections.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Rolling Shots</li>
                        <li><i class="fas fa-check"></i> Cinematic Edits</li>
                        <li><i class="fas fa-check"></i> Aerial Footage</li>
                        <li><i class="fas fa-check"></i> Event Highlights</li>
                    </ul>
                    <a href="contact.php?service=videography" class="service-cta">Book Now</a>
                </div>
            </div>

            <!-- Pricing Section -->
            <section class="pricing-section">
                <h2>Pricing</h2>
                <p>We offer competitive rates for all our services. Contact us for a custom quote tailored to your needs.</p>
                <a href="contact.php" class="cta-button">Get a Quote</a>
            </section>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    
    <script src="js/main.js"></script>
</body>
</html> 