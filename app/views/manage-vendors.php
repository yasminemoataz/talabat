<?php
// Include the MenuController to get real data
require_once __DIR__ . '/../controllers/MenuController.php';
$menuController = new MenuController();
$allVendors = $menuController->getAllVendors();
$allMenuData = $menuController->getAllMenuData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vendors - Miu-Talabat Admin</title>
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

        /* Page header */
        .page-header {
            background: var(--white);
            padding: 30px 0;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: var(--text-light);
            font-size: 16px;
        }

        /* Vendor management styles */
        .vendor-management {
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

        .add-vendor-btn {
            background: var(--primary-red);
            color: var(--white);
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .add-vendor-btn:hover {
            background: var(--dark-red);
            transform: translateY(-2px);
        }

        /* Vendor form styles */
        .vendor-form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }

        .vendor-form.active {
            display: block;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-red);
            box-shadow: 0 0 0 3px rgba(228, 0, 43, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-primary {
            background: var(--primary-red);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--dark-red);
        }

        .btn-secondary {
            background: #6c757d;
            color: var(--white);
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        /* Vendors grid */
        .vendors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .vendor-card {
            background: var(--white);
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .vendor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .vendor-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .vendor-logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--light-red);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-red);
            font-size: 24px;
            font-weight: 600;
        }

        .vendor-info {
            flex: 1;
        }

        .vendor-name {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .vendor-category {
            color: var(--text-light);
            font-size: 14px;
            margin-bottom: 8px;
        }

        .vendor-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #ffc107;
            font-size: 14px;
        }

        .vendor-description {
            color: var(--text-light);
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .vendor-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary-red);
            display: block;
        }

        .stat-label {
            font-size: 12px;
            color: var(--text-light);
            margin-top: 2px;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            margin-bottom: 15px;
            display: inline-block;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-warning {
            background: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background: #e0a800;
        }

        .btn-danger {
            background: #dc3545;
            color: var(--white);
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .btn-info {
            background: #17a2b8;
            color: var(--white);
        }

        .btn-info:hover {
            background: #138496;
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
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .vendors-grid {
                grid-template-columns: 1fr;
            }
            
            .vendor-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Menu Section -->
  <div class="menu text-center">
        <div class="wrapper">
            <ul>
               <li><a href="index.php?page=admin">Home</a></li>
               <li><a href="index.php?page=manageadmin">Admin</a></li>
               <li><a href="index.php?page=managevendors" class="active">Vendors</a></li>
               <li><a href="index.php?page=manageorder">Order</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <div class="wrapper">
            <!-- Page Header -->
            <div class="page-header text-center">
                <h1 class="page-title">Manage Vendors</h1>
                <p class="page-subtitle">Manage restaurant vendors and their information</p>
            </div>

            <!-- Vendor Management Section -->
            <div class="vendor-management">
                <h2 class="section-title">Restaurant Vendors</h2>
                
                <button class="add-vendor-btn" onclick="toggleVendorForm()">
                    <i class="fas fa-plus"></i>
                    Add New Vendor
                </button>

                <!-- Add/Edit Vendor Form -->
                <div class="vendor-form" id="vendorForm">
                    <h3>Add New Vendor</h3>
                    <form id="vendorItemForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="vendorName">Vendor Name *</label>
                                <input type="text" id="vendorName" name="vendorName" required>
                            </div>
                            <div class="form-group">
                                <label for="vendorCategory">Category *</label>
                                <input type="text" id="vendorCategory" name="vendorCategory" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="vendorRating">Rating</label>
                                <input type="number" id="vendorRating" name="vendorRating" step="0.1" min="0" max="5">
                            </div>
                            <div class="form-group">
                                <label for="vendorStatus">Status</label>
                                <select id="vendorStatus" name="vendorStatus">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="vendorDescription">Description</label>
                            <textarea id="vendorDescription" name="vendorDescription" placeholder="Describe this vendor..."></textarea>
                        </div>
                        
                        <div class="form-buttons">
                            <button type="button" class="btn btn-secondary" onclick="cancelVendorForm()">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Vendor</button>
                        </div>
                    </form>
                </div>

                <!-- Vendors Grid -->
                <div class="vendors-grid">
                    <?php foreach ($allVendors as $vendorId => $vendor): 
                        // Count menu items for this vendor
                        $menuItems = $allMenuData['menus'][$vendorId] ?? [];
                        $totalItems = 0;
                        $totalCategories = count($menuItems);
                        foreach ($menuItems as $category => $items) {
                            $totalItems += count($items);
                        }
                        $orderCount = rand(20, 100); // Sample order count for Phase 1
                    ?>
                    <div class="vendor-card">
                        <div class="vendor-header">
                            <div class="vendor-logo">
                                <?php echo strtoupper(substr($vendor['name'], 0, 2)); ?>
                            </div>
                            <div class="vendor-info">
                                <div class="vendor-name"><?php echo htmlspecialchars($vendor['name']); ?></div>
                                <div class="vendor-category"><?php echo htmlspecialchars($vendor['category']); ?></div>
                                <div class="vendor-rating">
                                    <i class="fas fa-star"></i>
                                    <?php echo $vendor['rating']; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vendor-description">
                            <?php echo htmlspecialchars($vendor['description']); ?>
                        </div>
                        
                        <div class="vendor-stats">
                            <div class="stat-item">
                                <span class="stat-number"><?php echo $totalCategories; ?></span>
                                <div class="stat-label">Categories</div>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number"><?php echo $totalItems; ?></span>
                                <div class="stat-label">Menu Items</div>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number"><?php echo $orderCount; ?></span>
                                <div class="stat-label">Orders</div>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number"><?php echo $vendor['rating']; ?></span>
                                <div class="stat-label">Rating</div>
                            </div>
                        </div>
                        
                        <span class="status-badge status-active">Active</span>
                        
                        <div class="action-buttons">
                            <button class="btn btn-info btn-sm" onclick="viewVendorDetails('<?php echo $vendorId; ?>')">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <button class="btn btn-warning btn-sm" onclick="editVendor('<?php echo $vendorId; ?>')">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deleteVendor('<?php echo $vendorId; ?>')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
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

    <script>
        function toggleVendorForm() {
            const form = document.getElementById('vendorForm');
            form.classList.toggle('active');
        }

        function cancelVendorForm() {
            const form = document.getElementById('vendorForm');
            form.classList.remove('active');
            document.getElementById('vendorItemForm').reset();
        }

        function viewVendorDetails(vendorId) {
            // In Phase 2, this will show detailed vendor information
            alert('View vendor details functionality will be implemented in Phase 2 with database integration');
        }

        function editVendor(vendorId) {
            // In Phase 2, this will populate the form with existing data
            alert('Edit functionality will be implemented in Phase 2 with database integration');
        }

        function deleteVendor(vendorId) {
            if (confirm('Are you sure you want to delete this vendor? This will also delete all associated menu items.')) {
                // In Phase 2, this will delete from database
                alert('Delete functionality will be implemented in Phase 2 with database integration');
            }
        }

        // Form submission handler
        document.getElementById('vendorItemForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In Phase 2, this will save to database
            alert('Vendor saved! (Database integration will be added in Phase 2)');
            
            // Reset form and hide it
            this.reset();
            document.getElementById('vendorForm').classList.remove('active');
        });
    </script>
</body>
</html>
