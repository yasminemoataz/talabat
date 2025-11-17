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
   <link rel="stylesheet" href="styles/manage-vendors.css">
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
