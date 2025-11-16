<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed - Talabat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .confirmation-container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .success-header {
            background: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }
        .order-info {
            margin: 20px 0;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
        }
        .estimated-time {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <div class="success-header">
            <h1>✅ Order Confirmed!</h1>
            <p>Thank you for your order</p>
        </div>
        <div class="estimated-time">
            <h2>Estimated Delivery Time</h2>
            <p style="font-size: 24px; font-weight: bold; color: #e4002b;">
                <?php echo $estimatedTime; ?>
            </p>
        </div>

        <div class="order-info">
            <h3>Order Details</h3>
            <p><strong>Order ID:</strong> <?php echo htmlspecialchars($orderDetails['order_id']); ?></p>
            <p><strong>Restaurant:</strong> <?php echo htmlspecialchars($orderDetails['restaurant_name']); ?></p>
            <p><strong>Payment Method:</strong> <?php echo ucfirst(htmlspecialchars($orderDetails['payment_method'])); ?></p>

            <?php if (!empty($orderDetails['items'])): ?>
                <h4 style="margin-top: 15px;">Items</h4>
                <div style="text-align: left;">
                    <?php foreach ($orderDetails['items'] as $it): ?>
                        <div style="display:flex; justify-content:space-between; padding:6px 0; border-bottom:1px dashed #eee;">
                            <div><?php echo htmlspecialchars($it['name'] ?? 'Item'); ?> x <?php echo (int)($it['quantity'] ?? 1); ?></div>
                            <div>EGP <?php echo number_format((float)($it['price'] ?? 0) * (int)($it['quantity'] ?? 1), 2); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div style="margin-top:12px;">
                    <div style="display:flex; justify-content:space-between; margin-top:8px; font-size:18px;"><strong>Total</strong><span style="color:#e4002b"><strong>EGP <?php echo $orderDetails['total_amount']; ?></strong></span></div>
                </div>
            <?php else: ?>
                <p><strong>Total Amount:</strong> EGP <?php echo $orderDetails['total_amount']; ?></p>
            <?php endif; ?>
        </div>
        
        <div style="text-align: center;">
            <a href="index.php" style="background: #e4002b; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
                Back to Home
            </a>
        </div>
    </div>
</body>
</html>