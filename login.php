
<?php
session_start(); 

include 'config.php';

if (isset($_POST['login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username']; 
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password checking failed, but query executed!";
        }
    } else {
        $error = "No user found or query failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SQLi Lab - Login</title>
</head>
<body>

    <div style="margin: 50px auto; width: 300px;">
        <h2>SQLi Lab Login</h2>
        
        <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

        <form method="POST" action="login.php">
            <input name="email" type="text" placeholder="Email or Payload" required><br><br>
            <input name="password" type="password" placeholder="Password" required><br><br>
            <button name="login" type="submit">Login</button>
        </form>
    </div>

</body>
</html>
