<?php
session_start(); // Start session to store login state
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "cuddlepaws"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];    
    $email = $_POST['Email'];
    $phone_num = $_POST['Phone_Num'];
    $municipality = $_POST['Municipality'];
    $barangay = $_POST['Barangay'];
    $phase = $_POST['Phase'];
    $username = $_POST['Username'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT); // Password hashing

    $stmt = $conn->prepare("INSERT INTO Users (Firstname, Lastname, Email, Phone_Num, Municipality, Barangay, Phase, Username, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $firstname, $lastname, $email, $phone_num, $municipality, $barangay, $phase, $username, $password);

    if ($stmt->execute()) {
        // Set session for the logged-in user
        $_SESSION['Username'] = $username;
        // Redirect to success page
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <title>Cuddle Paws Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
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
    </main>
    <div class="form-container">
        <div class="form-box">
            <h2>Contact Information</h2>
            <form action="signup.php" method="POST">
                <div class="name-container">
                    <div>
                        <label for="Firstname">First name</label>
                        <input type="text" class="signup" id="first-name" name="Firstname" placeholder="First name" required>
                    </div>
                    <div>
                        <label for="Lastname">Last name</label>
                        <input type="text" class="signup" id="last-name" name="Lastname" placeholder="Last name" required>
                    </div>
                </div>
                <div class="contact-container">
                    <div>
                        <label for="Email">Email</label>
                        <input type="email" id="email" name="Email" placeholder="Email" required>
                    </div>
                    <div>
                        <label for="Phone_Num">Phone</label>
                        <input type="tel" id="phone" name="Phone_Num" placeholder="Phone" required>
                    </div>
                </div>
                <h2>Shipping Address</h2>
                <label for="Municipality">Municipality</label>
                <input type="text" class="signup" id="municipality" name="Municipality" placeholder="Municipality" required>

                <label for="Barangay">Barangay</label>
                <input type="text" class="signup" id="barangay" name="Barangay" placeholder="Barangay" required>

                <label for="Phase">Phase/Block, Street</label>
                <input type="text" class="signup" id="address" name="Phase" placeholder="Phase/Block, Street" required>

                <!-- Account Section -->
                <h2>Account</h2>
                <div class="account-container">
                    <div>
                        <label for="Username">Username</label>
                        <input type="text" class="signup" id="username" name="Username" placeholder="Username" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" class="signup" id="password" name="Password" placeholder="Password" required>
                        <div>
                            <input type="checkbox" id="show-password" onclick="togglePassword()"> 
                            <div class="show-password">Show Password</div>
                        </div>
                    </div>  
                </div>
                <div class="button-container">
                    <button type="submit" class="submit">Submit</button>
                </div>
            </form>       
        </div>
    </div>
    </main>
    <script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const showPasswordCheckbox = document.getElementById("show-password");

        if (showPasswordCheckbox.checked) {
            passwordField.type = "text"; // Show password
        } else {
            passwordField.type = "password"; // Hide password
        }
    }
    </script>
</body>
</html>