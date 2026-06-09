<?php
include 'config.php';

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query(
"SELECT * FROM users WHERE email='$email'"
);

$user = $result->fetch_assoc();

if(password_verify($password,$user['password'])){
    $_SESSION['user']=$user['username'];
    header("Location:dashboard.php");
}
}
?>

<form method="POST">
<input name="email" type="email">
<input name="password" type="password">
<button name="login">Login</button>
</form>
