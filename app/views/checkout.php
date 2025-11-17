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
    <link rel="stylesheet" href="styles/checkout.css">
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
            
            <form class="checkout-form" id="checkoutForm" method="POST" action="index.php?page=checkout">
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
        
        // Form submission: validate then submit to server
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

            // Submit the form to server. Server will redirect to OTP or Order Confirmation.
            this.submit();
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