<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Food - Miu-Talabat Admin</title>
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

        /* Food management styles */
        .food-management {
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

        .add-food-btn {
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

        .add-food-btn:hover {
            background: var(--dark-red);
            transform: translateY(-2px);
        }

        /* Food form styles */
        .food-form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }

        .food-form.active {
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

        /* Food table styles */
        .food-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .food-table th,
        .food-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .food-table th {
            background: var(--light-red);
            color: var(--primary-red);
            font-weight: 600;
        }

        .food-table tr:hover {
            background: #f8f9fa;
        }

        .food-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
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
            
            .food-table {
                font-size: 14px;
            }
            
            .food-table th,
            .food-table td {
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
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php" class="active">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
    <div class="wrapper">
            <!-- Page Header -->
            <div class="page-header text-center">
                <h1 class="page-title">Manage Food</h1>
                <p class="page-subtitle">Add, edit, and manage food items in your restaurant</p>
            </div>

            <!-- Food Management Section -->
            <div class="food-management">
                <h2 class="section-title">Food Items</h2>
                
                <button class="add-food-btn" onclick="toggleFoodForm()">
                    <i class="fas fa-plus"></i>
                    Add New Food Item
                </button>

                <!-- Add/Edit Food Form -->
                <div class="food-form" id="foodForm">
                    <h3>Add New Food Item</h3>
                    <form id="foodItemForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="foodName">Food Name *</label>
                                <input type="text" id="foodName" name="foodName" required>
                            </div>
                            <div class="form-group">
                                <label for="foodPrice">Price *</label>
                                <input type="number" id="foodPrice" name="foodPrice" step="0.01" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="foodCategory">Category *</label>
                                <select id="foodCategory" name="foodCategory" required>
                                    <option value="">Select Category</option>
                                    <option value="fast-food">Fast Food</option>
                                    <option value="desserts">Desserts</option>
                                    <option value="chicken">Chicken</option>
                                    <option value="healthy">Healthy</option>
                                    <option value="cafes">Cafés</option>
                                    <option value="bakeries">Bakeries</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foodStatus">Status</label>
                                <select id="foodStatus" name="foodStatus">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="foodDescription">Description</label>
                            <textarea id="foodDescription" name="foodDescription" placeholder="Describe the food item..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="foodImage">Food Image</label>
                            <input type="file" id="foodImage" name="foodImage" accept="image/*">
                        </div>
                        
                        <div class="form-buttons">
                            <button type="button" class="btn btn-secondary" onclick="cancelFoodForm()">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Food Item</button>
                        </div>
                    </form>
                </div>

                <!-- Food Items Table -->
                <table class="food-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="../public/images/oreo.webp" alt="Cinnabon Special" class="food-image"></td>
                            <td>Cinnabon Special</td>
                            <td>Desserts</td>
                            <td>$12.99</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-warning btn-sm" onclick="editFood(1)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteFood(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="../public/images/cinna.webp" alt="Cinnabon Delights" class="food-image"></td>
                            <td>Cinnabon Delights</td>
                            <td>Desserts</td>
                            <td>$8.99</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-warning btn-sm" onclick="editFood(2)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteFood(2)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="../public/images/3rd.avif" alt="Tbs Exclusive" class="food-image"></td>
                            <td>Tbs Exclusive</td>
                            <td>Fast Food</td>
                            <td>$15.99</td>
                            <td><span class="status-badge status-inactive">Inactive</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-warning btn-sm" onclick="editFood(3)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteFood(3)">
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
        function toggleFoodForm() {
            const form = document.getElementById('foodForm');
            form.classList.toggle('active');
        }

        function cancelFoodForm() {
            const form = document.getElementById('foodForm');
            form.classList.remove('active');
            document.getElementById('foodItemForm').reset();
        }

        function editFood(id) {
            // In Phase 2, this will populate the form with existing data
            alert('Edit functionality will be implemented in Phase 2 with database integration');
        }

        function deleteFood(id) {
            if (confirm('Are you sure you want to delete this food item?')) {
                // In Phase 2, this will delete from database
                alert('Delete functionality will be implemented in Phase 2 with database integration');
            }
        }

        // Form submission handler
        document.getElementById('foodItemForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In Phase 2, this will save to database
            alert('Food item saved! (Database integration will be added in Phase 2)');
            
            // Reset form and hide it
            this.reset();
            document.getElementById('foodForm').classList.remove('active');
        });
    </script>
</body>
</html>