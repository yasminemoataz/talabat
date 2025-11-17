<?php
// app/views/loginView.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>miu-orders — Login</title>
  <link rel="stylesheet" href="styles/loginView.css">
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

          <button type="submit" class="btn">Log in </button>
        </form>

      <div class="minor">
  <span>Don't have an account? <a class="link" href="index.php?page=signup">Create one</a></span>
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
