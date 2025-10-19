<?php
// app/views/loginView.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>miu-orders — Login</title>
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
      max-width:420px;
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

    .field{
      width:100%;
      margin-bottom:12px;
    }
    input[type="email"], input[type="password"]{
      width:100%;
      padding:12px 14px;
      border-radius:12px;
      border:1px solid #eee;
      box-sizing:border-box;
      font-size:15px;
      outline:none;
      transition:box-shadow .15s, border-color .15s;
    }
    input[type="email"]:focus, input[type="password"]:focus{
      border-color:var(--accent);
      box-shadow:0 6px 20px rgba(255,0,0,0.1);
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

    @media(min-width:720px){
      .hero{ padding:42px 32px 18px; }
      h1{ font-size:22px; }
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

        <h1 id="welcomeTitle">Hey there!</h1>
        <p class="lead">Log in to your miu-orders account to get personalized food recommendations and track your orders.</p>
      </div>

      <div class="illustration" aria-hidden="true">
        <div class="dot">🍔</div>
        <div class="dot">🍕</div>
        <div class="dot">🥤</div>
      </div>

      <div class="form">
        <form method="POST" action="">
          <div class="field">
            <label for="email" style="display:none;">Email</label>
            <input id="email" name="email" type="email" placeholder="Email address" required />
          </div>

          <div class="field">
            <label for="password" style="display:none;">Password</label>
            <input id="password" name="password" type="password" placeholder="Password" required />
          </div>

          <button type="submit" class="btn">Sign in</button>
        </form>

        <div class="minor">
          <span>Don't have an account? <a class="link" href="#">Create one</a></span>
        </div>

        <?php if (isset($message)): ?>
          <div class="message <?php echo (!empty($success) && $success) ? 'msg-success' : 'msg-error'; ?>">
            <?php echo htmlspecialchars($message); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
