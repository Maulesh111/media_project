<?php
session_start();
include("../config/db.php");

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $conn->query("INSERT INTO press_releases (title, description, release_date)
                  VALUES ('$title','$description','$date')");
}
?>

<form method="POST">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="description" required></textarea><br>
    <input type="date" name="date" required><br>
    <button name="add">Add Press Release</button>
</form>