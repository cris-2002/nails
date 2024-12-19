<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Page</h1>
    <form method="POST" action="login.php">
        <label for="user_name">Username:</label>
        <input type="text" id="user_name" name="user_name" required>
        <br>
        <label for="user_password">Password:</label>
        <input type="password" id="user_password" name="user_password" required>
        <br>
        <input type="hidden" name="action_name" value="login">
        <button type="submit">Login</button>
    </form>
</body>
</html>
