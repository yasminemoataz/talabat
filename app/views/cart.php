<?php
// Start session and get cart items
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cartItems = $_SESSION['cart'] ?? [];
$total = 0;

foreach ($cartItems as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIU Talabat - Your Cart</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header matching Talabat design */
        .talabat-header {
            background: #d70000;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: white;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background 0.3s;
            font-weight: 500;
        }

        .nav-links a:hover {
            background: rgba(255,255,255,0.2);
        }

        /* Cart Box Styling */
        .cart-box {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border: 1px solid #e0e0e0;
        }

        .page-title {
            color: #d70000;
            margin-bottom: 30px;
            font-size: 2.2rem;
            font-weight: bold;
            text-align: center;
        }

        /* Empty Cart State */
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .empty-cart-icon {
            font-size: 4rem;
            color: #d70000;
            margin-bottom: 20px;
        }

        .empty-cart h3 {
            margin-bottom: 15px;
            color: #333;
            font-size: 1.5rem;
        }

        .talabat-btn {
            display: inline-block;
            background: #d70000;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            text-align: center;
        }

        .talabat-btn:hover {
            background: #b30000;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(215, 0, 0, 0.3);
        }

        /* Cart Items */
        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .cart-item:hover {
            border-color: #d70000;
            transform: translateY(-2px);
        }

        .item-image {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #d70000, #ff4444);
            border-radius: 10px;
            margin-right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .item-price {
            color: #d70000;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 10px 0;
        }

        .quantity-btn {
            background: #d70000;
            color: white;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .quantity-btn:hover:not(:disabled) {
            background: #b30000;
            transform: scale(1.1);
        }

        .quantity-btn:disabled {
            background: #cccccc;
            cursor: not-allowed;
        }

        .quantity-display {
            font-size: 1.1rem;
            font-weight: bold;
            min-width: 35px;
            text-align: center;
            color: #333;
        }

        .item-total {
            font-size: 1.2rem;
            font-weight: bold;
            color: #d70000;
            margin: 0 20px;
        }

        .remove-btn {
            background: #ff4444;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .remove-btn:hover {
            background: #cc0000;
            transform: translateY(-1px);
        }

        /* Cart Summary Box */
        .cart-summary-box {
            background: white;
            border: 2px solid #d70000;
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            box-shadow: 0 4px 12px rgba(215, 0, 0, 0.1);
        }

        .summary-title {
            color: #d70000;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 1.1rem;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .total-row {
            font-size: 1.4rem;
            font-weight: bold;
            color: #d70000;
            border-top: 2px solid #d70000;
            padding-top: 15px;
            margin-top: 15px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .action-buttons .talabat-btn {
            flex: 1;
            min-width: 200px;
            padding: 15px 25px;
            font-size: 1.1rem;
        }

        .secondary-btn {
            background: #666;
        }

        .secondary-btn:hover {
            background: #555;
        }

        .checkout-section {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 2px solid #e9ecef;
        }

        .checkout-btn {
            background: linear-gradient(135deg, #d70000, #ff4444);
            color: white;
            border: none;
            padding: 18px 40px;
            font-size: 1.3rem;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .checkout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(215, 0, 0, 0.4);
        }

        /* Clear Cart Button */
        .clear-cart-btn {
            background: transparent;
            color: #d70000;
            border: 2px solid #d70000;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .clear-cart-btn:hover {
            background: #d70000;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .item-image {
                margin-right: 0;
            }

            .quantity-controls {
                justify-content: center;
            }

            .item-total {
                margin: 10px 0;
            }

            .remove-btn {
                margin-left: 0;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .talabat-btn {
                min-width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header matching Talabat design -->
    <header class="talabat-header">
        <div class="header-content">
            <div class="logo">TALABAT</div>
            <nav class="nav-links">
                <a href="?page=home"><i class="fas fa-home"></i> Home</a>
                <a href="?page=cart"><i class="fas fa-shopping-cart"></i> Cart</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <!-- Main Cart Box -->
        <div class="cart-box">
            <h1 class="page-title">Your Shopping Cart</h1>
            
            <?php if (empty($cartItems)): ?>
                <div class="empty-cart">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Your cart is empty</h3>
                    <p>Add some delicious items to get started!</p>
                    <a href="?page=home" class="talabat-btn" style="margin-top: 20px;">
                        <i class="fas fa-utensils"></i> Start Ordering
                    </a>
                </div>
            <?php else: ?>
                <!-- Cart Items -->
                <div class="cart-items">
                    <?php foreach ($cartItems as $id => $item): ?>
                        <div class="cart-item">
                            <div class="item-image">
                                <i class="fas fa-utensils"></i>
                            </div>
                            
                            <div class="item-details">
                                <div class="item-name"><?php echo htmlspecialchars($item['name']); ?></div>
                                <div class="item-price">$<?php echo number_format($item['price'], 2); ?> each</div>
                                
                                <div class="quantity-controls">
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="action" value="decrease">
                                        <button type="submit" class="quantity-btn" <?php echo $item['quantity'] <= 1 ? 'disabled' : ''; ?>>
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </form>
                                    
                                    <span class="quantity-display"><?php echo $item['quantity']; ?></span>
                                    
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="action" value="increase">
                                        <button type="submit" class="quantity-btn">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="item-total">
                                $<?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                            </div>
                            
                            <form method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="action" value="remove">
                                <button type="submit" class="remove-btn" onclick="return confirm('Remove this item from cart?')">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Cart Summary Box -->
                <div class="cart-summary-box">
                    <h2 class="summary-title">Order Summary</h2>
                    
                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span>$<?php echo number_format($total, 2); ?></span>
                    </div>
                    
                    <div class="summary-row">
                        <span>Delivery Fee:</span>
                        <span>$2.99</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>Service Fee:</span>
                        <span>$1.50</span>
                    </div>
                    
                    <div class="summary-row total-row">
                        <span>Total Amount:</span>
                        <span>$<?php echo number_format($total + 2.99 + 1.50, 2); ?></span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="?page=home" class="talabat-btn secondary-btn">
                            <i class="fas fa-arrow-left"></i> Continue Shopping
                        </a>
                        
                        <form method="POST" style="display: inline; flex: 1;">
                            <input type="hidden" name="action" value="clear">
                            <button type="submit" class="clear-cart-btn" onclick="return confirm('Clear entire cart?')">
                                <i class="fas fa-broom"></i> Clear Cart
                            </button>
                        </form>
                    </div>

                    <!-- Checkout Section with Home Button -->
                    <div class="checkout-section">
                        <div class="action-buttons">
                            <a href="?page=home" class="talabat-btn secondary-btn">
                                <i class="fas fa-home"></i> Back to Home
                            </a>
                            
                            <button class="talabat-btn checkout-btn">
                                <i class="fas fa-lock"></i> Proceed to Checkout
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Add smooth animations
        document.addEventListener('DOMContentLoaded', function() {
            const cartItems = document.querySelectorAll('.cart-item');
            cartItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    item.style.transition = 'all 0.5s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>