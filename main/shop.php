<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Check if the user is logged in

// Database connection
$servername = "localhost";
$username = "root"; // Adjust as needed
$password = ""; // Adjust as needed
$dbname = "cuddlepaws";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch products by category
function fetchProductsByCategory($conn, $category) {
    $sql = "SELECT * FROM products WHERE Product_Category = '$category'";
    $result = $conn->query($sql);
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/shop.css">    
    <link rel="stylesheet" href="css/viewProducts.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="index.php#about-us">About</a></li>
                <?php if (isset($_SESSION['Username'])): ?>
                    <li><a href="account.php">Account</a></li>
                <?php else: ?>
                    <li><a href="login.php">Log In/Sign Up</a></li>
                <?php endif; ?>
            </ul>
            <div class="logo">
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" alt="Hero Image">
                <a href="index.php">Cuddle Paws</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="CuddlePaws">
            <h3>SHOP BY PET</h3>
            <section class="pets-category">
                <div class="dog" onclick="toggleDropdown('dogDropdown')">
                    <a href="#Shop_Dog">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728379963/Add_a_heading_2_rmeo7b.png">
                    </a>
                </div>
                <div class="cat" onclick="toggleDropdown('catDropdown')">
                    <a href="#Shop_Cat">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728380501/Add_a_heading_6_ylmccn.png">
                    </a>
                </div>
                <div class="fish" onclick="toggleDropdown('fishDropdown')">
                    <a href="#Shop_fish">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728380500/Add_a_heading_4_sern0a.png">
                    </a>
                </div>
                <div class="smallPet" onclick="toggleDropdown('smallPetDropdown')">
                    <a href="#Shop_smallPet">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728380500/Add_a_heading_5_cewynu.png">
                    </a>
                </div>
            </section>
        </div>

        <!-- Dog Products -->
        <section class="Shop_Dog" id="Shop_Dog">
            <h2>Shop for Dogs</h2>
            <div class="shopDog" id="dogDropdown" class="dropdown-content">
                <div>Dog Foods</div>
                <div class="product-cards">
                <?php
                $dogProducts = fetchProductsByCategory($conn, 'Dog Food');
                if ($dogProducts->num_rows > 0) {
                    while($product = $dogProducts->fetch_assoc()) {
                        // Ensure all fields are properly sanitized for HTML output
                        $productImage = htmlspecialchars($product['Product_ImageUrl'], ENT_QUOTES, 'UTF-8');
                        $productName = htmlspecialchars($product['Product_Name'], ENT_QUOTES, 'UTF-8');
                        $productPrice = htmlspecialchars($product['Product_Price'], ENT_QUOTES, 'UTF-8');
                        $productDescription = htmlspecialchars($product['Product_Description'], ENT_QUOTES, 'UTF-8');

                        // Use json_encode to safely pass values to JavaScript
                        echo '
                        <div class="card" onclick="openModal(' . htmlspecialchars(json_encode($productImage), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productName), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productPrice), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productDescription), ENT_QUOTES, 'UTF-8') . ')">
                            <img src="' . $productImage . '" alt="' . $productName . '">
                            <div class="card-title">' . $productName . '</div>
                            <p class="price">₱ ' . $productPrice . '</p>
                        </div>';
                    }
                } else {
                    echo '<p>No products available.</p>';
                }
                ?>

                </div>
                <div>Dog Treats</div>
                    <div class="product-cards">
                    <?php
                    $dogProducts = fetchProductsByCategory($conn, 'Dog Treats');
                    if ($dogProducts->num_rows > 0) {
                        while($product = $dogProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars($product['Product_ImageUrl'], ENT_QUOTES, 'UTF-8');
                            $productName = htmlspecialchars($product['Product_Name'], ENT_QUOTES, 'UTF-8');
                            $productPrice = htmlspecialchars($product['Product_Price'], ENT_QUOTES, 'UTF-8');
                            $productDescription = htmlspecialchars($product['Product_Description'], ENT_QUOTES, 'UTF-8');

                            // Use json_encode to safely pass values to JavaScript
                            echo '
                            <div class="card" onclick="openModal(' . htmlspecialchars(json_encode($productImage), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productName), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productPrice), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productDescription), ENT_QUOTES, 'UTF-8') . ')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">₱ ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                    </div>
                </div>
                <div>Dog Supplies</div>
                    <div class="product-cards">
                    <?php
                    $dogProducts = fetchProductsByCategory($conn, 'Dog Supplies');
                    if ($dogProducts->num_rows > 0) {
                        while($product = $dogProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars($product['Product_ImageUrl'], ENT_QUOTES, 'UTF-8');
                            $productName = htmlspecialchars($product['Product_Name'], ENT_QUOTES, 'UTF-8');
                            $productPrice = htmlspecialchars($product['Product_Price'], ENT_QUOTES, 'UTF-8');
                            $productDescription = htmlspecialchars($product['Product_Description'], ENT_QUOTES, 'UTF-8');

                            // Use json_encode to safely pass values to JavaScript
                            echo '
                            <div class="card" onclick="openModal(' . htmlspecialchars(json_encode($productImage), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productName), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productPrice), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productDescription), ENT_QUOTES, 'UTF-8') . ')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">₱ ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="Shop_Cat" id="Shop_Cat">
            <h2>Shop for Cats</h2>
            <div class="shopCat" id="catDropdown" class="dropdown-content">
                <div>Cat Foods</div>
                <div class="product-cards">
                    <?php
                    $catProducts = fetchProductsByCategory($conn, 'Cat Food');
                    if ($catProducts->num_rows > 0) {
                        while($product = $catProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars($product['Product_ImageUrl'], ENT_QUOTES, 'UTF-8');
                            $productName = htmlspecialchars($product['Product_Name'], ENT_QUOTES, 'UTF-8');
                            $productPrice = htmlspecialchars($product['Product_Price'], ENT_QUOTES, 'UTF-8');
                            $productDescription = htmlspecialchars($product['Product_Description'], ENT_QUOTES, 'UTF-8');

                            // Use json_encode to safely pass values to JavaScript
                            echo '
                            <div class="card" onclick="openModal(' . htmlspecialchars(json_encode($productImage), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productName), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productPrice), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productDescription), ENT_QUOTES, 'UTF-8') . ')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">₱ ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                </div>
                <div>Cat Treats</div>
                <div class="product-cards">
                    <?php
                    $catProducts = fetchProductsByCategory($conn, 'Cat Treats');
                    if ($catProducts->num_rows > 0) {
                        while($product = $catProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars($product['Product_ImageUrl'], ENT_QUOTES, 'UTF-8');
                            $productName = htmlspecialchars($product['Product_Name'], ENT_QUOTES, 'UTF-8');
                            $productPrice = htmlspecialchars($product['Product_Price'], ENT_QUOTES, 'UTF-8');
                            $productDescription = htmlspecialchars($product['Product_Description'], ENT_QUOTES, 'UTF-8');

                            // Use json_encode to safely pass values to JavaScript
                            echo '
                            <div class="card" onclick="openModal(' . htmlspecialchars(json_encode($productImage), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productName), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productPrice), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productDescription), ENT_QUOTES, 'UTF-8') . ')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">₱ ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                    </div>
                    <div>Cat Supplies</div>
                    <div class="product-cards">
                    <?php
                    $catProducts = fetchProductsByCategory($conn, 'Cat Supplies');
                    if ($catProducts->num_rows > 0) {
                        while($product = $catProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars($product['Product_ImageUrl'], ENT_QUOTES, 'UTF-8');
                            $productName = htmlspecialchars($product['Product_Name'], ENT_QUOTES, 'UTF-8');
                            $productPrice = htmlspecialchars($product['Product_Price'], ENT_QUOTES, 'UTF-8');
                            $productDescription = htmlspecialchars($product['Product_Description'], ENT_QUOTES, 'UTF-8');

                            // Use json_encode to safely pass values to JavaScript
                            echo '
                            <div class="card" onclick="openModal(' . htmlspecialchars(json_encode($productImage), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productName), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productPrice), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productDescription), ENT_QUOTES, 'UTF-8') . ')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">₱ ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                    </div>
            </div>
        </section>

        <section class="Shop_fish" id="Shop_fish">
            <h2>Shop for Fish</h2>
            <div class="shopFish" id="fishDropdown" class="dropdown-content">
                <div class="product-cards">
                    <?php
                    $fishProducts = fetchProductsByCategory($conn, 'Fish');
                    if ($fishProducts->num_rows > 0) {
                        while($product = $fishProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars($product['Product_ImageUrl'], ENT_QUOTES, 'UTF-8');
                            $productName = htmlspecialchars($product['Product_Name'], ENT_QUOTES, 'UTF-8');
                            $productPrice = htmlspecialchars($product['Product_Price'], ENT_QUOTES, 'UTF-8');
                            $productDescription = htmlspecialchars($product['Product_Description'], ENT_QUOTES, 'UTF-8');

                            // Use json_encode to safely pass values to JavaScript
                            echo '
                            <div class="card" onclick="openModal(' . htmlspecialchars(json_encode($productImage), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productName), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productPrice), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productDescription), ENT_QUOTES, 'UTF-8') . ')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">₱ ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="Shop_smallPet" id="Shop_smallPet">
            <h2>Shop for Small Pets</h2>
            <div class="shopSmallPet" id="smallPetDropdown" class="dropdown-content">
                <div class="product-cards">
                    <?php
                    $smallPetProducts = fetchProductsByCategory($conn, 'Small Pet');
                    if ($smallPetProducts->num_rows > 0) {
                        while($product = $smallPetProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars($product['Product_ImageUrl'], ENT_QUOTES, 'UTF-8');
                            $productName = htmlspecialchars($product['Product_Name'], ENT_QUOTES, 'UTF-8');
                            $productPrice = htmlspecialchars($product['Product_Price'], ENT_QUOTES, 'UTF-8');
                            $productDescription = htmlspecialchars($product['Product_Description'], ENT_QUOTES, 'UTF-8');

                            // Use json_encode to safely pass values to JavaScript
                            echo '
                            <div class="card" onclick="openModal(' . htmlspecialchars(json_encode($productImage), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productName), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productPrice), ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars(json_encode($productDescription), ENT_QUOTES, 'UTF-8') . ')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">₱ ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                </div>
                <a id="backToTop" href="#">
                    <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726846812/icon-256x256-removebg-preview_xeotyt.png" alt="Back to Top" />
                </a>
            </div>
        </section>

<!-- Modal -->
        <div id="productModal" class="modal" style="display: none;">
            <div class="modal-content">
                <!-- Close button -->
                <span class="close" onclick="closeModal()">&times;</span>
                
                <div class="container">
                    <!-- Product image section -->
                    <div class="product-image">
                        <img id="modalProductImage" src="" alt="Product Image">
                    </div>
                    
                    <!-- Product info section -->
                    <div class="product-info">
                        <div class="product-description">
                            <h2 id="modalProductName"></h2>
                            <p id="modalProductPrice"></p>
                            <p id="modalProductDescription"></p>
                        </div>
                        <!-- Quantity display -->
                        <div class="btn">
                            <div class="counter-container">
                                <button id="decrease" class="btn">-</button>
                                <span id="number" class="number">1</span>
                                <button id="increase" class="btn">+</button>
                            </div>
                            <div class="addToCart" id="btnAddtoCart" onclick="addToCart()">
                                <h3>Add to Cart</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
        <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <p><strong>Email:</strong><br>
                    cuddlepawsph@gmail.com</p>
                </div>
                <div class="footer-section">
                    <p><strong>Phone:</strong><br>
                    (63) 947-703-0508<br>
                    (63) 927-704-6513<br>
                    (63) 927-283-0230</p>
                </div>
                <div class="footer-section">
                    <p><strong>Address:</strong><br>
                    Poblacion, Pandi,<br>
                    Bulacan, Philippines</p>
                </div>
            </div>
            <p class="footer-bottom">For educational purposes only</p>
            <p class="footer-bottom">&copy;2024 Cuddle Paws. All rights reserved.</p>
        </footer>
        <script src="js/shop.js"></script>
        <script src="js/modal.js"></script>
        <script src="js/updatedNav.js"></script>

</body>
</html>
