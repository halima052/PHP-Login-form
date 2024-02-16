<?php
session_start(); 


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("Location: dashboard.php");
    exit;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = "example_user";
    $password = "example_password";
    
    if($_POST["username"] === $username && $_POST["password"] === $password){
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        
        header("Location: dashboard.php");
        exit;
    } else {
        $login_error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    if(isset($login_error)){
        echo '<p style="color:red;">' . $login_error . '</p>';
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

