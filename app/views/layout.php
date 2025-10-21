<?php

$page = $_GET['page'] ?? 'dashboard';
$pagePath = __DIR__ . "/pages/$page.php";
if (!file_exists($pagePath)) {
  $pagePath = __DIR__ . "/pages/dashboard.php";
}

$view = $_GET['view'] ?? 'navbar';

$toggleLink = "?page=$page&view=" . ($view === 'navbar' ? 'sidebar' : 'navbar');

$hotDeals = [
    [
        'title' => 'Cinnabon Special',
        'discount' => '40% OFF',
        'description' => 'Exclusive Cinnabon desserts and treats with amazing discounts',
        'image' => 'images/oreo.webp'],
    [
        'title' => 'Cinnabon Delights',
        'discount' => '30% OFF',
        'description' => 'Freshly baked cinnamon rolls with irresistible offers',
        'image' =>'images/cinna.webp'
    ],
    [
        'title' => 'Tbs Exclusive',
        'discount' => '25% OFF',
        'description' => 'Sneak a peek at our unique Tbs specials and deals',
        'image' => 'images/3rd.avif']
];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miu-talabat - Food Delivery</title>
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

        .location-selector {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--light-red);
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            transition: var(--transition);
        }

        .location-selector:hover {
            background: #ffdde1;
        }

        .location-selector i {
            color: var(--primary-red);
        }

        .location-selector span {
            font-weight: 500;
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
        }

        .action-btn i {
            font-size: 20px;
        }

        .action-btn:hover {
            color: var(--primary-red);
        }

        .cart-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: inherit;
    padding: 8px;
}

.cart-btn i {
    font-size: 1.2rem;
}

.visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
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

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('images/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            border-radius: 15px;
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 600px;
            padding: 0 20px;
        }

        .hero h2 {
            font-size: 42px;
            margin-bottom: 15px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 25px;
            text-shadow: 0 2px 3px rgba(0, 0, 0, 0.5);
        }

        .hero-btn {
            background: var(--primary-red);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .hero-btn:hover {
            background: var(--dark-red);
            transform: translateY(-3px);
        }

        .section {
            margin: 40px 0;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .view-all {
            color: var(--primary-red);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 20px;
        }

        .category-card {
            background: var(--white);
            border-radius: 12px;
            padding: 15px 10px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .category-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--light-red);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            color: var(--primary-red);
            font-size: 24px;
        }

        .category-name {
            font-weight: 500;
            font-size: 14px;
        }

        .hot-deals-section {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .deals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .deal-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #f0f0f0;
            transition: var(--transition);
            position: relative;
        }

        .deal-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .deal-image {
            height: 180px;
            overflow: hidden;
            position: relative;
        }

        .deal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .deal-card:hover .deal-image img {
            transform: scale(1.05);
        }

        .deal-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary-red);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 14px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
        }

        .deal-content {
            padding: 20px;
        }

        .deal-title {
            color: var(--text-dark);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .deal-description {
            color: var(--text-light);
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .deal-button {
            background: var(--primary-red);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            width: 100%;
        }

        .deal-button:hover {
            background: var(--dark-red);
        }

        .restaurants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .restaurant-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .restaurant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .restaurant-image {
            height: 160px;
            overflow: hidden;
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

        .restaurant-info {
            padding: 15px;
        }

        .restaurant-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .restaurant-cuisine {
            color: var(--text-light);
            font-size: 14px;
            margin-bottom: 10px;
        }

        .restaurant-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
        }

        .rating-stars {
            color: #ffc107;
        }

        .rating-value {
            font-weight: 600;
        }

        .rating-count {
            color: var(--text-light);
            font-size: 14px;
        }

        /* Top Rated Restaurants Section Styles */
        .top-rated-restaurants {
            margin: 40px 0;
        }

        .top-rated-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .top-rated-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .top-rated-card:hover {
            transform: translateY(-8px);
        }

        .restaurant-logo {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            overflow: hidden;
            position: relative;
            background: white;
            transition: all 0.3s ease;
            border: 3px solid #fff;
        }

        .top-rated-card:hover .restaurant-logo {
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.18);
        }

        .logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .top-rated-name {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        @media (max-width: 768px) {
            .top-rated-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 25px;
            }
            
            .restaurant-logo {
                width: 120px;
                height: 120px;
            }
        }
        
        @media (max-width: 480px) {
            .top-rated-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            
            .restaurant-logo {
                width: 100px;
                height: 100px;
            }
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

        @media (max-width: 992px) {
            .header-top {
                flex-wrap: wrap;
            }
            
            .search-bar {
                order: 3;
                max-width: 100%;
                margin: 15px 0 0;
            }
            
            .hero h2 {
                font-size: 32px;
            }
        }

        @media (max-width: 768px) {
            .user-actions {
                gap: 15px;
            }
            
            .action-btn span {
                display: none;
            }
            
            .nav-links {
                overflow-x: auto;
                padding-bottom: 10px;
            }
            
            .hero {
                height: 300px;
            }
            
            .hero h2 {
                font-size: 28px;
            }
            
            .hero p {
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {
            .logo h1 {
                display: none;
            }
            
            .location-selector span {
                display: none;
            }
            
            .hero {
                height: 250px;
            }
            
            .hero h2 {
                font-size: 24px;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .categories-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 10px;
            }
            
            .category-card {
                padding: 10px 5px;
            }
            
            .category-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
            
            .category-name {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
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
    <a href="index.php?page=login" class="action-btn">
        <i class="far fa-user"></i>
        <span>Sign In</span>
    </a>
<a href="index.php?page=cart" class="action-btn cart-btn" aria-label="Shopping Cart">
    <i class="fas fa-shopping-cart"></i>
    <span class="visually-hidden">View Cart</span>
</a>
        <div class="cart-count">0</div>
    </a>
</div>



            </div>
            
            <div class="header-nav">
    <div class="nav-links">
        <a href="index.php" class="active">Home</a>
        <a href="index.php?page=vendors">Vendors</a>      
        <a href="index.php?page=cart" class="action-btn cart-btn" aria-label="Shopping Cart">
    <i class="fas fa-shopping-cart"></i>
    <span class="visually-hidden">View Cart</span>
</a>
        <a href="#">Deals</a>
    </div>
</div>
        </div>
        
         <div class="promo-banner">
             <div class="container">
                 <p>Great deals on your favorite meals! Order now for pickup</p>
             </div>
         </div>
    </header>

    <main class="container">
         <section class="hero" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('images/btatesandzalabya.jpg'); background-size: cover; background-position: center;">
             <div class="hero-content">
                 <h2>Craving something delicious?</h2>
                 <p>Order your favorite meals and pick them up on campus</p>
                 <button class="hero-btn">Order Now</button>
             </div>
         </section>
         
         <!-- Top Rated Restaurants Section -->
         <section class="top-rated-restaurants">
             <div class="section-header">
                 <h2 class="section-title">Top Rated Restaurants</h2>
                 <a href="#" class="view-all">View All <i class="fas fa-chevron-right"></i></a>
             </div>
             
             <div class="top-rated-grid">
                 <div class="top-rated-card">
                     <div class="restaurant-logo">
                         <img src="images/cinnabon.png" alt="cinnabon" class="logo-img">
                     </div>
                     <div class="top-rated-name">Cinnabon</div>
                 </div>
                 
                 <div class="top-rated-card">
                     <div class="restaurant-logo">
                         <img src="images/tbslogo.jpg" alt="tbs" class="logo-img">
                     </div>
                     <div class="top-rated-name">TBS</div>
                 </div>
                 
                 <div class="top-rated-card">
                     <div class="restaurant-logo">
                         <img src="images/farghalylogo.png" alt="farghaly" class="logo-img">
                     </div>
                     <div class="top-rated-name"> Ashraf Farghaly</div>
                 </div>
                 
                 <div class="top-rated-card">
                     <div class="restaurant-logo">
                         <img src="images/mycorner.png" alt="My corner" class="logo-img">
                     </div>
                     <div class="top-rated-name">My Corner</div>
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

         <!-- Page Content -->
         <div class="page-content">
             <?php include $pagePath; ?>
         </div>
    
  
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
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 miu-talabat. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryCards = document.querySelectorAll('.category-card');
            categoryCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            const dealCards = document.querySelectorAll('.deal-card');
            dealCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            const restaurantCards = document.querySelectorAll('.restaurant-card');
            restaurantCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Add hover effect for top rated restaurants
            const topRatedCards = document.querySelectorAll('.top-rated-card');
            topRatedCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>