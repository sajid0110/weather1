<?php
include 'config.php';

if(isset($_POST['register'])){

$password =
password_hash($_POST['password'],
PASSWORD_DEFAULT);

$conn->query("
INSERT INTO users(username,email,password)
VALUES(
'{$_POST['username']}',
'{$_POST['email']}',
'$password'
)");
}
?>

<form method="POST">
<input name="username" placeholder="Username">
<input name="email" type="email">
<input name="password" type="password">
<button name="register">Register</button>
</form>
