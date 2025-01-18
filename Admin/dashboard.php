<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root"; 
    $password = "";    
    $dbname = "cuddlepaws"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT COUNT(*) AS user_count FROM users";
    $result = $conn->query($sql);
    $userCount = 0;

    if ($result && $row = $result->fetch_assoc()) {
        $userCount = $row['user_count'];
    }

    $conn->close();
    ?>
    <header>
        <nav>
            <div class="logo">
                <a href="dashboard.php">Admin</a>
            </div>
        </nav>
    </header>
    <main>    
        <div class="container">
            <div class="sidebar">
                <button class="sidebar-toggle" onclick="toggleSidebar()">&#x21A4;</button>
                <div class="logo-container">
                    <img src="https://res.cloudinary.com/dpxfbom0j/image/upload/v1728791049/Ellipse_9_llomyf.png" alt="Cuddle Paws Logo" class="paw-logo">
                    <a href="#" class="logo-text">Cuddle <span>Paws</span></a>
                </div>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="inventory.php">Inventory</a></li>
                    <li><a href="orders.php">Orders</a></li>
                </ul>
            </div>            
            <div class="dashboard">
                <h1>Dashboard</h1>
                <div class="dashboard-cards">
                    <div class="card welcome">
                        <h2>Welcome back, Admin!</h2>
                        <p>Let's manage your site and keep everything running smoothly.</p>
                    </div>
                    <div class="card registered-users">
                        <h2><?php echo $userCount; ?></h2>
                        <p>Registered Users</p>
                    </div>                    
                    <div class="card orders">
                        <h2>1</h2>
                        <p>Orders</p>
                    </div>
                    <div class="card products-sold">
                        <h2>1</h2>
                        <p>Products Sold</p>
                    </div>                    
                </div>
            </div>
        </div>
    </main>
    <script src="dashboard.js"></script>
</body>
</html>
