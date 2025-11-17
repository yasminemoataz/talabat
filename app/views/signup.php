<?php
// app/views/signupView.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>miu-orders — Sign Up</title>
  <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
  <div class="wrap">
    <div class="card" role="main" aria-labelledby="welcomeTitle">
      <div class="hero">
        <div class="brand" aria-hidden="true">
          <div class="logo-badge">miu</div>
          <div>
            <div style="font-weight:700; font-size:18px; color:#111;">miu-orders</div>
            <small>fast • local • tasty</small>
          </div>
        </div>

        <h1 id="welcomeTitle">Join miu-orders!</h1>
        <p class="lead">Create your account to start ordering delicious food from your favorite local restaurants.</p>
      </div>

      <div class="form">
        <form method="POST" action="?page=signup" id="signupForm">
          <div class="form-row">
            <div class="field">
              <label for="firstName" style="display:none;">First Name</label>
              <input id="firstName" name="firstName" type="text" placeholder="First name" required />
            </div>
            <div class="field">
              <label for="lastName" style="display:none;">Last Name</label>
              <input id="lastName" name="lastName" type="text" placeholder="Last name" required />
            </div>
          </div>

          <div class="field">
            <label for="email" style="display:none;">Email</label>
            <input id="email" name="email" type="email" placeholder="Email address" required />
            <span class="validation-message" id="emailMessage"></span>
          </div>

          <div class="field">
            <label for="phone" style="display:none;">Phone Number</label>
            <input id="phone" name="phone" type="tel" placeholder="Phone number" />
          </div>

          <div class="field">
            <label for="password" style="display:none;">Password</label>
            <input id="password" name="password" type="password" placeholder="Password" required />
            <div class="password-strength">
              <div class="password-strength-meter" id="passwordStrength"></div>
            </div>
            <span class="validation-message" id="passwordMessage"></span>
          </div>

          <div class="field">
            <label for="confirmPassword" style="display:none;">Confirm Password</label>
            <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm password" required />
            <span class="validation-message" id="confirmPasswordMessage"></span>
          </div>

          <div class="terms">
            <input type="checkbox" id="terms" name="terms" required />
            <label for="terms">
              I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
            </label>
          </div>

          <button type="submit" class="btn" id="submitBtn">Create Account</button>
        </form>

        <div class="minor">
          <span>Already have an account? <a class="link" href="?page=login">Log in</a></span>
        </div>

        <?php if (isset($message)): ?>
          <div class="message <?php echo (!empty($success) && $success) ? 'msg-success' : 'msg-error'; ?>">
            <?php echo htmlspecialchars($message); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const emailInput = document.getElementById('email');
      const passwordInput = document.getElementById('password');
      const confirmPasswordInput = document.getElementById('confirmPassword');
      const submitBtn = document.getElementById('submitBtn');
      const emailMessage = document.getElementById('emailMessage');
      const passwordMessage = document.getElementById('passwordMessage');
      const confirmPasswordMessage = document.getElementById('confirmPasswordMessage');
      const passwordStrength = document.getElementById('passwordStrength');
      
      // Password requirement elements
      const lengthReq = document.getElementById('lengthReq');
      const uppercaseReq = document.getElementById('uppercaseReq');
      const lowercaseReq = document.getElementById('lowercaseReq');
      const numberReq = document.getElementById('numberReq');
      const specialReq = document.getElementById('specialReq');
      
      // Email validation
      emailInput.addEventListener('input', validateEmail);
      emailInput.addEventListener('blur', validateEmail);
      
      // Password validation
      passwordInput.addEventListener('input', function() {
        validatePassword();
        updatePasswordStrength();
        validatePasswordMatch();
      });
      
      // Confirm password validation
      confirmPasswordInput.addEventListener('input', validatePasswordMatch);
      
      // Form submission
      document.getElementById('signupForm').addEventListener('submit', function(e) {
        if (!validateForm()) {
          e.preventDefault();
        }
      });
      
      function validateEmail() {
        const email = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email === '') {
          setValidationState(emailInput, emailMessage, false, 'Email is required');
          return false;
        } else if (!emailRegex.test(email)) {
          setValidationState(emailInput, emailMessage, false, 'Please enter a valid email address');
          return false;
        } else {
          setValidationState(emailInput, emailMessage, true, 'Email looks good!');
          return true;
        }
      }
      
      function validatePassword() {
        const password = passwordInput.value;
        let isValid = true;
        let message = '';
        
        // Check minimum length
        if (password.length < 8) {
          isValid = false;
          message = 'Password must be at least 8 characters';
        }
        
        // Check for uppercase
        if (!/(?=.*[A-Z])/.test(password)) {
          isValid = false;
          if (message) message += ', uppercase letter';
          else message = 'Password must contain at least one uppercase letter';
        }
        
        // Check for lowercase
        if (!/(?=.*[a-z])/.test(password)) {
          isValid = false;
          if (message) message += ', lowercase letter';
          else message = 'Password must contain at least one lowercase letter';
        }
        
        // Check for number
        if (!/(?=.*\d)/.test(password)) {
          isValid = false;
          if (message) message += ', number';
          else message = 'Password must contain at least one number';
        }
        
        // Check for special character
        if (!/(?=.*[@$!%*?&])/.test(password)) {
          isValid = false;
          if (message) message += ', special character';
          else message = 'Password must contain at least one special character';
        }
        
        if (isValid) {
          setValidationState(passwordInput, passwordMessage, true, 'Password meets all requirements');
        } else {
          setValidationState(passwordInput, passwordMessage, false, message);
        }
        
        return isValid;
      }
      
      function updatePasswordStrength() {
        const password = passwordInput.value;
        let strength = 0;
        
        // Update requirement indicators
        updateRequirement(lengthReq, password.length >= 8);
        updateRequirement(uppercaseReq, /(?=.*[A-Z])/.test(password));
        updateRequirement(lowercaseReq, /(?=.*[a-z])/.test(password));
        updateRequirement(numberReq, /(?=.*\d)/.test(password));
        updateRequirement(specialReq, /(?=.*[@$!%*?&])/.test(password));
        
        // Calculate strength
        if (password.length >= 8) strength += 1;
        if (/(?=.*[A-Z])/.test(password)) strength += 1;
        if (/(?=.*[a-z])/.test(password)) strength += 1;
        if (/(?=.*\d)/.test(password)) strength += 1;
        if (/(?=.*[@$!%*?&])/.test(password)) strength += 1;
        
        // Update strength meter
        passwordStrength.className = 'password-strength-meter';
        if (strength <= 1) {
          passwordStrength.classList.add('strength-weak');
        } else if (strength <= 2) {
          passwordStrength.classList.add('strength-fair');
        } else if (strength <= 3) {
          passwordStrength.classList.add('strength-good');
        } else {
          passwordStrength.classList.add('strength-strong');
        }
      }
      
      function updateRequirement(element, isMet) {
        if (isMet) {
          element.classList.remove('unmet');
          element.classList.add('met');
          element.querySelector('.requirement-icon').textContent = '✓';
        } else {
          element.classList.remove('met');
          element.classList.add('unmet');
          element.querySelector('.requirement-icon').textContent = '•';
        }
      }
      
      function validatePasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        
        if (confirmPassword === '') {
          setValidationState(confirmPasswordInput, confirmPasswordMessage, false, 'Please confirm your password');
          return false;
        } else if (password !== confirmPassword) {
          setValidationState(confirmPasswordInput, confirmPasswordMessage, false, 'Passwords do not match');
          return false;
        } else {
          setValidationState(confirmPasswordInput, confirmPasswordMessage, true, 'Passwords match');
          return true;
        }
      }
      
      function setValidationState(input, messageElement, isValid, message) {
        if (isValid) {
          input.classList.remove('invalid');
          input.classList.add('valid');
          messageElement.textContent = message;
          messageElement.className = 'validation-message success';
        } else {
          input.classList.remove('valid');
          input.classList.add('invalid');
          messageElement.textContent = message;
          messageElement.className = 'validation-message error';
        }
      }
      
      function validateForm() {
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        const isPasswordMatchValid = validatePasswordMatch();
        const isTermsChecked = document.getElementById('terms').checked;
        
        if (!isTermsChecked) {
          alert('Please agree to the Terms of Service and Privacy Policy');
          return false;
        }
        
        return isEmailValid && isPasswordValid && isPasswordMatchValid;
      }
    });
  </script>
</body>
</html>