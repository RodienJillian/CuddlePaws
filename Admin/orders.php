<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="orders.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">Admin</a>
            </div>
        </nav>
    </header>
    
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
        <script>
            const sidebar = document.querySelector('.sidebar');
            const toggleButton = document.querySelector('.sidebar-toggle');

            toggleButton.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
                
                if (sidebar.classList.contains('collapsed')) {
                    toggleButton.textContent = '↦'; 
                } else {
                    toggleButton.textContent = '↤'; 
                }
            });
        </script>
        
        <div class="orders">
            <h1>Orders</h1>
            <div class="products-header">
                <h2>Order List</h2>
            </div>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Id</th>
                        <th>Total Amount</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Id">1</td>
                        <td data-label="User Id">12345</td>
                        <td data-label="Total Amount">$100.00</td>
                        <td data-label="Order Date">2023-10-12</td>
                    </tr>
                    <tr>
                        <td data-label="Id">2</td>
                        <td data-label="User Id">67890</td>
                        <td data-label="Total Amount">$150.00</td>
                        <td data-label="Order Date">2023-10-13</td>
                    </tr>
                    <!-- Additional rows can be added here -->
                </tbody>
                
            </table>
        </div>
    </div>
</body>
</html>
