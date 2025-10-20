<?php
// app/views/signupView.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>miu-orders — Sign Up</title>
  <style>
    :root{
      --accent:#ff0000;     
      --accent-2:#ff4d4d;   
      --bg:#fff5f5;         
      --card:#ffffff;
      --muted:#666;
      --radius:14px;
      --gap:14px;
      font-family: "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    html,body{height:100%;margin:0;background:var(--bg);}

    .wrap{
      min-height:100%;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:22px;
      box-sizing:border-box;
    }

    .card{
      width:100%;
      max-width:440px;
      background:var(--card);
      border-radius:20px;
      box-shadow:0 10px 30px rgba(0, 0, 0, 0.08);
      overflow:hidden;
    }

    .hero{
      padding:36px 26px 12px;
      background:linear-gradient(180deg, rgba(255, 0, 0, 0.06), transparent 60%);
      text-align:center;
    }

    .brand {
      display:inline-flex;
      align-items:center;
      gap:10px;
      margin-bottom:14px;
    }
    .logo-badge{
      background:var(--accent);
      color:white;
      font-weight:700;
      padding:10px 14px;
      border-radius:10px;
      font-size:20px;
      letter-spacing:.5px;
    }
    .brand small{
      display:block;
      font-size:12px;
      color:var(--muted);
      margin-top:-6px;
    }

    h1{
      margin:6px 0 6px;
      font-size:20px;
      color:#111;
    }
    p.lead{
      margin:0;
      font-size:13px;
      color:var(--muted);
      padding:0 12px 12px;
    }

    .form {
      padding:18px 20px 28px;
    }

    .form-row {
      display: flex;
      gap: 12px;
      margin-bottom: 12px;
    }

    .form-row .field {
      flex: 1;
    }

    .field{
      width:100%;
      margin-bottom:12px;
    }
    input[type="text"], input[type="email"], input[type="password"], input[type="tel"]{
      width:100%;
      padding:12px 14px;
      border-radius:12px;
      border:1px solid #eee;
      box-sizing:border-box;
      font-size:15px;
      outline:none;
      transition:box-shadow .15s, border-color .15s;
    }
    input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="tel"]:focus{
      border-color:var(--accent);
      box-shadow:0 6px 20px rgba(255,0,0,0.1);
    }

    .terms {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin: 16px 0;
      font-size: 13px;
      color: var(--muted);
    }

    .terms input[type="checkbox"] {
      margin-top: 2px;
      accent-color: var(--accent);
    }

    .terms a {
      color: var(--accent);
      text-decoration: none;
      font-weight: 600;
    }

    .btn {
      width:100%;
      padding:12px;
      border-radius:12px;
      background:linear-gradient(90deg,var(--accent),var(--accent-2));
      color:white;
      border:0;
      font-weight:600;
      font-size:15px;
      cursor:pointer;
      margin-top:6px;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(255, 0, 0, 0.2);
    }

    .minor{
      text-align:center;
      font-size:13px;
      color:var(--muted);
      margin-top:12px;
    }
    .link{
      color:var(--accent);
      text-decoration:none;
      font-weight:600;
    }

    .message{
      margin:10px 0 0;
      padding:10px 12px;
      border-radius:10px;
      font-size:14px;
    }
    .msg-success{ background: #eaf8f0; color:#0a7a4a; }
    .msg-error  { background: #fff1f0; color:#a42b2b; }

    .illustration{
      display:flex;
      justify-content:space-around;
      gap:8px;
      padding:10px 22px 18px;
    }
    .illustration .dot{
      width:44px;
      height:44px;
      border-radius:10px;
      background:linear-gradient(180deg,var(--accent),var(--accent-2));
      opacity:0.95;
      box-shadow:0 6px 20px rgba(0,0,0,0.06);
      display:flex;
      align-items:center;
      justify-content:center;
      color:white;
      font-weight:700;
      font-size:18px;
    }

    .password-strength {
      margin-top: 4px;
      font-size: 12px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .strength-bar {
      flex: 1;
      height: 4px;
      background: #eee;
      border-radius: 2px;
      overflow: hidden;
    }

    .strength-fill {
      height: 100%;
      width: 0%;
      transition: width 0.3s, background 0.3s;
    }

    .strength-weak { width: 33%; background: #ff4444; }
    .strength-medium { width: 66%; background: #ffaa00; }
    .strength-strong { width: 100%; background: #00c851; }

    @media(min-width:720px){
      .hero{ padding:42px 32px 18px; }
      h1{ font-size:22px; }
    }

    @media(max-width: 480px) {
      .form-row {
        flex-direction: column;
        gap: 0;
      }
    }
  </style>
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
          </div>

          <div class="field">
            <label for="phone" style="display:none;">Phone Number</label>
            <input id="phone" name="phone" type="tel" placeholder="Phone number" />
          </div>

          <div class="field">
            <label for="password" style="display:none;">Password</label>
            <input id="password" name="password" type="password" placeholder="Password" required />
            <div class="password-strength">
              <span>Strength:</span>
              <div class="strength-bar">
                <div class="strength-fill" id="strengthFill"></div>
              </div>
              <span id="strengthText">-</span>
            </div>
          </div>

          <div class="field">
            <label for="confirmPassword" style="display:none;">Confirm Password</label>
            <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm password" required />
          </div>

          <div class="terms">
            <input type="checkbox" id="terms" name="terms" required />
            <label for="terms">
              I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
            </label>
          </div>

          <button type="submit" class="btn">Create Account</button>
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
    // Password strength indicator
    const passwordInput = document.getElementById('password');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');

    passwordInput.addEventListener('input', function() {
      const password = this.value;
      let strength = 0;
      
      // Length check
      if (password.length >= 8) strength += 1;
      
      // Contains lowercase
      if (/[a-z]/.test(password)) strength += 1;
      
      // Contains uppercase
      if (/[A-Z]/.test(password)) strength += 1;
      
      // Contains numbers
      if (/[0-9]/.test(password)) strength += 1;
      
      // Contains special characters
      if (/[^A-Za-z0-9]/.test(password)) strength += 1;

      // Update strength indicator
      strengthFill.className = 'strength-fill';
      if (password.length === 0) {
        strengthText.textContent = '-';
      } else if (strength <= 2) {
        strengthFill.classList.add('strength-weak');
        strengthText.textContent = 'Weak';
      } else if (strength <= 4) {
        strengthFill.classList.add('strength-medium');
        strengthText.textContent = 'Medium';
      } else {
        strengthFill.classList.add('strength-strong');
        strengthText.textContent = 'Strong';
      }
    });

    // Form validation
    document.getElementById('signupForm').addEventListener('submit', function(e) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      
      if (password !== confirmPassword) {
        e.preventDefault();
        alert('Passwords do not match!');
        return false;
      }
      
      if (!document.getElementById('terms').checked) {
        e.preventDefault();
        alert('Please agree to the Terms of Service and Privacy Policy');
        return false;
      }
    });
  </script>
</body>
</html>