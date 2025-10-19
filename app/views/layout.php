<?php

$page = $_GET['page'] ?? 'dashboard';
$pagePath = __DIR__ . "/pages/$page.php";
if (!file_exists($pagePath)) {
  $pagePath = __DIR__ . "/pages/dashboard.php";
}

$view = $_GET['view'] ?? 'navbar';

$toggleLink = "?page=$page&view=" . ($view === 'navbar' ? 'sidebar' : 'navbar');

$hotDeals = [
    [
        'title' => 'Cinnabon Special',
        'discount' => '40% OFF',
        'description' => 'Exclusive Cinnabon desserts and treats with amazing discounts',
        'image' => 'images/oreo.webp'],
    [
        'title' => 'Cinnabon Delights',
        'discount' => '30% OFF',
        'description' => 'Freshly baked cinnamon rolls with irresistible offers',
        'image' =>'images/cinna.webp'
    ],
    [
        'title' => 'Tbs Exclusive',
        'discount' => '25% OFF',
        'description' => 'Sneak a peek at our unique Tbs specials and deals',
        'image' => 'images/3rd.avif']
];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>miu-orders Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #fbf6f6ff;
      color: #333;
    }

    .container {
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 220px;
      background: #ff0b27ff;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 20px;
      height: 100vh;
    }

    .hidden {
      display: none;
    }

    .sidebar h2 {
      text-align: center;
      margin-top: 0;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      margin: 15px 0;
    }

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      display: block;
      padding: 10px;
      border-radius: 8px;
      transition: 0.3s;
    }

    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background: #c12300ff;
    }

    .sidebar .socials {
      text-align: center;
    }

    .sidebar .socials a {
      color: #dce2f7;
      margin: 0 5px;
      text-decoration: none;
      font-size: 13px;
    }

    .main-content {
      flex: 1;
      padding: 20px 40px;
      background: #fff;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #ff0b27ff;
      color: #fff;
      padding: 15px 25px;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    header nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 10px;
      font-weight: 500;
    }

    .profile {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .profile img {
      border-radius: 50%;
    }

    footer {
      text-align: center;
      padding: 15px;
      background: #f9f9f9;
      color: #555;
      font-size: 14px;
      border-top: 1px solid #eee;
      margin-top: 30px;
    }

    .search-container {
      flex: 1;
      max-width: 400px;
      margin: 0 20px;
    }

    .search-form {
      display: flex;
    }

    .search-input {
      flex: 1;
      padding: 10px 15px;
      border: none;
      border-radius: 20px 0 0 20px;
      font-size: 14px;
      outline: none;
    }

    .search-button {
      background: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 0 20px 20px 0;
      cursor: pointer;
      transition: background 0.3s;
    }

    .search-button:hover {
      background: #f0f0f0;
    }

    .hot-deals-section {
      margin: 30px 0;
      padding: 20px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(255, 11, 39, 0.1);
    }

    .section-title {
      color: #ff0b27ff;
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
      position: relative;
    }

    .section-title::after {
      content: '';
      display: block;
      width: 60px;
      height: 3px;
      background: #ff0b27ff;
      margin: 10px auto;
    }

    .deals-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
      margin-top: 20px;
    }

    .deal-card {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(255, 11, 39, 0.15);
      border: 2px solid #ffebee;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .deal-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(255, 11, 39, 0.2);
    }

    .deal-image {
      height: 200px;
      overflow: hidden;
    }

    .deal-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s;
    }

    .deal-card:hover .deal-image img {
      transform: scale(1.05);
    }

    .deal-content {
      padding: 20px;
      text-align: center;
    }

    .deal-badge {
      background: #ff0b27ff;
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 14px;
      display: inline-block;
      margin-bottom: 15px;
    }

    .deal-title {
      color: #333;
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .deal-description {
      color: #666;
      font-size: 14px;
      margin-bottom: 15px;
      line-height: 1.4;
    }

    .deal-button {
      background: #ff0b27ff;
      color: white;
      border: none;
      padding: 8px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 500;
      transition: background 0.3s;
    }

    .deal-button:hover {
      background: #c12300ff;
    }
<style>
/* Most-Loved Places Styles - UPDATED */
.most-loved-section {
  margin: 40px 0;
  padding: 25px;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(255, 11, 39, 0.1);
}

.most-loved-title {
  color: #ff0b27ff;
  font-size: 28px;
  text-align: center;
  margin-bottom: 25px;
  font-weight: 700;
}

.restaurants-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
  gap: 10px;
  justify-items: center;
  align-items: center;
}

.restaurant-card {
  text-align: center;
  transition: transform 0.3s;
  padding: 8px;
  border-radius: 8px;
  background: #fff;
  width: 100%;
}

.restaurant-card:hover {
  transform: translateY(-3px);
}

.restaurant-logo {
  width: 100px;
  height: 100px;
  border-radius: 8px;
  object-fit: contain;
  margin-bottom: 5px;
  border: 2px solid #ffebee;
  transition: border-color 0.3s;
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding: 5px;
  background: #fff;
}

.restaurant-card:hover .restaurant-logo {
  border-color: #ff0b27ff;
}

.restaurant-name {
  font-size: 13px;
  font-weight: 600;
  color: #333;
  margin: 0;
  line-height: 1.2;
}

@media (max-width: 768px) {
  .restaurants-grid {
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 8px;
  }
  
  .restaurant-logo {
    width: 90px;
    height: 90px;
  }
  
  .restaurant-name {
    font-size: 12px;
  }
}

@media (max-width: 480px) {
  .restaurants-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
  }
  
  .restaurant-logo {
    width: 100px;
    height: 100px;
  }
  
  .most-loved-section {
    padding: 20px;
  }
}
</style>
</head>
<body>

<?php if ($view === 'navbar'): ?>
<header>
  <div style="display:flex;align-items:center;gap:15px;">
    <a href="<?= $toggleLink ?>" style="color:#fff;text-decoration:none;font-size:24px;">☰</a>
    <h2 style="margin:0;">miu-orders</h2>
  </div>

  <div class="search-container">
    <form action="index.php" method="get" class="search-form">
      <input type="hidden" name="page" value="search">
      <input type="text" name="q" placeholder="Search deals, products, restaurants..." 
             class="search-input">
      <button type="submit" class="search-button">
        🔍
      </button>
    </form>
  </div>

  <form action="index.php" method="get">
    <input type="hidden" name="page" value="login">
    <button type="submit" style="background:none;border:none;cursor:pointer;font-size:20px;">👤</button>
  </form>
</header>


<div class="hot-deals-section">
  <h2 class="section-title">Today's Hot Deals</h2>
  <div class="deals-grid">
    <?php foreach ($hotDeals as $deal): ?>
    <div class="deal-card">
      <div class="deal-image">
        <img src="<?= $deal['image'] ?>" alt="<?= $deal['title'] ?>">
      </div>
      <div class="deal-content">
        <span class="deal-badge"><?= $deal['discount'] ?></span>
        <h3 class="deal-title"><?= $deal['title'] ?></h3>
        <p class="deal-description"><?= $deal['description'] ?></p>
        <button class="deal-button">Grab Deal</button>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>



<div class="main-content">
  <div class="page-content">
    <?php include $pagePath; ?>
  </div>
</div>

<?php else: ?>
<div class="container">
  <div class="sidebar">
    <h2>miu-orders</h2>
    <ul>
      <li><a href="?page=dashboard" class="<?= $page=='dashboard'?'active':'' ?>">Dashboard</a></li>
      <li><a href="?page=orders" class="<?= $page=='orders'?'active':'' ?>">Order</a></li>
      <li><a href="?page=products" class="<?= $page=='products'?'active':'' ?>">Product</a></li>
      <li><a href="?page=stock" class="<?= $page=='stock'?'active':'' ?>">Stock</a></li>
      <li><a href="?page=offers" class="<?= $page=='offers'?'active':'' ?>">Offer</a></li>
    </ul>

    <div class="socials">
      <a href="#">Facebook</a>
      <a href="#">Twitter</a>
      <a href="#">Google</a>
    </div>
  </div>

  <div class="main-content">
    <a href="<?= $toggleLink ?>" style="font-size:24px;text-decoration:none;color:#ff0b27ff;">☰</a>
   
    <div class="hot-deals-section">
      <h2 class="section-title">Today's Hot Deals</h2>
      <div class="deals-grid">
        <?php foreach ($hotDeals as $deal): ?>
        <div class="deal-card">
          <div class="deal-image">
            <img src="<?= $deal['image'] ?>" alt="<?= $deal['title'] ?>">
          </div>
          <div class="deal-content">
            <span class="deal-badge"><?= $deal['discount'] ?></span>
            <h3 class="deal-title"><?= $deal['title'] ?></h3>
            <p class="deal-description"><?= $deal['description'] ?></p>
            <button class="deal-button">Grab Deal</button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>


    <h2><?= ucfirst($page) ?></h2>
    <div class="page-content">
      <?php include $pagePath; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<footer>
  © <?= date('Y') ?> miu-orders Dashboard — All rights reserved.
</footer>

</body>
</html>