<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles/header.css">
      <?php 
    if(!empty($pageTitle)): ?>
      <title>Talabat-MIU &bull; <?php echo $pageTitle; ?></title>

    <?php else : ?>
       <title>Talabat-MIU</title>
    <?php endif;?>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIwIiBoZWlnaHQ9IjQwIiB2aWV3Qm94PSIwIDAgMTIwIDQwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0xMCAxMEMxMCA0LjQ3NyAxNC40NzcgMCAyMCAwSDEwMGM1LjUyMyAwIDEwIDQuNDc3IDEwIDEwdjIwYzAgNS41MjMtNC40NzcgMTAtMTAgMTBIMjBjLTUuNTIzIDAtMTAtNC40NzctMTAtMTBWMTBaIiBmaWxsPSIjRTQwMDJCIi8+PHRleHQgeD0iNjAiIHk9IjI1IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE4IiBmb250LXdlaWdodD0iYm9sZCI+VEFMQUJBVDwvdGV4dD48L3N2Zz4=" alt="Talabat Logo">
                    <h1>miu-talabat</h1>
                </div>
                <!--
                <div class="search-bar">
                    <form class="search-form">
                        <input type="text" class="search-input" placeholder="Search for restaurants or dishes...">
                        <button type="submit" class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
-->
                <div class="user-actions">
                    <a href="index.php?page=login" class="action-btn">
                        <i class="far fa-user"></i>
                        <span>Sign In</span>
                    </a>
                    <a href="index.php?page=cart" class="action-btn">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Cart</span>
                    </a>
                </div>
            </div>
            
            <div class="header-nav">
                <div class="nav-links">
                    <?php if (!isset($pagekey)) $pagekey='';?>
    <a class="<?php if(!empty($pagekey)&& $pagekey ==='home')echo "active";?>" href="index.php?page=Home">Home</a>
    <a class="<?php if(!empty($pagekey)&& $pagekey ==='vendors')echo "active";?>" href="index.php?page=vendors">Vendors</a>
    <a class="<?php if(!empty($pagekey)&& $pagekey ==='deals')echo "active";?>" href="#">Deals</a>
                </div>
            </div>
        </div>
        
        <div class="promo-banner">
            <div class="container">
                <p>Great deals on your favorite meals! Order now</p>
            </div>
        </div>
    </header>