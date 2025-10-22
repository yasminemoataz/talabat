<?php
// Include the MenuController to get real data
require_once(__DIR__ . '/../controllers/MenuController.php');
$menuController = new MenuController();
$stats = $menuController->getAdminStats();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Miu-Talabat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--background);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .wrapper {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Menu styles */
        .menu {
            border-bottom: 1px solid #e0e0e0;
            background: var(--white);
            box-shadow: var(--shadow);
        }

        .menu ul {
            list-style-type: none;
            padding: 15px 0;
            margin: 0;
        }

        .menu ul li {
            display: inline;
            padding: 1%;
        }

        .menu ul li a {
            text-decoration: none;
            font-weight: bold;
            color: var(--primary-red);
            padding: 10px 15px;
            transition: var(--transition);
            border-radius: 5px;
        }

        .menu ul li a:hover {
            color: var(--dark-red);
            background: var(--light-red);
        }

        .menu ul li a.active {
            background: var(--primary-red);
            color: var(--white);
        }

        /* Main content styles */
        .main-content {
            flex: 1;
            padding: 20px 0;
        }

        .text-center {
            text-align: center;
        }

        .clearfix {
            clear: both;
        }

        /* Dashboard styles */
        .dashboard-header {
            background: var(--white);
            padding: 30px 0;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
        }

        .dashboard-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .dashboard-subtitle {
            color: var(--text-light);
            font-size: 16px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--white);
            padding: 25px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--primary-red);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--light-red);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: var(--primary-red);
            font-size: 24px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 14px;
            font-weight: 500;
        }

        .quick-actions {
            background: var(--white);
            padding: 25px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .action-btn {
            background: var(--primary-red);
            color: var(--white);
            border: none;
            padding: 15px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .action-btn:hover {
            background: var(--dark-red);
            transform: translateY(-2px);
        }

        .recent-activity {
            background: var(--white);
            padding: 25px;
            border-radius: 12px;
            box-shadow: var(--shadow);
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-red);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-red);
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .activity-time {
            color: var(--text-light);
            font-size: 14px;
        }

        /* Footer styles */
        footer {
            background: #2c2c2c;
            color: white;
            padding: 40px 0 20px;
            margin-top: auto;
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
            padding: 0;
            margin: 0;
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

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Menu Section -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
               <li><a href="index.php?page=admin" class="active">Home</a></li>
            <li><a href="index.php?page=manageadmin">Admin</a></li>
            <li><a href="index.php?page=managevendors">Vendors</a></li>
            <li><a href="index.php?page=manageorder">Order</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <div class="wrapper">
            <!-- Dashboard Header -->
            <div class="dashboard-header text-center">
                <h1 class="dashboard-title">Admin Dashboard</h1>
                <p class="dashboard-subtitle">Welcome to Miu-Talabat Admin Panel</p>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="stat-number"><?php echo $stats['total_categories']; ?></div>
                    <div class="stat-label">Total Categories</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="stat-number"><?php echo $stats['total_foods']; ?></div>
                    <div class="stat-label">Total Foods</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <div class="stat-number"><?php echo $stats['total_vendors']; ?></div>
                    <div class="stat-label">Total Vendors</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="stat-number">EGP <?php echo number_format($stats['total_revenue']); ?></div>
                    <div class="stat-label">Total Revenue</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <h2 class="section-title">Quick Actions</h2>
                <div class="actions-grid">
                    <a href="manage-vendors.php" class="action-btn">
                        <i class="fas fa-plus"></i>
                        Add New Vendor
                    </a>
                    <a href="manage-vendors.php" class="action-btn">
                        <i class="fas fa-store"></i>
                        Manage Vendors
                    </a>
                    <a href="manage-order.php" class="action-btn">
                        <i class="fas fa-eye"></i>
                        View Orders
                    </a>
                    <a href="manage-admin.php" class="action-btn">
                        <i class="fas fa-user-plus"></i>
                        Add Admin
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="recent-activity">
                <h2 class="section-title">Recent Activity</h2>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-text">New order #1234 received</div>
                        <div class="activity-time">2 minutes ago</div>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-text">New food item "Chicken Burger" added</div>
                        <div class="activity-time">15 minutes ago</div>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-text">Category "Fast Food" updated</div>
                        <div class="activity-time">1 hour ago</div>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-text">Order #1230 marked as delivered</div>
                        <div class="activity-time">2 hours ago</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
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
                <p>&copy; 2025 miu-talabat. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>