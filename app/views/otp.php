<!-- views/otp_verification.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification - Talabat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .otp-container {
            max-width: 400px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .logo {
            color: #e4002b;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .otp-input {
            width: 50px;
            height: 50px;
            margin: 10px 5px;
            text-align: center;
            font-size: 18px;
            border: 2px solid #ddd;
            border-radius: 4px;
        }
        .verify-btn {
            background-color: #e4002b;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            width: 100%;
        }
        .verify-btn:hover {
            background-color: #c40024;
        }
        .message {
            margin: 15px 0;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="otp-container">
        <div class="logo">Talabat-MIU</div>
        <h2>OTP Verification Required</h2>
        <?php if (!empty($error)) { echo '<p style="color: red;">' . htmlspecialchars($error) . '</p>'; } ?>
        <?php if (!empty($_SESSION['last_payment_received'])) { echo '<p style="color: #444; font-size: 0.9rem;">(Debug) last payment received: ' . htmlspecialchars($_SESSION['last_payment_received']) . '</p>'; } ?>

        <form method="POST" action="index.php?page=otp">      
          <div>
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]">
                <input type="hidden" name="otp" id="full-otp">
            </div>
            
            <button type="submit" class="verify-btn" >Verify OTP</button>
        </form>
        
       
    </div>

    <script>
        // Auto-focus and navigation between OTP inputs
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.otp-input');
            const hiddenInput = document.getElementById('full-otp');
            
            // Focus first input
            inputs[0].focus();
            
            inputs.forEach((input, index) => {
                input.addEventListener('input', function(e) {
                    // Auto-tab to next input
                    if (this.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                    updateHiddenOTP();
                });
                
                input.addEventListener('keydown', function(e) {
                    // Handle backspace
                    if (e.key === 'Backspace' && this.value === '' && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });
            
            function updateHiddenOTP() {
                let otp = '';
                inputs.forEach(input => {
                    otp += input.value;
                });
                hiddenInput.value = otp;
            }
        });
    </script>
</body>
</html>