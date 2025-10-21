<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIU Talabat - Cart</title>
    <style>
        .cart-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .cart-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .cart-btn {
            background: #4ecdc4;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .remove-btn {
            background: #ff4757;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- You can reuse your existing header here -->
    <header>
        <h1>MIU Talabat 🛒</h1>
        <nav>
            <a href="?page=home">Home</a>
            <a href="?page=cart" class="cart-btn">Cart</a>
        </nav>
    </header>

    <div class="cart-container">
        <h2>Your Shopping Cart</h2>
        
        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty</p>
            <a href="?page=home" class="cart-btn">Continue Shopping</a>
        <?php else: ?>
            <div class="cart-items">
                <?php foreach ($cartItems as $id => $item): ?>
                    <div class="cart-item">
                        <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                        <p>Price: $<?php echo $item['price']; ?></p>
                        <p>Quantity: <?php echo $item['quantity']; ?></p>
                        <p><strong>Total: $<?php echo number_format($item['price'] * $item['quantity'], 2); ?></strong></p>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                            <button type="submit" name="remove_from_cart" class="remove-btn">Remove</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="cart-summary">
                <h3>Total: $<?php echo number_format($total, 2); ?></h3>
                <button class="cart-btn">Checkout</button>
                <a href="?page=home" class="cart-btn">Continue Shopping</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>