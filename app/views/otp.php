<!-- views/otp_verification.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification - Talabat</title>
    <link rel="stylesheet" href="styles/otp.css">
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