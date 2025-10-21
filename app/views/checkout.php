<?php
// Start session if not already started
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
    <title>Checkout - MIU Talabat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .checkout-header {
            background: #d70000;
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .checkout-title {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .checkout-box {
            background: white;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .checkout-steps {
            display: flex;
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .step {
            flex: 1;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            color: #666;
        }
        
        .step.active {
            color: #d70000;
            border-bottom: 3px solid #d70000;
        }
        
        .checkout-form {
            padding: 30px;
        }
        
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: #d70000;
            margin-bottom: 20px;
            font-size: 1.3rem;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        
        input[type="text"],
        input[type="tel"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus {
            border-color: #d70000;
            outline: none;
        }
        
        .payment-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .payment-option {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .payment-option:hover {
            border-color: #d70000;
        }
        
        .payment-option.selected {
            border-color: #d70000;
            background: #fff5f5;
        }
        
        .payment-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #666;
        }
        
        .payment-option.selected .payment-icon {
            color: #d70000;
        }
        
        .card-fields {
            display: none;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            border-left: 4px solid #d70000;
        }
        
        .card-fields.show {
            display: block;
        }
        
        .card-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 15px;
        }
        
        .order-summary {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .summary-total {
            font-weight: bold;
            font-size: 1.2rem;
            color: #d70000;
            border-top: 2px solid #e0e0e0;
            padding-top: 10px;
            margin-top: 10px;
        }
        
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: #d70000;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            text-align: center;
            font-size: 16px;
        }
        
        .btn:hover {
            background: #b30000;
        }
        
        .btn-secondary {
            background: #666;
        }
        
        .btn-secondary:hover {
            background: #555;
        }
        
        .btn-full {
            width: 100%;
            margin-top: 20px;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .card-row {
                grid-template-columns: 1fr;
            }
            
            .payment-options {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="checkout-header">
            <h1 class="checkout-title">Checkout</h1>
            <p>Complete your order</p>
        </div>
        
        <div class="checkout-box">
            <div class="checkout-steps">
                <div class="step active">1. Information</div>
                <div class="step">2. Payment</div>
                <div class="step">3. Confirmation</div>
            </div>
            
            <form class="checkout-form" id="checkoutForm">
                <!-- Personal Information Section -->
                <div class="form-section">
                    <h2 class="section-title">Personal Information</h2>
                    
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your full name">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="form-section">
                    <h2 class="section-title">Order Summary</h2>
                    <div class="order-summary">
                        <?php if (!empty($cartItems)): ?>
                            <?php foreach ($cartItems as $id => $item): ?>
                                <div class="summary-item">
                                    <span><?php echo htmlspecialchars($item['name']); ?> x <?php echo $item['quantity']; ?></span>
                                    <span>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                                </div>
                            <?php endforeach; ?>
                            <div class="summary-item summary-total">
                                <span>Total</span>
                                <span>$<?php echo number_format($total + 2.99 + 1.50, 2); ?></span>
                            </div>
                        <?php else: ?>
                            <p>Your cart is empty</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Payment Method Section -->
                <div class="form-section">
                    <h2 class="section-title">Payment Method</h2>
                    
                    <div class="payment-options">
                        <div class="payment-option" data-method="cash">
                            <div class="payment-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div>Cash on Delivery</div>
                        </div>
                        
                        <div class="payment-option" data-method="credit">
                            <div class="payment-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div>Credit Card</div>
                        </div>
                        
                        <div class="payment-option" data-method="apple">
                            <div class="payment-icon">
                                <i class="fab fa-apple-pay"></i>
                            </div>
                            <div>Apple Pay</div>
                        </div>
                    </div>
                    
                    <input type="hidden" id="paymentMethod" name="payment_method" value="">
                    
                    <!-- Credit Card Fields (Hidden by default) -->
                    <div class="card-fields" id="cardFields">
                        <div class="form-group">
                            <label for="cardNumber">Card Number *</label>
                            <input type="text" id="cardNumber" name="card_number" placeholder="1234 5678 9012 3456">
                        </div>
                        
                        <div class="card-row">
                            <div class="form-group">
                                <label for="cardName">Name on Card *</label>
                                <input type="text" id="cardName" name="card_name" placeholder="John Doe">
                            </div>
                            
                            <div class="form-group">
                                <label for="expiryDate">Expiry Date *</label>
                                <input type="text" id="expiryDate" name="expiry_date" placeholder="MM/YY">
                            </div>
                            
                            <div class="form-group">
                                <label for="cvv">CVV *</label>
                                <input type="number" id="cvv" name="cvv" placeholder="123">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="button-group">
                    <a href="?page=cart" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Cart
                    </a>
                    
                    <button type="submit" class="btn btn-full">
                        <i class="fas fa-lock"></i> Continue to Payment
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Payment method selection
        document.querySelectorAll('.payment-option').forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                document.querySelectorAll('.payment-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Set hidden input value
                const method = this.getAttribute('data-method');
                document.getElementById('paymentMethod').value = method;
                
                // Show/hide card fields
                const cardFields = document.getElementById('cardFields');
                if (method === 'credit') {
                    cardFields.classList.add('show');
                    // Make card fields required
                    document.querySelectorAll('#cardFields input').forEach(input => {
                        input.required = true;
                    });
                } else {
                    cardFields.classList.remove('show');
                    // Remove required from card fields
                    document.querySelectorAll('#cardFields input').forEach(input => {
                        input.required = false;
                    });
                }
            });
        });
        
        // Form submission
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate payment method selected
            const paymentMethod = document.getElementById('paymentMethod').value;
            if (!paymentMethod) {
                alert('Please select a payment method');
                return;
            }
            
            // If credit card selected, validate card fields
            if (paymentMethod === 'credit') {
                const cardNumber = document.getElementById('cardNumber').value;
                const cardName = document.getElementById('cardName').value;
                const expiryDate = document.getElementById('expiryDate').value;
                const cvv = document.getElementById('cvv').value;
                
                if (!cardNumber || !cardName || !expiryDate || !cvv) {
                    alert('Please fill in all card details');
                    return;
                }
            }
            
            // Redirect to OTP page
            window.location.href = '?page=otp';
        });
        
        // Format card number input
        document.getElementById('cardNumber').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ');
            if (formattedValue) {
                e.target.value = formattedValue;
            }
        });
        
        // Format expiry date input
        document.getElementById('expiryDate').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });
    </script>
</body>
</html>