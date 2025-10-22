<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Vendors | FoodOrder Pro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-red: #d32f2f;
            --dark-red: #b71c1c;
            --light-red: #ff6659;
            --accent-red: #ff5252;
            --light-bg: #f9f5f5;
            --text-dark: #333;
            --text-light: #fff;
            --border-color: #e0e0e0;
            --card-shadow: 0 4px 12px rgba(211, 47, 47, 0.15);
        }

        body {
            background-color: var(--light-bg);
            color: var(--text-dark);
        }

        /* Header Styles */
        header {
            background: linear-gradient(to right, var(--dark-red), var(--primary-red));
            color: var(--text-light);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .logo i {
            font-size: 2rem;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        nav a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
            padding: 0.5rem 0;
            position: relative;
        }

        nav a.active:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: white;
        }

        nav a:hover {
            opacity: 0.8;
        }

        .user-actions {
            display: flex;
            gap: 1rem;
        }

        .user-actions button {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: var(--text-light);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .user-actions button:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            gap: 2rem;
        }

        .page-header h2 {
            font-size: 2rem;
            color: var(--dark-red);
            font-weight: 700;
        }

        .search-filter-container {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .search-bar {
            display: flex;
            flex: 1;
            min-width: 300px;
        }

        .search-bar input {
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 4px 0 0 4px;
            width: 100%;
            font-size: 1rem;
        }

        .search-bar button {
            background-color: var(--primary-red);
            color: var(--text-light);
            border: none;
            border-radius: 0 4px 4px 0;
            padding: 0 1.5rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-bar button:hover {
            background-color: var(--dark-red);
        }

        .filter-options {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            background: white;
            border: 1px solid var(--border-color);
            padding: 0.7rem 1.2rem;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-btn:hover, .filter-btn.active {
            background-color: var(--primary-red);
            color: white;
            border-color: var(--primary-red);
        }

        /* Square Restaurant Grid */
        .restaurant-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .restaurant-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            min-height: 400px;
        }

        .restaurant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .restaurant-image {
            height: 45%; /* Adjusted for square layout */
            background-color: var(--primary-red);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .restaurant-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .restaurant-image i {
            display: none;
        }

        .restaurant-status {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 0.3rem 0.7rem;
            border-radius: 4px;
            font-size: 0.8rem;
        }

        .status-open {
            background-color: #4CAF50;
            color: white;
        }

        .status-closed {
            background-color: #757575;
        }

        .restaurant-info {
            padding: 1.2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .restaurant-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-red);
        }

        .restaurant-category {
            color: var(--primary-red);
            font-weight: 500;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .restaurant-description {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.4;
            font-size: 0.9rem;
            flex-grow: 1;
        }

        .restaurant-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.2rem;
            font-size: 0.85rem;
        }

        .restaurant-stats span {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .restaurant-actions {
            display: flex;
        }

        .restaurant-actions .btn-primary {
            flex: 1;
            padding: 0.7rem;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            background-color: var(--primary-red);
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-size: 0.9rem;
        }

       

        .btn-primary:hover {
            background-color: var(--dark-red);
              color: white;
    text-decoration: none;

        }

        /* Footer */
        footer {
            background-color: #2c2c2c;
            color: white;
            padding: 2rem 1rem;
            margin-top: 3rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            color: var(--light-red);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--light-red);
        }

        .copyright {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #444;
            color: #aaa;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
            }

            nav ul {
                gap: 1rem;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .search-bar {
                min-width: 100%;
            }

            .restaurant-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .restaurant-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <i class="fas fa-utensils"></i>
                <h1>miu-talabat</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#" class="active">Vendors</a></li>
                    <li><a href="#">Deals</a></li>
                </ul>
            </nav>
            <div class="user-actions">
                <button><i class="fas fa-bell"></i></button>
                
            </div>
        </div>
    </header>

    <main class="container">
        <div class="page-header">
            <h2>Our Restaurant </h2>
            <div class="search-bar">
                <input type="text" placeholder="Search restaurants...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </div>

        <div class="search-filter-container">
            <div class="filter-options">
                <button class="filter-btn active">All</button>
                <button class="filter-btn">Desserts</button>
                <button class="filter-btn">oriental Food</button>
                <button class="filter-btn">Coffee</button>
                <button class="filter-btn">Beverages & Snacks</button>
                <button class="filter-btn">Fastfood</button>
            </div>
        </div>

        <div class="restaurant-grid">
            <!-- Restaurant 1 -->
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="images/cinnabon.png" alt="Cinnabon">
                    <div class="restaurant-status status-open">Open</div>
                </div>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">Cinnabon</h3>
                    <div class="restaurant-category">
                        <i class="fas fa-tag"></i> french, desserts
                    </div>
                    <p class="restaurant-description"> desserts and coffee.</p>
                    <div class="restaurant-stats">
                        <span><i class="fas fa-star"></i> 4.7 (342)</span>
                        <span><i class="fas fa-clock"></i> 25-35 min</span>
                        <span><i class="fas fa-dollar-sign"></i> $$</span>
                    </div>
                    <div class="restaurant-actions">
    <a href="./index.php?page=vendor&vendor=vendor_name" class="btn-primary">View Menu</a>
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

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>miu-talabat</h3>
                <p>Streamlining restaurant orders with reliable partners and efficient management tools.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Restaurants</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Menu Items</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Info</h3>
                <ul>
                    <li><i class="fas fa-phone"></i> 01003819669</li>
                    <li><i class="fas fa-envelope"></i> support@Miu-Talabat.com</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; 2025 miu-talabat. All rights reserved.
        </div>
    </footer>

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