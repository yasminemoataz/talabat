<?php 
$pageTitle = 'Vendors';
$pagekey = 'vendors';
include 'header.php'; ?>
<link rel="stylesheet" href="styles/vendors.css">

<main class="container">
    <div class="page-header">
        <h2>Our Restaurants</h2>
        <p>Explore delicious food from our partner restaurants</p>
    </div>

    <div class="search-filter-container">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search restaurants...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
        
        <div class="filter-options">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="fast-food">Fast Food</button>
            <button class="filter-btn" data-filter="pizza">Pizza</button>
            <button class="filter-btn" data-filter="chinese">Chinese</button>
        </div>
    </div>
    <div class="restaurants-grid">
        <!-- Restaurant cards remain the same but with consistent class names -->
        <div class="restaurant-card">
            <div class="restaurant-image">
                <img src="images/cinnabon.png" alt="Cinnabon">
                <span class="deal-badge">Open</span>
            </div>
            <div class="restaurant-info">
                <h3 class="restaurant-name">Cinnabon</h3>
                <div class="restaurant-category">
                    <i class="fas fa-tag"></i> French, Desserts
                </div>
                <p class="restaurant-description">Desserts and coffee.</p>
                <div class="restaurant-stats">
                    <span><i class="fas fa-star"></i> 4.7 (342)</span>
                    <span><i class="fas fa-clock"></i> 25-35 min</span>
                    <span><i class="fas fa-dollar-sign"></i> $$</span>
                </div>
                <div class="restaurant-actions">
                    <a href="./index.php?page=vendor&vendor=cinnabon" class="btn-primary">View Menu</a>
                </div>
            </div>
        </div>
            <!-- Restaurant 2 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/tbslogo.jpg" alt="TBS">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">TBS</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> french, Bakery   
                    </div>
                    <p class="restaurant-description">Bakery , salads , sandwiches and coffee.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.5 (287)</span>
                        <span><i class="fas fa-clock"></i> 30-40 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $$</span>
                    </div>
                   <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=vendor_name" class="btn-primary">View Menu</a>
</div>
                </div>
            </div>

            <!-- Restaurant 3 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/metro logo.png" alt="Metro">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">Metro</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> supermarket
                    </div>
                    <p class="restaurant-description">Beverages and snacks.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.3 (198)</span>
                        <span><i class="fas fa-clock"></i> 20-30 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $</span>
                    </div>
                   <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=vendor_name" class="btn-primary">View Menu</a>
</div>
                </div>
            </div>

            <!-- Restaurant 4 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/farghalylogo.png" alt="Farghaly">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">Farghaly</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> Egypt, cairo
                    </div>
                    <p class="restaurant-description">fresh juices and smoothies.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.6 (231)</span>
                        <span><i class="fas fa-clock"></i> 25-35 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $$</span>
                    </div>
                    <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=vendor_name" class="btn-primary">View Menu</a>
</div>
                </div>
            </div>

            <!-- Restaurant 5 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/Batates-Zalabya.jpeg" alt="batates & zalabya">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">batates & zalabya</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> desserts, fastfood
                    </div>
                    <p class="restaurant-description">zalabya, fries, burgers, hot dogs and desserts.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.8 (156)</span>
                        <span><i class="fas fa-clock"></i> 15-25 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $$</span>
                    </div>
                    <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=vendor_name" class="btn-primary">View Menu</a>
</div>
                </div>
            </div>

            <!-- Restaurant 6 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/conitta.jpg" alt="Conitta">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">Conitta</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> holland, desserts
                    </div>
                    <p class="restaurant-description">cookies, cakes, pastries, brownies and cookies.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.4 (189)</span>
                        <span><i class="fas fa-clock"></i> 30-45 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $$$</span>
                    </div>
                   <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=vendor_name" class="btn-primary">View Menu</a>
</div>
                </div>
            </div>

            <!-- Restaurant 7 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/mycorner.png" alt="My Corner">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">My Corner</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> Egyptian, oriental food
                    </div>
                    <p class="restaurant-description">flafels, beans, fries and crepes.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.9 (203)</span>
                        <span><i class="fas fa-clock"></i> 15-25 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $$</span>
                    </div>
                </div>
       <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=mycorner" class="btn-primary">View Menu</a>
</div>
            </div>

            <!-- Restaurant 8 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/R2go.png" alt="R2go">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">R2 Go</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> American, fastfood
                    </div>
                    <p class="restaurant-description">pizza, burgers, fries and chicken sandwiches.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.7 (278)</span>
                        <span><i class="fas fa-clock"></i> 35-45 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $$</span>
                    </div>
                  <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=vendor_name" class="btn-primary">View Menu</a>
</div>
                </div>
            </div>

            <!-- Restaurant 9 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/manoucheh.png" alt="Manoucheh">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">Manoucheh</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> syrian, manoucha
                    </div>
                    <p class="restaurant-description">shawarma and manoucha.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.8 (312)</span>
                        <span><i class="fas fa-clock"></i> 30-40 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $$$</span>
                    </div>
                   <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=vendor_name" class="btn-primary">View Menu</a>
</div>
                </div>
            </div>

            <!-- Restaurant 10 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/Gyro.jpg" alt="Gyro">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">Gyro</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> Greece, shawarma
                    </div>
                    <p class="restaurant-description">gyro, shawarma, chicken wings and salads.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.6 (194)</span>
                        <span><i class="fas fa-clock"></i> 10-20 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $</span>
                    </div>
                   <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=vendor_name" class="btn-primary">View Menu</a>
</div>
                </div>
            </div>
        </div>
    </main>
<?php include 'footer.php'; ?>

    <script>
        // Search functionality
        document.querySelector('.search-bar input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const restaurantCards = document.querySelectorAll('.restaurant-card');
            
            restaurantCards.forEach(card => {
                const restaurantName = card.querySelector('.restaurant-name').textContent.toLowerCase();
                const restaurantDescription = card.querySelector('.restaurant-description').textContent.toLowerCase();
                const restaurantCategory = card.querySelector('.restaurant-category').textContent.toLowerCase();
                
                if (restaurantName.includes(searchTerm) || 
                    restaurantDescription.includes(searchTerm) || 
                    restaurantCategory.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                const filter = this.textContent.toLowerCase();
                const restaurantCards = document.querySelectorAll('.restaurant-card');
                
                if (filter === 'all') {
                    restaurantCards.forEach(card => {
                        card.style.display = 'block';
                    });
                } else {
                    restaurantCards.forEach(card => {
                        const restaurantCategory = card.querySelector('.restaurant-category').textContent.toLowerCase();
                        if (restaurantCategory.includes(filter)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                }
            });
        });

        // Add hover effect to restaurant cards
        document.querySelectorAll('.restaurant-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>