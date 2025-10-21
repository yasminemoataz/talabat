<?php
// This file receives $vendor and $menuItems from MenuController

// Add session start for cart functionality
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $vendor['name']; ?> - MIU Eats</title>
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

        header {
            background-color: var(--white);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            height: 40px;
        }

        .logo h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-red);
        }

        .search-bar {
            flex: 1;
            max-width: 500px;
            margin: 0 20px;
        }

        .search-form {
            display: flex;
            background: var(--white);
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }

        .search-input {
            flex: 1;
            padding: 12px 20px;
            border: none;
            font-size: 16px;
            outline: none;
        }

        .search-button {
            background: var(--primary-red);
            border: none;
            padding: 12px 20px;
            color: var(--white);
            cursor: pointer;
            transition: var(--transition);
        }

        .search-button:hover {
            background: var(--dark-red);
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            transition: var(--transition);
            font-size: 12px;
            text-decoration: none;
        }

        .action-btn i {
            font-size: 20px;
        }

        .action-btn:hover {
            color: var(--primary-red);
        }

        .cart-btn {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: 5px;
            background: var(--primary-red);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .header-nav {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-top: 1px solid #f0f0f0;
        }

        .nav-links {
            display: flex;
            gap: 25px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: var(--transition);
            padding: 5px 0;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary-red);
        }

        .nav-links a.active {
            color: var(--primary-red);
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-red);
        }

        .promo-banner {
            background: linear-gradient(to right, var(--primary-red), var(--dark-red));
            color: white;
            padding: 10px 0;
            text-align: center;
            font-size: 14px;
        }

        footer {
            background: #2c2c2c;
            color: white;
            padding: 40px 0 20px;
            margin-top: 50px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--primary-red);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #cccccc;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: #444444;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary-red);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #444444;
            font-size: 14px;
            color: #aaaaaa;
        }

        /* VENDOR MENU SPECIFIC STYLES */
        .vendor-menu-container {
            padding: 20px 0;
        }

        .vendor-header-content {
            display: flex;
            align-items: center;
            gap: 30px;
            text-align: left;
        }

        .vendor-image {
            flex-shrink: 0;
            position: relative;
        }
       .vendor-image img {
            width: 120px;
           height: 120px;
            border-radius: 15px;
            object-fit: cover;
             border: 4px solid var(--light-red);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
       }
        .vendor-image-box {
            width: 120px;
            height: 120px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border: 4px solid var(--light-red);
        }

        .vendor-info {
            flex: 1;
        }

        .vendor-header {
            background: var(--white);
            padding: 30px;
            border-radius: 15px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            text-align: left;
        }

        .vendor-name {
            color: var(--primary-red);
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .vendor-description {
            font-size: 1.2em;
            color: var(--text-light);
            margin-bottom: 15px;
        }

        .vendor-meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .meta-item {
            background: var(--light-red);
            padding: 8px 16px;
            border-radius: 20px;
            color: var(--primary-red);
            font-weight: 500;
        }

        .menu-category {
            background: var(--white);
            padding: 25px;
            border-radius: 15px;
            box-shadow: var(--shadow);
            margin-bottom: 25px;
        }

        .category-title {
            color: var(--text-dark);
            font-size: 1.8em;
            margin-bottom: 20px;
            border-bottom: 3px solid var(--primary-red);
            padding-bottom: 10px;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
            transition: var(--transition);
        }

        .menu-item:hover {
            background: #f9f9f9;
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: bold;
            font-size: 1.3em;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .arabic-name {
            font-family: 'Segoe UI', Tahoma, 'Arabic Typesetting', serif;
            direction: rtl;
            display: inline-block;
        }

        .item-description {
            color: var(--text-light);
            font-size: 1em;
        }

        .item-price {
            font-weight: bold;
            color: var(--primary-red);
            font-size: 1.4em;
            margin-right: 20px;
        }

        .item-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .add-to-cart {
            background: var(--primary-red);
            color: var(--white);
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1em;
            transition: var(--transition);
        }

        .add-to-cart:hover {
            background: var(--dark-red);
            transform: translateY(-2px);
        }

        .out-of-stock {
            background: #ccc;
            color: #666;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: not-allowed;
        }

        .popular-badge {
            background: #ff6b6b;
            color: white;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.8em;
            margin-left: 10px;
        }

        @media (max-width: 768px) {
            .vendor-header-content {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }
            
            .vendor-image-box {
                width: 100px;
                height: 100px;
                font-size: 16px;
            }
            
            .menu-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .item-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .vendor-name {
                font-size: 2em;
            }
        }

        @media (max-width: 576px) {
            .logo h1 {
                display: none;
            }
            
            .header-top {
                flex-wrap: wrap;
            }
            
            .search-bar {
                order: 3;
                max-width: 100%;
                margin: 15px 0 0;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIwIiBoZWlnaHQ9IjQwIiB2aWV3Qm94PSIwIDAgMTIwIDQwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0xMCAxMEMxMCA0LjQ3NyAxNC40NzcgMCAyMCAwSDEwMGM1LjUyMyAwIDEwIDQuNDc3IDEwIDEwdjIwYzAgNS41MjMtNC40NzcgMTAtMTAgMTBIMjBjLTUuNTIzIDAtMTAtNC40NzctMTAtMTBWMTBaIiBmaWxsPSIjRTQwMDJCIi8+PHRleHQgeD0iNjAiIHk9IjI1IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE4IiBmb250LXdlaWdodD0iYm9sZCI+VEFMQUJBVDwvdGV4dD48L3N2Zz4=" alt="Talabat Logo">
                    <h1>miu-talabat</h1>
                </div>
                
                <div class="search-bar">
                    <form class="search-form">
                        <input type="text" class="search-input" placeholder="Search for restaurants or dishes...">
                        <button type="submit" class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                
                <div class="user-actions">
                    <a href="?page=login" class="action-btn">
                        <i class="far fa-user"></i>
                        <span>Sign In</span>
                    </a>
                   <a href="?page=cart" class="action-btn cart-btn" style="text-decoration: none; color: inherit;">
    <i class="fas fa-shopping-bag"></i>
    <span>Cart</span>
    <div class="cart-count">
        <?php 
            $cartCount = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $cartCount += $item['quantity'];
                }
            }
            echo $cartCount;
        ?>
    </div>
</a>
                </div>
            </div>
            
            <div class="header-nav">
                <div class="nav-links">
                    <a href="?" class="">Home</a>
                    <a href="?page=vendor&vendor=mycorner" class="active">Restaurants</a> 
                    <a href="#">Deals</a>
                    <a href="#">Fast Food</a>
                    <a href="#">Desserts</a>
                    <a href="#">Beverages</a>
                </div>
            </div>
        </div>
        
        <div class="promo-banner">
            <div class="container">
                <p>Great deals on your favorite meals! Order now for pickup</p>
            </div>
        </div>
    </header>

    <!-- VENDOR MENU CONTENT -->
    <main class="container">
     <!-- Vendor Header -->
<div class="vendor-header">
    <div class="vendor-header-content">
        <div class="vendor-image">
            <img src="  images/mycorner.jpg" alt="<?php echo $vendor['name']; ?>" 
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <div class="vendor-image-box" style="display: none;">
                MyCorner
            </div>
        </div>
        <div class="vendor-info">
            <h1 class="vendor-name"><?php echo $vendor['name']; ?></h1>
            <p class="vendor-description"><?php echo $vendor['description']; ?></p>
            <div class="vendor-meta">
                <span class="meta-item">⭐ <?php echo $vendor['rating']; ?> Rating</span>
                <span class="meta-item">🏷️ <?php echo $vendor['category']; ?></span>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_GET['added']) && $_GET['added'] == '1'): ?>
    <div style="max-width:1200px;margin:10px auto;padding:10px;background:#e8f8ed;border:1px solid #b7e6c9;color:#1b7a3d;border-radius:6px;text-align:center;">
        Item added to cart ✅
    </div>
<?php endif; ?>

            <!-- Menu Categories -->
            <div class="menu-container">
                <?php if (empty($menuItems)): ?>
                    <div class="menu-category" style="text-align: center;">
                        <h3>Menu Coming Soon!</h3>
                        <p>We're working on updating our menu</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($menuItems as $category => $items): ?>
                        <div class="menu-category">
                            <h2 class="category-title"><?php echo $category; ?></h2>
                            
                            <?php foreach ($items as $item): ?>
                                <div class="menu-item">
                                    <div class="item-info">
                                        <div class="item-name">
                                            <span class="arabic-name"><?php echo $item['name']; ?></span>
                                            <?php if ($item['is_popular']): ?>
                                                <span class="popular-badge">🔥 Popular</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="item-description"><?php echo $item['description']; ?></div>
                                    </div>
                                    
                                    <div class="item-actions">
                                        <div class="item-price">EGP <?php echo number_format($item['price'], 2); ?></div>
                                      <?php if ($item['is_available']): ?>
    <form method="POST" action="index.php?page=vendor&vendor=<?php echo $vendor['id']; ?>" style="display: inline;">
        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
        <input type="hidden" name="product_name" value="<?php echo $item['name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $item['price']; ?>">
        <input type="hidden" name="action" value="add">
        <button type="submit" class="add-to-cart">
            Add to Cart
        </button>
    </form>
<?php else: ?>
    <button class="out-of-stock" disabled>
        Out of Stock
    </button>
<?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>About Miu-Talabat</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>For Restaurants</h3>
                    <ul class="footer-links">
                        <li><a href="#">Partner with Us</a></li>
                        <li><a href="#">Restaurant Login</a></li>
                        <li><a href="#">Resources</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Help & Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Refund Policy</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Download Our App</h3>
                    <p>Get the best experience with our mobile app</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 miu-talabat. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
    /*function addToCart(itemId, itemName) {
        alert('Added ' + itemName + ' to cart!');
        // Will integrate with main cart system later
    }*/

    // Add hover effects for menu items
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
    </script>
</body>
</html>