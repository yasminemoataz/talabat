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
    <link rel="stylesheet" href="styles/admin.css">
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
        <a href="index.php?page=managevendors" class="action-btn">
            <i class="fas fa-plus"></i>
            Add New Vendor
        </a>
        <a href="index.php?page=managevendors" class="action-btn">
            <i class="fas fa-store"></i>
            Manage Vendors
        </a>
        <a href="index.php?page=manageorder" class="action-btn">
            <i class="fas fa-eye"></i>
            View Orders
        </a>
        <a href="index.php?page=manageadmin" class="action-btn">
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