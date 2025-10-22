<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders - Miu-Talabat Admin</title>
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

        /* Order management styles */
        .order-management {
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

        /* Filter and search */
        .order-filters {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-group label {
            font-weight: 500;
            color: var(--text-dark);
        }

        .filter-group select,
        .filter-group input {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .search-input {
            min-width: 200px;
        }

        /* Order table styles */
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-table th,
        .order-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .order-table th {
            background: var(--light-red);
            color: var(--primary-red);
            font-weight: 600;
        }

        .order-table tr:hover {
            background: #f8f9fa;
        }

        .order-id {
            font-weight: 600;
            color: var(--primary-red);
        }

        .customer-info {
            font-size: 14px;
        }

        .customer-name {
            font-weight: 500;
            margin-bottom: 2px;
        }

        .customer-phone {
            color: var(--text-light);
        }

        .order-items {
            max-width: 200px;
        }

        .item-list {
            font-size: 14px;
            color: var(--text-light);
        }

        .item-name {
            font-weight: 500;
            color: var(--text-dark);
        }

        .item-quantity {
            color: var(--primary-red);
            font-weight: 500;
        }

        .order-total {
            font-weight: 600;
            color: var(--text-dark);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-preparing {
            background: #f8d7da;
            color: #721c24;
        }

        .status-delivered {
            background: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background: #f5c6cb;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            font-size: 12px;
        }

        .btn-primary {
            background: var(--primary-red);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--dark-red);
        }

        .btn-success {
            background: #28a745;
            color: var(--white);
        }

        .btn-success:hover {
            background: #218838;
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

        /* Order details modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: var(--white);
            margin: 5% auto;
            padding: 20px;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .close {
            color: var(--text-light);
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: var(--primary-red);
        }

        .order-details {
            margin-bottom: 20px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-label {
            font-weight: 500;
            color: var(--text-dark);
        }

        .detail-value {
            color: var(--text-light);
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
            .order-filters {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-group {
                justify-content: space-between;
            }
            
            .order-table {
                font-size: 14px;
            }
            
            .order-table th,
            .order-table td {
                padding: 8px;
            }
            
            .action-buttons {
                flex-direction: column;
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
                 <li><a href="index.php?page=managevendors">Vendors</a></li>
                 <li><a href="index.php?page=manageorder" class="active">Order</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
    <div class="wrapper">
            <!-- Page Header -->
            <div class="page-header text-center">
                <h1 class="page-title">Manage Orders</h1>
                <p class="page-subtitle">View and manage customer orders</p>
            </div>

            <!-- Order Management Section -->
            <div class="order-management">
                <h2 class="section-title">Order Management</h2>
                
                <!-- Filters -->
                <div class="order-filters">
                    <div class="filter-group">
                        <label for="statusFilter">Status:</label>
                        <select id="statusFilter">
                            <option value="">All Orders</option>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="preparing">Preparing</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="dateFilter">Date:</label>
                        <select id="dateFilter">
                            <option value="">All Time</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="searchOrder">Search:</label>
                        <input type="text" id="searchOrder" class="search-input" placeholder="Order ID or Customer Name">
                    </div>
                </div>

                <!-- Orders Table -->
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="order-id">#1234</span></td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-name">Ahmed Hassan</div>
                                    <div class="customer-phone">+20 123 456 7890</div>
                                </div>
                            </td>
                            <td>
                                <div class="order-items">
                                    <div class="item-list">
                                        <div><span class="item-name">Cinnabon Special</span> x<span class="item-quantity">2</span></div>
                                        <div><span class="item-name">Chicken Burger</span> x<span class="item-quantity">1</span></div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="order-total">$34.97</span></td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                            <td>2025-01-15 14:30</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-info" onclick="viewOrderDetails(1234)">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <button class="btn btn-success" onclick="confirmOrder(1234)">
                                        <i class="fas fa-check"></i> Confirm
                                    </button>
                                    <button class="btn btn-danger" onclick="cancelOrder(1234)">
                                        <i class="fas fa-times"></i> Cancel
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><span class="order-id">#1233</span></td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-name">Fatma Mohamed</div>
                                    <div class="customer-phone">+20 987 654 3210</div>
                                </div>
                            </td>
                            <td>
                                <div class="order-items">
                                    <div class="item-list">
                                        <div><span class="item-name">Cinnabon Delights</span> x<span class="item-quantity">1</span></div>
                                        <div><span class="item-name">Coffee</span> x<span class="item-quantity">2</span></div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="order-total">$18.98</span></td>
                            <td><span class="status-badge status-confirmed">Confirmed</span></td>
                            <td>2025-01-15 13:45</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-info" onclick="viewOrderDetails(1233)">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <button class="btn btn-warning" onclick="updateOrderStatus(1233, 'preparing')">
                                        <i class="fas fa-clock"></i> Preparing
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><span class="order-id">#1232</span></td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-name">Omar Ali</div>
                                    <div class="customer-phone">+20 555 123 4567</div>
                                </div>
                            </td>
                            <td>
                                <div class="order-items">
                                    <div class="item-list">
                                        <div><span class="item-name">Tbs Exclusive</span> x<span class="item-quantity">1</span></div>
                                        <div><span class="item-name">French Fries</span> x<span class="item-quantity">1</span></div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="order-total">$22.99</span></td>
                            <td><span class="status-badge status-preparing">Preparing</span></td>
                            <td>2025-01-15 12:20</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-info" onclick="viewOrderDetails(1232)">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <button class="btn btn-success" onclick="updateOrderStatus(1232, 'delivered')">
                                        <i class="fas fa-truck"></i> Delivered
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><span class="order-id">#1231</span></td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-name">Nour Ibrahim</div>
                                    <div class="customer-phone">+20 111 222 3333</div>
                                </div>
                            </td>
                            <td>
                                <div class="order-items">
                                    <div class="item-list">
                                        <div><span class="item-name">Healthy Salad</span> x<span class="item-quantity">1</span></div>
                                        <div><span class="item-name">Green Tea</span> x<span class="item-quantity">1</span></div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="order-total">$15.50</span></td>
                            <td><span class="status-badge status-delivered">Delivered</span></td>
                            <td>2025-01-15 11:15</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-info" onclick="viewOrderDetails(1231)">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Order Details Modal -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Order Details</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="order-details">
                <div class="detail-row">
                    <span class="detail-label">Order ID:</span>
                    <span class="detail-value" id="modalOrderId">#1234</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Customer Name:</span>
                    <span class="detail-value" id="modalCustomerName">Ahmed Hassan</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Phone:</span>
                    <span class="detail-value" id="modalCustomerPhone">+20 123 456 7890</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Order Date:</span>
                    <span class="detail-value" id="modalOrderDate">2025-01-15 14:30</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status:</span>
                    <span class="detail-value" id="modalOrderStatus">Pending</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Total Amount:</span>
                    <span class="detail-value" id="modalOrderTotal">$34.97</span>
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
        function viewOrderDetails(orderId) {
            // In Phase 2, this will fetch real order data from database
            document.getElementById('modalOrderId').textContent = '#' + orderId;
            document.getElementById('modalCustomerName').textContent = 'Ahmed Hassan';
            document.getElementById('modalCustomerPhone').textContent = '+20 123 456 7890';
            document.getElementById('modalOrderDate').textContent = '2025-01-15 14:30';
            document.getElementById('modalOrderStatus').textContent = 'Pending';
            document.getElementById('modalOrderTotal').textContent = '$34.97';
            
            document.getElementById('orderModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('orderModal').style.display = 'none';
        }

        function confirmOrder(orderId) {
            if (confirm('Are you sure you want to confirm this order?')) {
                // In Phase 2, this will update order status in database
                alert('Order #' + orderId + ' confirmed! (Database integration will be added in Phase 2)');
            }
        }

        function cancelOrder(orderId) {
            if (confirm('Are you sure you want to cancel this order?')) {
                // In Phase 2, this will update order status in database
                alert('Order #' + orderId + ' cancelled! (Database integration will be added in Phase 2)');
            }
        }

        function updateOrderStatus(orderId, status) {
            const statusText = status.charAt(0).toUpperCase() + status.slice(1);
            if (confirm('Are you sure you want to update order status to ' + statusText + '?')) {
                // In Phase 2, this will update order status in database
                alert('Order #' + orderId + ' status updated to ' + statusText + '! (Database integration will be added in Phase 2)');
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('orderModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        // Filter functionality
        document.getElementById('statusFilter').addEventListener('change', function() {
            // In Phase 2, this will filter orders from database
            console.log('Filter by status:', this.value);
        });

        document.getElementById('dateFilter').addEventListener('change', function() {
            // In Phase 2, this will filter orders by date from database
            console.log('Filter by date:', this.value);
        });

        document.getElementById('searchOrder').addEventListener('input', function() {
            // In Phase 2, this will search orders in database
            console.log('Search:', this.value);
        });
    </script>
</body>
</html>