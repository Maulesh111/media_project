<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}

// Add Media Coverage
if(isset($_POST['add'])){
    $title = $_POST['title'];
    $url = $_POST['url'];

    $conn->query("INSERT INTO media_coverage (title, url)
                  VALUES ('$title','$url')");
}

// Delete Media Coverage
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM media_coverage WHERE id=$id");
}
?>

<h2>Manage Media Coverage</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Title" required><br>
    <input type="text" name="url" placeholder="Media URL" required><br>
    <button name="add">Add</button>
</form>

<hr>

<?php
$result = $conn->query("SELECT * FROM media_coverage");
while($row = $result->fetch_assoc()){
    echo $row['title']." ";
    echo "<a href='?delete=".$row['id']."'>Delete</a><br>";
}
?>