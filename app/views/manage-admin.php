<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admins - Miu-Talabat Admin</title>
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

        /* Admin management styles */
        .admin-management {
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

        .add-admin-btn {
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

        .add-admin-btn:hover {
            background: var(--dark-red);
            transform: translateY(-2px);
        }

        /* Admin form styles */
        .admin-form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }

        .admin-form.active {
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
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-red);
            box-shadow: 0 0 0 3px rgba(228, 0, 43, 0.1);
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

        /* Admin table styles */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .admin-table th,
        .admin-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .admin-table th {
            background: var(--light-red);
            color: var(--primary-red);
            font-weight: 600;
        }

        .admin-table tr:hover {
            background: #f8f9fa;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-red);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
            font-weight: 600;
        }

        .admin-info {
            margin-left: 10px;
        }

        .admin-name {
            font-weight: 600;
            margin-bottom: 2px;
        }

        .admin-email {
            color: var(--text-light);
            font-size: 14px;
        }

        .role-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }

        .role-super-admin {
            background: #d1ecf1;
            color: #0c5460;
        }

        .role-admin {
            background: #d4edda;
            color: #155724;
        }

        .role-manager {
            background: #fff3cd;
            color: #856404;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
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
            gap: 5px;
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
            
            .admin-table {
                font-size: 14px;
            }
            
            .admin-table th,
            .admin-table td {
                padding: 8px;
            }
        }
        </style>
    </head>
    <body>
    <!-- Menu Section -->
         <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="admin.php">Home</a></li>
                <li><a href="manage-admin.php" class="active">Admin</a></li>
                <li><a href="manage-vendors.php">Vendors</a></li>
                <li><a href="manage-order.php">Order</a></li>
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