<?php
session_start();
include("../config/db.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid Credentials!";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="login">Login</button>
</form>