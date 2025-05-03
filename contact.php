<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Lucid Car Photography</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="contact-page">
        <div class="contact-container">
            <h1><i class="fas fa-car" style="color:#ff4d4d;margin-right:0.5rem;"></i>Contact Us</h1>
            <p>Get in touch for professional automotive photography services</p>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = strip_tags(trim($_POST["name"]));
                $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
                $message = strip_tags(trim($_POST["message"]));
                $service = strip_tags(trim($_POST["service"]));

                // Basic validation
                if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<p class='error-message'>Please fill all the fields correctly.</p>";
                } else {
                    // Email headers
                    $to = "info@lucidcarphotography.com"; // Replace with your email
                    $subject = "New Contact Form Submission";
                    $email_content = "Name: $name\n";
                    $email_content .= "Email: $email\n\n";
                    $email_content .= "Service: $service\n\n";
                    $email_content .= "Message:\n$message\n";

                    $headers = "From: $name <$email>";

                    // Send email
                    if (mail($to, $subject, $email_content, $headers)) {
                        echo "<p class='success-message'>Thank you! Your message has been sent.</p>";
                    } else {
                        echo "<p class='error-message'>Oops! Something went wrong, please try again later.</p>";
                    }
                }
            }
            ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="contact-form">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="service">Service Interest:</label>
                    <select id="service" name="service" required>
                        <option value="">Select a Service</option>
                        <option value="car-photoshoot">Car Photoshoot</option>
                        <option value="event-coverage">Event Coverage</option>
                        <option value="videography">Videography</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="submit-button pulse">Send Message</button>
            </form>

            <!-- Testimonials Section -->
            <section class="testimonials" style="margin-top:2.5rem;">
                <h2 style="font-size:1.3rem; color:#ff4d4d; font-family:'Montserrat',Arial,sans-serif; margin-bottom:1rem;"><i class="fas fa-quote-left"></i> What Our Clients Say</h2>
                <div style="display:flex; flex-wrap:wrap; gap:1.5rem;">
                    <blockquote style="background:#222; color:#fff; border-left:4px solid #ff4d4d; padding:1rem 1.5rem; border-radius:8px; max-width:320px; font-size:1rem;">
                        "Lucid captured my car in a way I never thought possible. The photos are stunning!"<br><span style="color:#ff4d4d; font-weight:700;">– Alex R.</span>
                    </blockquote>
                    <blockquote style="background:#222; color:#fff; border-left:4px solid #ff4d4d; padding:1rem 1.5rem; border-radius:8px; max-width:320px; font-size:1rem;">
                        "Professional, creative, and easy to work with. Highly recommend for any event!"<br><span style="color:#ff4d4d; font-weight:700;">– Jamie S.</span>
                    </blockquote>
                </div>
                <div style="margin-top:1.5rem; display:flex; gap:2rem; align-items:center;">
                    <img src="images/logo.jpg" alt="Client Brand" style="height:40px; border-radius:6px; background:#fff; padding:2px;">
                    <img src="images/intro.png" alt="Client Brand" style="height:40px; border-radius:6px; background:#fff; padding:2px;">
                </div>
            </section>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    
    <script src="js/main.js"></script>
</body>
</html> 