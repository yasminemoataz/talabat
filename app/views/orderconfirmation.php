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
            <p><strong>Order ID:</strong> <?php echo $orderDetails['order_id']; ?></p>
            <p><strong>Restaurant:</strong> <?php echo $orderDetails['restaurant_name']; ?></p>
            <p><strong>Delivery Address:</strong> <?php echo $orderDetails['delivery_address']; ?></p>
            <p><strong>Total Amount:</strong> EGP <?php echo $orderDetails['total_amount']; ?></p>
            <p><strong>Payment Method:</strong> <?php echo ucfirst($orderDetails['payment_method']); ?></p>
        </div>
        
        <div style="text-align: center;">
            <a href="index.php" style="background: #e4002b; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
                Back to Home
            </a>
        </div>
    </div>
</body>
</html>