<?php
session_start();

$alert_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $password = isset($_POST['Password']) ? $_POST['Password'] : '';

    if (empty($username) || empty($password)) {
        $alert_message = "Both fields are required.";
    } else {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "cuddlepaws";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM users WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['Password'])) {
                // Store the username in the session
                $_SESSION['Username'] = $user['Username'];

                // Redirect to the account page
                header("Location: account.php");
                exit();
            } else {
                $alert_message = "Incorrect password.";
            }
        } else {
            $alert_message = "No account found.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <title>Cuddle Paws Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
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
                    <li><a href="logout.php">Log Out</a></li>
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
        <div class="login-container">
            <div class="login-box">
                <h1>
                    <span class="first-color">Cuddle</span>
                    <span class="second-color">Paws</span>
                </h1>
                <?php if (!empty($alert_message)): ?>
                    <div class="alert <?php echo strpos($alert_message, 'successful') !== false ? 'success' : ''; ?>">
                        <?php echo $alert_message; ?>
                    </div>
                <?php endif; ?>

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
                <a href="signup.php">Don't have an account? Sign up</a>
            </div>
        </div>
    </main>
    <script src="js/loginpassw.js"></script>

</body>
</html>
