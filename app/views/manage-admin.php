<?php
// This file is directly included by the controller, no need to include the controller here
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admins - Miu-Talabat Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
         <link rel="stylesheet" href="styles/manage-admin.css">
    </head>
    <body>
    <!-- Menu Section -->
         <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php?page=admin">Home</a></li>
                <li><a href="index.php?page=manageadmin" class="active">Admin</a></li>
                <li><a href="index.php?page=managevendors">Vendors</a></li>
                <li><a href="index.php?page=manageorder">Order</a></li>
            </ul>
        </div>
         </div>

    <!-- Main Content Section -->
    <div class="main-content">
            <div class="wrapper">
            <!-- Page Header -->
            <div class="page-header text-center">
                <h1 class="page-title">Manage Admins</h1>
                <p class="page-subtitle">Manage admin users and their permissions</p>
            </div>

            <!-- Admin Management Section -->
            <div class="admin-management">
                <h2 class="section-title">Admin Users</h2>
                
                <button class="add-admin-btn" onclick="toggleAdminForm()">
                    <i class="fas fa-plus"></i>
                    Add New Admin
                </button>

                <!-- Add/Edit Admin Form -->
                <div class="admin-form" id="adminForm">
                    <h3>Add New Admin</h3>
                    <form id="adminItemForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="adminName">Full Name *</label>
                                <input type="text" id="adminName" name="adminName" required>
                            </div>
                            <div class="form-group">
                                <label for="adminEmail">Email Address *</label>
                                <input type="email" id="adminEmail" name="adminEmail" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="adminUsername">Username *</label>
                                <input type="text" id="adminUsername" name="adminUsername" required>
                            </div>
                            <div class="form-group">
                                <label for="adminPassword">Password *</label>
                                <input type="password" id="adminPassword" name="adminPassword" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="adminRole">Role *</label>
                                <select id="adminRole" name="adminRole" required>
                                    <option value="">Select Role</option>
                                    <option value="super-admin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="adminStatus">Status</label>
                                <select id="adminStatus" name="adminStatus">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-buttons">
                            <button type="button" class="btn btn-secondary" onclick="cancelAdminForm()">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Admin</button>
                        </div>
                    </form>
                </div>

                <!-- Admins Table -->
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Admin</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Last Login</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <div class="admin-avatar">AH</div>
                                    <div class="admin-info">
                                        <div class="admin-name">Ahmed Hassan</div>
                                        <div class="admin-email">ahmed.hassan@miu-talabat.com</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="role-badge role-super-admin">Super Admin</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>2025-01-15 14:30</td>
                            <td>2024-12-01</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-info btn-sm" onclick="viewAdminDetails(1)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editAdmin(1)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteAdmin(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <div class="admin-avatar">FM</div>
                                    <div class="admin-info">
                                        <div class="admin-name">Fatma Mohamed</div>
                                        <div class="admin-email">fatma.mohamed@miu-talabat.com</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="role-badge role-admin">Admin</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>2025-01-15 13:45</td>
                            <td>2024-12-15</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-info btn-sm" onclick="viewAdminDetails(2)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editAdmin(2)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteAdmin(2)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <div class="admin-avatar">OA</div>
                                    <div class="admin-info">
                                        <div class="admin-name">Omar Ali</div>
                                        <div class="admin-email">omar.ali@miu-talabat.com</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="role-badge role-manager">Manager</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>2025-01-15 12:20</td>
                            <td>2025-01-01</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-info btn-sm" onclick="viewAdminDetails(3)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editAdmin(3)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteAdmin(3)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <div class="admin-avatar">NI</div>
                                    <div class="admin-info">
                                        <div class="admin-name">Nour Ibrahim</div>
                                        <div class="admin-email">nour.ibrahim@miu-talabat.com</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="role-badge role-admin">Admin</span></td>
                            <td><span class="status-badge status-inactive">Inactive</span></td>
                            <td>2025-01-10 16:45</td>
                            <td>2024-11-20</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-info btn-sm" onclick="viewAdminDetails(4)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" onclick="editAdmin(4)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteAdmin(4)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
        function toggleAdminForm() {
            const form = document.getElementById('adminForm');
            form.classList.toggle('active');
        }

        function cancelAdminForm() {
            const form = document.getElementById('adminForm');
            form.classList.remove('active');
            document.getElementById('adminItemForm').reset();
        }

        function viewAdminDetails(id) {
            // In Phase 2, this will show detailed admin information
            alert('View admin details functionality will be implemented in Phase 2 with database integration');
        }

        function editAdmin(id) {
            // In Phase 2, this will populate the form with existing data
            alert('Edit functionality will be implemented in Phase 2 with database integration');
        }

        function deleteAdmin(id) {
            if (confirm('Are you sure you want to delete this admin user? This action cannot be undone.')) {
                // In Phase 2, this will delete from database
                alert('Delete functionality will be implemented in Phase 2 with database integration');
            }
        }

        // Form submission handler
        document.getElementById('adminItemForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In Phase 2, this will save to database
            alert('Admin user saved! (Database integration will be added in Phase 2)');
            
            // Reset form and hide it
            this.reset();
            document.getElementById('adminForm').classList.remove('active');
        });
    </script>
    </body>
</html>