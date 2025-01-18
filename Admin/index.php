<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cuddlepaws"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start(); 
include 'db.php'; 

$alert_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    $sql = "SELECT * FROM admin WHERE Username = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if ($row['Password'] === $password) { 
            $_SESSION['admin_id'] = $row['Admin_Id']; 
            header("Location: dashboard.php"); 
            exit();
        } else {
            $alert_message = "Invalid password.";
        }
    } else {
        $alert_message = "Invalid account.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log In</title>
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="#">Admin</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="login-container">
            <div class="login-box">
                <h1>
                    <span class="first-color">Cuddle</span>
                    <span class="second-color">Paws</span>
                </h1>            

                <?php if (!empty($alert_message)): ?>
                    <div class="alert"><?php echo $alert_message; ?></div>
                <?php endif; ?>

                <!-- Log In Form -->
                <form action="" method="post">
                    <input type="text" name="Username" placeholder="Username" required>
                    <div class="password-container">
                        <input type="password" id="password" name="Password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword()">
                            <img src="https://res.cloudinary.com/dpxfbom0j/image/upload/v1728356362/eye_ie4zen.png" alt="Show/Hide Password" id="password-icon">
                        </span>
                    </div>
                    <button type="submit">Log In</button>
                </form>
            </div>
        </div>
    </main>
    <script src="index.js"></script>
</body>
</html>
