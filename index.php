<?php
include 'navbar.php'; 
?>
    <!-- Main Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>"Every dog deserves a home, <br>and every home deserves a <br> dog"</h1>
            <a href="aboutus.php" class="btn">LEARN MORE</a>
        </div>
    </section>

    <div class="container">
        <div class="content">
            <img src="Images/GR.png" alt="Pug" class="pug-image">
            <div class="text-section">
                <h2>Why Choose Us?</h2>
                <div class="features">
                    <div class="feature">
                        <div class="icon">💡</div>
                        <h3> Save a Life</h3>
                        <p>Millions of dogs are in shelters waiting for homes. By adopting, you're giving a deserving dog a second chance at life and potentially saving it from euthanasia.</p>
                    </div>
                    <div class="feature">
                        <div class="icon">🤝</div>
                        <h3>Unconditional Love and Companionship</h3>
                        <p>Dogs are incredibly loyal and loving companions. They can provide emotional support, reduce loneliness, and bring joy to your everyday life.</p>
                    </div>
                    <div class="feature">
                        <div class="icon">🚑</div>
                        <h3>Support Ethical Practices</h3>
                        <p>Adoption helps reduce the demand for unethical puppy mills and backyard breeders, which often prioritize profit over the well-being of animals.</p>
                    </div>
                    <div class="feature">
                        <div class="icon">🐾</div>
                        <h3>Improved Mental and Physical Health</h3>
                        <p>Studies show that spending time with dogs can reduce stress, anxiety, and depression while improving overall happiness.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <section class="booked-section">
        <h2>Frequently Listed</h2>
        <?php include 'viewdog.php'; ?>
        </div>
    </section>
    <!-- Add other sections as needed -->


<!--Footer-Section-->
  <?php 
  include 'footer.php'; 
  ?>