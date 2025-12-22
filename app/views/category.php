<?php
// Define data for all categories with restaurant details
$categories = [
    
        
    
    'desserts' => [
        'title' => 'Desserts',
        'icon' => 'fas fa-ice-cream',
        'description' => 'Sweet treats and delicious desserts',
        'bg_color' => '#ff6b8b',
        'restaurants' => [
           [ 'name' => 'Conitta', 
           'image' => 'images/conitta.jpg', 
           'rating' => 4.7, 
           'preparation_time' => '20-30 min', 
           'cuisine' => 'Ice Cream & Desserts',
            'price_range' => '$$'
         ],
            [ 'name' => 'cinnabon', 
            'image' => 'images/cinnabon.png',
             'rating' => 4.8, 
             'preparation_time' => '25-35 min',
              'cuisine' => 'cinnamon rolls & desserts', 
              'price_range' => '$$$' 
            ],
            [ 'name' => 'btates and zalabya', 
            'image' => 'images/btatesandzalabya.jpg',
             'rating' => 4.8,
              'preparation_time' => '25-35 min',
               'cuisine' => 'zalabya & desserts',
                'price_range' => '$$$' ]
        ]
    ],
    'chicken' => [
         'title' => 'Crispy chicken',
          'icon' => 'fas fa-drumstick-bite',
           'description' => 'Crispy, grilled, and roasted chicken',
            'bg_color' => '#f39c12', 
            'restaurants' => [
                 [ 'name' => 'gyro', 
                 'image' => 'images/gyro.jpg',
                  'rating' => 4.6,
                   'preparation_time' => '25-35 min',
                    'cuisine' => 'shawerma, grilled chicken,chicken burgers!',
                     'price_range' => '$$' ],
                      [ 'name' => 'R2Go',
                       'image' => 'images/R2go.png', 
                       'rating' => 4.5, 
                       'preparation_time' => '30-40 min',
                        'cuisine' => 'healthy chicken sandwiches',
                         'price_range' => '$$$' ] ] ],
   'healthy' => 
   [ 'title' => 'Healthy',
    'icon' => 'fas fa-leaf', 
    'description' => 'Nutritious and balanced meals',
     'bg_color' => '#27ae60', 
     'restaurants' => [
            [
                'name' => 'sobarro',
                 'image' => 'images/sbarro-logo.jpg',
                  'rating' => 4.7,
                   'preparation_time' => '20-30 min',
                    'cuisine' => 'Salads & Bowls',
                     'price_range' => '$$'
            ],
            [
               'name' => 'TBS', 
               'image' => 'images/tbslogo.jpg', 
               'rating' => 4.6,
                'preparation_time' => '25-35 min', 
                'cuisine' => 'Healthy Meals,chicken salads and rice bowls',
                 'price_range' => '$$'
            ]
        ]
    ],
    'Drinks' => [ 'title' => 'Drinks',
     'icon' => 'fas fa-coffee',
      'description' => 'Coffee, tea, drinks and fresh beverages',
       'bg_color' => '#8e44ad', 
       'restaurants' => [ [ 
        'name' => 'TBS Coffee',
         'image' => 'images/tbslogo.jpg',
        'rating' => 4.8, 
        'preparation_time' => '15-25 min', 
        'cuisine' => 'Coffee & Beverages', 
        'price_range' => '$$' ], 
        [ 
            'name' => 'Cinnabon', 
            'image' => 'images/cinnabon.png',
             'rating' => 4.5, 'preparation_time' => '20-30 min', 
             'cuisine' => 'Specialty Coffee', 'price_range' => '$$' ],
              [ 'name' => 'Farghaly', 
              'image' => 'images/farghalylogo.png',
               'rating' => 4.5, 
               'preparation_time' => '20-30 min', 
               'cuisine' => 'fresh jucies and smothies',
                'price_range' => '$$' ] ] ],
   'bakeries' => [ 'title' => 'Bakeries', 'icon' => 'fas fa-bread-slice', 'description' => 'Freshly baked bread and pastries', 'bg_color' => '#d35400', 'restaurants' => [ [ 'name' => 'le croissant', 'image' => 'images/images(1).png', 'rating' => 4.7, 'preparation_time' => '20-30 min', 'cuisine' => 'Bread & Pastries', 'price_range' => '$$' ], [ 'name' => 'TBS Bakery', 'image' => 'images/tbslogo.jpg', 'rating' => 4.6, 'preparation_time' => '25-35 min', 'cuisine' => 'Artisan Bakery', 'price_range' => '$$$' ] ] ] ];

// Get category from URL
$category = $_GET['cat'] ?? 'fastfood';

// Fallback if category not found
if (!isset($categories[$category])) {
    $category = 'fastfood';
}

$currentCategory = $categories[$category];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $currentCategory['title'] ?> Restaurants - Miu-Talabat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-red: #e4002b;
            --dark-red: #c20023;
            --light-red: #ffebee;
            --text-dark: #333333;
            --text-light: #666666;
            --background: #f8f8f8;
            --white: #ffffff;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            background-color: var(--background);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Category Hero Header */
        .category-header {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 60px 0;
            text-align: center;
            border-radius: 0 0 20px 20px;
            margin-bottom: 30px;
        }

        .category-title {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .category-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: white;
            background: rgba(228, 0, 43, 0.9);
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .category-description {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        /* Search and Filter */
        .search-filter-bar {
            background: var(--white);
            border-radius: 15px;
            padding: 20px;
            margin: -30px auto 40px;
            box-shadow: var(--shadow);
            position: relative;
            z-index: 10;
            max-width: 1000px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 12px 20px;
            border: 2px solid #e9ecef;
        }

        .search-box i {
            color: var(--text-light);
            margin-right: 15px;
        }

        .search-box input {
            flex: 1;
            border: none;
            background: none;
            outline: none;
            font-size: 1rem;
        }

        .filter-tags {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .filter-tag {
            padding: 8px 18px;
            background: var(--light-red);
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.9rem;
            color: var(--primary-red);
            font-weight: 500;
            border: 2px solid transparent;
            transition: var(--transition);
        }

        .filter-tag:hover {
            background: var(--primary-red);
            color: white;
        }

        .filter-tag.active {
            background: var(--primary-red);
            color: white;
        }

        /* Restaurants Grid */
        .restaurants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin: 40px 0;
        }

        .restaurant-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid #f0f0f0;
        }

        .restaurant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            border-color: var(--primary-red);
        }

        .restaurant-image {
            height: 180px;
            overflow: hidden;
            position: relative;
        }

        .restaurant-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .restaurant-card:hover .restaurant-image img {
            transform: scale(1.05);
        }

        .restaurant-rating {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.95);
            color: var(--text-dark);
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }

        .restaurant-rating i {
            color: #ffc107;
        }

        .restaurant-content {
            padding: 20px;
        }

        .restaurant-name {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .restaurant-cuisine {
            color: var(--text-light);
            font-size: 0.95rem;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .restaurant-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .delivery-time {
            background: var(--light-red);
            color: var(--primary-red);
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        .delivery-fee {
            color: var(--text-light);
        }

        .price-range {
            color: #27ae60;
            font-weight: 600;
        }

        .order-btn {
            width: 100%;
            padding: 12px;
            background: var(--primary-red);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1rem;
        }

        .order-btn:hover {
            background: var(--dark-red);
        }

        /* Other Categories */
        .other-categories {
            margin: 60px 0 40px;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--text-dark);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
        }

        .category-item {
            background: var(--white);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .category-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            border-color: var(--primary-red);
        }

        .category-item-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--light-red);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: var(--primary-red);
            font-size: 1.5rem;
        }

        .category-item-name {
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Back to Home */
        .back-home {
            text-align: center;
            margin: 40px 0;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--primary-red);
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            transition: var(--transition);
        }

        .back-btn:hover {
            background: var(--dark-red);
            transform: translateY(-2px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .category-title {
                font-size: 2.2rem;
            }
            
            .category-icon {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
            }
            
            .restaurants-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .search-filter-bar {
                margin: -20px auto 30px;
                padding: 15px;
            }
            
            .categories-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 576px) {
            .category-header {
                padding: 40px 0;
            }
            
            .category-title {
                font-size: 1.8rem;
            }
            
            .category-description {
                font-size: 1rem;
            }
            
            .restaurants-grid {
                grid-template-columns: 1fr;
            }
            
            .filter-tags {
                justify-content: center;
            }
            
            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Category Hero Header -->
        <div class="category-header">
            <div class="category-icon">
                <i class="<?= $currentCategory['icon'] ?>"></i>
            </div>
            <h1 class="category-title"><?= $currentCategory['title'] ?> Restaurants</h1>
            <p class="category-description"><?= $currentCategory['description'] ?></p>
        </div>

        <!-- Search and Filter Bar -->
        <div class="search-filter-bar">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search within <?= $currentCategory['title'] ?>...">
            </div>
            <div class="filter-tags">
                <span class="filter-tag active">All</span>
                <span class="filter-tag">Top Rated</span>
                
            </div>
        </div>

        <!-- Restaurants Grid -->
        <div class="restaurants-grid">
            <?php foreach ($currentCategory['restaurants'] as $restaurant): ?>
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="<?= $restaurant['image'] ?>" alt="<?= $restaurant['name'] ?>">
                    <div class="restaurant-rating">
                        <i class="fas fa-star"></i>
                        <?= $restaurant['rating'] ?>
                    </div>
                </div>
                <div class="restaurant-content">
                    <h3 class="restaurant-name"><?= $restaurant['name'] ?></h3>
                    <p class="restaurant-cuisine"><?= $restaurant['cuisine'] ?></p>
                    <div class="restaurant-details">
                        <span class="preparation-time"><?= $restaurant['preparation_time'] ?></span>
                        
                        <span class="price-range"><?= $restaurant['price_range'] ?></span>
                    </div>
                    <button class="order-btn">Order Now</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Other Categories Section -->
        <div class="other-categories">
            <h2 class="section-title">Explore Other Categories</h2>
            <div class="categories-grid">
                <?php foreach ($categories as $key => $cat): 
                    if ($key === $category) continue; // Skip current category
                ?>
                <a href="index.php?page=category&cat=<?= $key ?>" class="category-item">
                    <div class="category-item-icon">
                        <i class="<?= $cat['icon'] ?>"></i>
                    </div>
                    <div class="category-item-name"><?= $cat['title'] ?></div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Back to Home Button -->
        <div class="back-home">
            <a href="index.php" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Back to Home
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filter tags functionality
            const filterTags = document.querySelectorAll('.filter-tag');
            filterTags.forEach(tag => {
                tag.addEventListener('click', function() {
                    filterTags.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Order button functionality
            const orderButtons = document.querySelectorAll('.order-btn');
            orderButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const restaurantName = this.closest('.restaurant-content')
                                          .querySelector('.restaurant-name').textContent;
                    
                    // Show success message
                    const message = `Order from ${restaurantName} has been added to your cart!`;
                    alert(message);
                    
                    // In a real app, you would add to cart here
                    console.log(`Order placed at: ${restaurantName}`);
                });
            });

            // Restaurant card hover effects
            const restaurantCards = document.querySelectorAll('.restaurant-card');
            restaurantCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Search functionality
            const searchInput = document.querySelector('.search-box input');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const restaurantCards = document.querySelectorAll('.restaurant-card');
                
                restaurantCards.forEach(card => {
                    const name = card.querySelector('.restaurant-name').textContent.toLowerCase();
                    const cuisine = card.querySelector('.restaurant-cuisine').textContent.toLowerCase();
                    
                    if (name.includes(searchTerm) || cuisine.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>