<!-- layout.php --><?php
$pageTitle = 'Home';
$pagekey = 'home';
include 'header.php'; ?>
<link rel="stylesheet" href="styles/layout.css">
<main class="container">
    <section class="hero" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('images/btatesandzalabya.jpg'); background-size: cover; background-position: center;">
        <div class="hero-content">
            <h2>Craving something delicious?</h2>
            <p>Get your favorite meals delivered fast to your room</p>
            <button class="hero-btn">Order Now</button>
        </div>
    </section>

    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Categories</h2>
            <a href="#" class="view-all">View All <i class="fas fa-chevron-right"></i></a>
        </div>
        
        <div class="categories-grid">
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-pizza-slice"></i>
                </div>
                <div class="category-name">Fast Food</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-ice-cream"></i>
                </div>
                <div class="category-name">Desserts</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-drumstick-bite"></i>
                </div>
                <div class="category-name">Chicken</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="category-name">Healthy</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-coffee"></i>
                </div>
                <div class="category-name">Cafés</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-bread-slice"></i>
                </div>
                <div class="category-name">Bakeries</div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Today's Hot Deals</h2>
            <a href="#" class="view-all">View All <i class="fas fa-chevron-right"></i></a>
        </div>
        
        <div class="hot-deals-section">
            <div class="deals-grid">
                <div class="deal-card">
                    <div class="deal-image">
                        <img src="images/oreo.webp" alt="Cinnabon Special">
                        <span class="deal-badge">40% OFF</span>
                    </div>
                    <div class="deal-content">
                        <h3 class="deal-title">Cinnabon Special</h3>
                        <p class="deal-description">Exclusive Cinnabon desserts and treats with amazing discounts</p>
                        <button class="deal-button">Grab Deal</button>
                    </div>
                </div>
                
                <div class="deal-card">
                    <div class="deal-image">
                        <img src="images/cinna.webp" alt="Cinnabon Delights">
                        <span class="deal-badge">30% OFF</span>
                    </div>
                    <div class="deal-content">
                        <h3 class="deal-title">Cinnabon Delights</h3>
                        <p class="deal-description">Freshly baked cinnamon rolls with irresistible offers</p>
                        <button class="deal-button">Grab Deal</button>
                    </div>
                </div>
                
                <div class="deal-card">
                    <div class="deal-image">
                        <img src="images/3rd.avif" alt="Tbs Exclusive">
                        <span class="deal-badge">25% OFF</span>
                    </div>
                    <div class="deal-content">
                        <h3 class="deal-title">Tbs Exclusive</h3>
                        <p class="deal-description">Sneak a peek at our unique Tbs specials and deals</p>
                        <button class="deal-button">Grab Deal</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>