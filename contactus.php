<?php 
include 'navbar.php';
?>
    <div class="contact-container">
        <header class="contact-header">
            <h1>Contact Us</h1>
            <p>We’d love to hear from you! Feel free to reach out with any questions or to begin your adoption journey.</p>
        </header>
        <main class="contact-content">
            <div class="contact-info">
                <h2>Our Location</h2>
                <p><strong>Address:</strong>Putalisadak, Kathmandu</p>
                <p><strong>Email:</strong> contact@grihitahaven.com</p>
                <p><strong>Phone:</strong> 01-51234</p>
            </div>
            <div class="contact-form-section">
                <h2>Send Us a Message</h2>
                <form action="process_contact.php" method="POST" class="contact-form">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                    
                    <button type="submit" class="submit-button">Send Message</button>
                </form>
            </div>
        </main>
    </div>
<?php include 'footer.php'; ?>
