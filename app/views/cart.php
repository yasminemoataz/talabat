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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles/cart.css">
</head>
<body>
    <!-- Header matching Talabat design -->
    <header class="talabat-header">
        <div class="header-content">
            <div class="logo">TALABAT</div>
            <nav class="nav-links">
                <a href="?page=home"><i class="fas fa-home"></i> Home</a>
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
                    <a href="?page=vendors" class="talabat-btn" style="margin-top: 20px;">
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
                    
                    <div class="summary-row total-row">
                        <span>Total Amount:</span>
                        <span>EGP<?php echo number_format($total, 2); ?></span>
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
                            
                          <a href="index.php?page=checkout" class="checkout-btn" style="display: block; text-decoration: none; color: white;">
    <i class="fas fa-lock"></i> Proceed to Checkout
</a>
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