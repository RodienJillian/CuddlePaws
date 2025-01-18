<?php
session_start();
if (!isset($_SESSION['Username'])) {
    header("Location: index.php"); // Redirect if accessed directly without signing up
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Success</title>
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/signupsuccess.css">
</head>
<body>
    <div class="success-message">
        <img src="public/pets.png" alt="Corgi and Cat" class="top-image">
        <h1>Account Successfully Created</h1>
        <p>Welcome to Cuddle Paws!</p>
        <p>Redirecting to the homepage...</p>
    </div>
</body>
<script src="js/signupsuccess.js"></script>
</html>