<?php
$pageTitle = 'Vendors';
$pagekey = 'vendors';
 include __DIR__ . '/../header.php'; 
// Add session start for cart functionality
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $vendor['name']; ?> - MIU Eats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="styles/mycorner.css">
</head>
<body>
   

    <!-- VENDOR MENU CONTENT -->
    <main class="container">
        <!-- Vendor Header -->
        <div class="vendor-header">
            <div class="vendor-header-content">
                <div class="vendor-image">
                    <img src="images/mycorner.jpg" alt="<?php echo $vendor['name']; ?>" 
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="vendor-image-box" style="display: none;">
                        MyCorner
                    </div>
                </div>
                <div class="vendor-info">
                    <h1 class="vendor-name"><?php echo $vendor['name']; ?></h1>
                    <p class="vendor-description"><?php echo $vendor['description']; ?></p>
                    <div class="vendor-meta">
                        <span class="meta-item">⭐ <?php echo $vendor['rating']; ?> Rating</span>
                        <span class="meta-item">🏷️ <?php echo $vendor['category']; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_GET['added']) && $_GET['added'] == '1'): ?>
            <div style="max-width:1200px;margin:10px auto;padding:10px;background:#e8f8ed;border:1px solid #b7e6c9;color:#1b7a3d;border-radius:6px;text-align:center;">
                Item added to cart ✅
            </div>
        <?php endif; ?>

        <!-- Menu Categories -->
        <div class="menu-container">
            <?php if (empty($menuItems)): ?>
                <div class="menu-category" style="text-align: center;">
                    <h3>Menu Coming Soon!</h3>
                    <p>We're working on updating our menu</p>
                </div>
            <?php else: ?>
                <?php foreach ($menuItems as $category => $items): ?>
                    <div class="menu-category">
                        <h2 class="category-title"><?php echo $category; ?></h2>
                        
                        <?php foreach ($items as $item): ?>
                            <div class="menu-item">
                                <div class="item-info">
                                    <div class="item-name">
                                        <span class="arabic-name"><?php echo $item['name']; ?></span>
                                        <?php if ($item['is_popular']): ?>
                                            <span class="popular-badge">🔥 Popular</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="item-description"><?php echo $item['description']; ?></div>
                                </div>
                                
                                <div class="item-actions">
                                    <div class="item-price">EGP <?php echo number_format($item['price'], 2); ?></div>
                                    <?php if ($item['is_available']): ?>
                                        <form method="POST" action="index.php?page=vendor&vendor=<?php echo $vendor['id']; ?>" style="display: inline;">
                                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                            <input type="hidden" name="product_name" value="<?php echo $item['name']; ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $item['price']; ?>">
                                            <input type="hidden" name="action" value="add">
                                            <button type="submit" class="add-to-cart">
                                                Add to Cart
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <button class="out-of-stock" disabled>
                                            Out of Stock
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script>
    // Add hover effects for menu items
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
    </script>
</body>
</html>