<?php
class MenuController {
    
    // ========================
    // 1. VENDOR DATA STORAGE
    // ========================
    /**
     * This array stores basic information about each vendor
     * You can add new vendors here without touching any other code
     */
    private $vendors = [
        'mycorner' => [
            'id' => 'mycorner',
            'name' => 'MyCorner',
            'description' => 'Best Breakfast on campus ',
            'logo' => '/public/images/vendors/mycorner-logo.png',
            'rating' => 4.5,
            'category' => 'Breakfast'
        ],
        'tbs' => [
            'id' => 'tbs', 
            'name' => 'TBS',
            'description' => 'Coffee and Sandwiches made fresh to order',
            'logo' => '/public/images/vendors/tbs-logo.png',
            'rating' => 4.2,
            'category' => 'Coffee & Sandwiches'
        ],
        'giro' => [
            'id' => 'giro',
            'name' => 'Giro',
            'description' => 'Gyros , Meals , Burgers',
            'logo' => '/public/images/vendors/giro-logo.png',
            'rating' => 4.7,
            'category' => 'Meals & Gyros & Burgers'
        ]
    ];
    
    // ========================
    // 2. MENU DATA STORAGE  
    // ========================
    /**
     * This array stores all menu items organized by vendor
     * Each vendor has categories, and each category has items
     */
    private $menus = [
        'mycorner' => [
           'فول' => [
                [
                    'id' => 101,
                    'name' => 'فول',
                    'description' => 'فول سادة',
                    'price' => 10.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 102,
                    'name' => 'حار فول زيت',
                    'description' => 'فول بالزيت الحار',
                    'price' => 12.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 103,
                    'name' => 'كورنر ماي فول',
                    'description' => 'فول كورنر ماي',
                    'price' => 12.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 104,
                    'name' => 'بالصلصة فول',
                    'description' => 'فول بالصلصة',
                    'price' => 12.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 105,
                    'name' => 'فول إسكندراني',
                    'description' => 'فول بالطريقة الإسكندرانية',
                    'price' => 12.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 106,
                    'name' => 'فول زيت زيتون',
                    'description' => 'فول بزيت الزيتون',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 107,
                    'name' => 'بلدي فول زبدة',
                    'description' => 'فول بلدي بالزبدة',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 108,
                    'name' => 'معصفر ليمون فول',
                    'description' => 'فول معصفر بالليمون',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 109,
                    'name' => 'بالبيض فول',
                    'description' => 'فول بالبيض',
                    'price' => 20.00,
                    'is_available' => true,
                    'is_popular' => true
                ]
            ],
            
            'بطاطس' => [
                [
                    'id' => 201,
                    'name' => 'شيبسي بطاطس',
                    'description' => 'بطاطس شيبسي',
                    'price' => 16.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 202,
                    'name' => 'بورية بطاطس',
                    'description' => 'بطاطس بورية',
                    'price' => 16.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 203,
                    'name' => 'كاتشب بطاطس',
                    'description' => 'بطاطس بالكاتشب',
                    'price' => 16.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 204,
                    'name' => 'مايونيز بطاطس',
                    'description' => 'بطاطس بالمايونيز',
                    'price' => 18.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 205,
                    'name' => 'شيدر صوص بطاطس',
                    'description' => 'بطاطس بصوص الشيدر',
                    'price' => 18.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 206,
                    'name' => 'صوص رانش بطاطس',
                    'description' => 'بطاطس بصوص الرانش',
                    'price' => 22.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 207,
                    'name' => 'كوكتيل بطاطس',
                    'description' => 'بطاطس كوكتيل',
                    'price' => 22.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 208,
                    'name' => 'جبنة رومي بطاطس',
                    'description' => 'بطاطس بجبنة الرومي',
                    'price' => 20.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 209,
                    'name' => 'ديناميت',
                    'description' => 'بطاطس ديناميت',
                    'price' => 25.00,
                    'is_available' => true,
                    'is_popular' => true
                ]
            ],
            
            'مقبلات' => [
                [
                    'id' => 301,
                    'name' => 'مخلل باذنجان',
                    'description' => 'مخلل الباذنجان',
                    'price' => 8.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 302,
                    'name' => 'مخلل ارـخي',
                    'description' => 'مخلل الأرخی',
                    'price' => 12.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 303,
                    'name' => 'مخلله طماطم',
                    'description' => 'مخلل الطماطم',
                    'price' => 12.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 304,
                    'name' => 'غنوج بابا',
                    'description' => 'غنوج البابا',
                    'price' => 12.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 305,
                    'name' => 'طحينة',
                    'description' => 'طحينة',
                    'price' => 20.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 306,
                    'name' => 'خضراء سلطة',
                    'description' => 'سلطة خضراء',
                    'price' => 20.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 307,
                    'name' => 'مسقعة',
                    'description' => 'مسقعة',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 308,
                    'name' => 'مقلي باذنجان',
                    'description' => 'باذنجان مقلي',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ]
            ],
            
            'كومبو' => [
                [
                    'id' => 401,
                    'name' => 'كورنر ماي',
                    'description' => '(بيض - فول - بطاطس - طعمية)',
                    'price' => 30.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 402,
                    'name' => 'يـأباتش',
                    'description' => '(خضار - مشروم - سوسيس - بيض)',
                    'price' => 20.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 403,
                    'name' => 'تحابيش',
                    'description' => '(باذنجان - بطاطس - طعمية)',
                    'price' => 30.00,
                    'is_available' => true,
                    'is_popular' => false
                ]
            ],
            
            'بيض' => [
                [
                    'id' => 501,
                    'name' => 'سادة اومليت',
                    'description' => 'أومليت سادة',
                    'price' => 18.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 502,
                    'name' => 'اومليت اسبانش',
                    'description' => 'أومليت سبانخ',
                    'price' => 23.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 503,
                    'name' => 'بسطرمة اومليت',
                    'description' => 'أومليت بسطرمة',
                    'price' => 30.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 504,
                    'name' => 'سجق اومليت',
                    'description' => 'أومليت سجق',
                    'price' => 30.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 505,
                    'name' => 'سوسيس اومليت',
                    'description' => 'أومليت سوسيس',
                    'price' => 30.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 506,
                    'name' => 'بيتزا اومليت',
                    'description' => 'أومليت بيتزا',
                    'price' => 30.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 507,
                    'name' => 'جبنة اومليت',
                    'description' => 'أومليت جبنة',
                    'price' => 25.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 508,
                    'name' => 'مسلوق بيض',
                    'description' => 'بيض مسلوق',
                    'price' => 17.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 509,
                    'name' => 'مدحرج بيض',
                    'description' => 'بيض مدحرج',
                    'price' => 20.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 510,
                    'name' => 'شكشوكة',
                    'description' => 'شكشوكة',
                    'price' => 23.00,
                    'is_available' => true,
                    'is_popular' => true
                ]
            ],
            
           
            
            'طعمية' => [
                [
                    'id' => 701,
                    'name' => 'طعمية',
                    'description' => 'طعمية سادة',
                    'price' => 10.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 702,
                    'name' => 'محشية طعمية',
                    'description' => 'طعمية محشية',
                    'price' => 12.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 703,
                    'name' => 'قماطي طعمية',
                    'description' => 'طعمية قماطي',
                    'price' => 10.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 704,
                    'name' => 'كيري طعمية',
                    'description' => 'طعمية كيري',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 705,
                    'name' => 'بالبيض طعمية',
                    'description' => 'طعمية بالبيض',
                    'price' => 20.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 706,
                    'name' => 'معصفر ليمون طعمية',
                    'description' => 'طعمية معصفر ليمون',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 707,
                    'name' => 'كورنر ماي طعمية',
                    'description' => 'طعمية كورنر ماي',
                    'price' => 20.00,
                    'is_available' => true,
                    'is_popular' => false
                ]
            ],
            
            'سندوتشات' => [
                [
                    'id' => 801,
                    'name' => 'بسطرمة',
                    'description' => 'سندوتش بسطرمة',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 802,
                    'name' => 'سوسيس',
                    'description' => 'سندوتش سوسيس',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 803,
                    'name' => 'سجق',
                    'description' => 'سندوتش سجق',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 804,
                    'name' => 'غنوج بابا',
                    'description' => 'سندوتش غنوج بابا',
                    'price' => 10.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 805,
                    'name' => 'طعمية',
                    'description' => 'سندوتش طعمية',
                    'price' => 7.00,
                    'is_available' => true,
                    'is_popular' => true
                ],
                [
                    'id' => 806,
                    'name' => 'رومي',
                    'description' => 'سندوتش رومي',
                    'price' => 10.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 807,
                    'name' => 'شيدر',
                    'description' => 'سندوتش شيدر',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 808,
                    'name' => 'مشروم',
                    'description' => 'سندوتش مشروم',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 809,
                    'name' => 'كيري',
                    'description' => 'سندوتش كيري',
                    'price' => 15.00,
                    'is_available' => true,
                    'is_popular' => false
                ],
                [
                    'id' => 810,
                    'name' => 'بيض',
                    'description' => 'سندوتش بيض',
                    'price' => 12.00,
                    'is_available' => true,
                    'is_popular' => false
                ]
            ],
            
            
        ],
        
        'tbs' => [
            'Coffee' => [
                [
                    'id' => 301,
                    'name' => 'Latte Large - Single origin',
                    'description' => 'Latte Large - Single origin',
                    'price' => 110.00,
                   // 'image' => '/public/images/menu/chicken-wrap.jpg',
                    'is_available' => true,
                    'is_popular' => true
                ]
            ]
        ],
        
        'giro' => [
            'Mediterranean Specials' => [
                [
                    'id' => 401,
                    'name' => 'Shawarma (Gyro)',
                    'description' => 'Pita bread - Lettuce - Onion - Tomato - Yogurt Sauce - Fries',
                    'price' => 130.00,
                    //'image' => '/public/images/menu/shawarma.jpg',
                    'is_available' => true,
                    'is_popular' => true
                ]
            ]
        ]
    ];
    
    // ========================
    // 3. MAIN METHOD - SHOW MENU
    // ========================
    /**
     * This is the main method that gets called when someone visits a vendor menu
     * Example: ?vendor=mycorner calls this method with 'mycorner'
     */
public function show($vendorId) {
    // === ADD CART HANDLING CODE HERE ===
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Handle add to cart action
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
        $productId = $_POST['product_id'];
        $productName = $_POST['product_name'];
        $productPrice = floatval($_POST['product_price']);
        
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            $_SESSION['cart'][$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1
            ];
        }
        
    // Redirect back to same vendor page with a flag for confirmation
    header("Location: index.php?page=vendor&vendor=$vendorId&added=1");
        exit();
    }
    // === END CART HANDLING CODE ===
   
    // STEP 1: Check if the requested vendor exists
    if (!isset($this->vendors[$vendorId])) {
        $this->showError("Sorry, we couldn't find the vendor '$vendorId'");
        return;
    }
    
    // STEP 2: Get the vendor information and menu items
    $vendor = $this->vendors[$vendorId];
    $menuItems = $this->menus[$vendorId] ?? [];
    
    // STEP 3: Try to load the specific vendor view file
    $viewFile = __DIR__ . '/../views/Vendors/' . $vendorId . '.php';
    
   
    // STEP 4: Check if a custom view exists for this vendor
    if (file_exists($viewFile)) {
       
        require_once $viewFile;
       
    } else {
       
        $this->showGenericMenu($vendor, $menuItems);
    }
}
    
    // ========================
    // 4. GENERIC MENU FALLBACK
    // ========================
    /**
     * This method provides a basic menu display if no custom view exists
     * It's a safety net so pages never break
     */
    private function showGenericMenu($vendor, $menuItems) {
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head><title>{$vendor['name']} - MIU-Talabat</title>";
        echo "<style>body { font-family: Arial; padding: 20px; }</style>";
        echo "</head>";
        echo "<body>";
        
        // Vendor header
      /*  echo "<div class='vendor-header'>";
        echo "<h1>{$vendor['name']}</h1>";
        echo "<p>{$vendor['description']}</p>";
      //  echo "<div class='vendor-meta'>";
      //  echo "<span>⭐ {$vendor['rating']}</span> ";
       // echo "<span>🕒 {$vendor['delivery_time']}</span>";
       // echo "</div>";
        echo "</div>";
        
        // Menu items
        if (empty($menuItems)) {
            echo "<p>Menu coming soon!</p>";
        } else {
            foreach ($menuItems as $category => $items) {
                echo "<div class='menu-category'>";
                echo "<h2>$category</h2>";
                foreach ($items as $item) {
                    echo "<div class='menu-item'>";
                    echo "<strong>{$item['name']}</strong> - ";
                    echo "<span class='price'>EGP {$item['price']}</span>";
                    echo "<br><small>{$item['description']}</small>";
                    echo "<button onclick='addToCart({$item['id']})'>Add to Cart</button>";
                    echo "</div>";
                }
                echo "</div>";
            }
        }
        */
          
        echo "<h1>{$vendor['name']}</h1>";
        echo "<p>{$vendor['description']}</p>";
        
        foreach ($menuItems as $category => $items) {
            echo "<h2>$category</h2>";
            foreach ($items as $item) {
                echo "<div>{$item['name']} - EGP {$item['price']}</div>";
            }
        }
    }
       /* echo "<script>
        function addToCart(itemId) {
            alert('Added item ' + itemId + ' to cart!');
        }
        </script>";
        echo "</body></html>";
    }*/
    
    // ========================
    // 5. ERROR HANDLING
    // ========================
    /**
     * Shows a nice error message if something goes wrong
     */
    private function showError($message) {
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head><title>Error - MIU Eats</title>";
        echo "<style>
            body { font-family: Arial; padding: 40px; text-align: center; }
            .error { background: #ffecec; padding: 20px; border-radius: 10px; color: #d63031; }
        </style>";
        echo "</head>";
        echo "<body>";
        echo "<div class='error'>";
        echo "<h2>⚠️ Menu Not Available</h2>";
        echo "<p>$message</p>";
        echo "<a href='/' style='color: #0984e3;'>← Return to Home</a>";
        echo "</div>";
        echo "</body></html>";
    }
    
    // ========================
    // 6. BONUS: GET VENDOR LIST
    // ========================
    /**
     * This method can help your teammate get vendor data for the listing page
     * They can call this to get all vendors without knowing your internal structure
     */
    public function getAllVendors() {
        return $this->vendors;
    }
    
    // ========================
    // 7. ADMIN METHODS
    // ========================
    /**
     * Get all menu data for admin panel
     */
    public function getAllMenuData() {
        return [
            'vendors' => $this->vendors,
            'menus' => $this->menus
        ];
    }
    
    /**
     * Get all categories across all vendors
     */
    public function getAllCategories() {
        $categories = [];
        foreach ($this->menus as $vendorId => $vendorMenus) {
            foreach ($vendorMenus as $categoryName => $items) {
                if (!in_array($categoryName, $categories)) {
                    $categories[] = $categoryName;
                }
            }
        }
        return $categories;
    }
    
    /**
     * Get all food items across all vendors
     */
    public function getAllFoodItems() {
        $allItems = [];
        foreach ($this->menus as $vendorId => $vendorMenus) {
            foreach ($vendorMenus as $categoryName => $items) {
                foreach ($items as $item) {
                    $item['vendor_id'] = $vendorId;
                    $item['vendor_name'] = $this->vendors[$vendorId]['name'];
                    $item['category'] = $categoryName;
                    $allItems[] = $item;
                }
            }
        }
        return $allItems;
    }
    
    /**
     * Get statistics for admin dashboard
     */
    public function getAdminStats() {
        $totalCategories = count($this->getAllCategories());
        $totalFoods = count($this->getAllFoodItems());
        $totalVendors = count($this->vendors);
        
        // Calculate total revenue (sample data for Phase 1)
        $totalRevenue = 0;
        foreach ($this->getAllFoodItems() as $item) {
            $totalRevenue += $item['price'] * rand(1, 10); // Random quantity for demo
        }
        
        return [
            'total_categories' => $totalCategories,
            'total_foods' => $totalFoods,
            'total_vendors' => $totalVendors,
            'total_revenue' => $totalRevenue
        ];
    }
}
?>