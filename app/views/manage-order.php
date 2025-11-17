<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders - Miu-Talabat Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="styles/manage-order.css">
       
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