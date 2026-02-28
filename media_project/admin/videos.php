<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}

// Add Video
if(isset($_POST['add'])){
    $url = $_POST['video_url'];
    $desc = $_POST['description'];

    $conn->query("INSERT INTO videos (video_url, description)
                  VALUES ('$url','$desc')");
}

// Delete Video
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM videos WHERE id=$id");
}
?>

<h2>Manage Videos</h2>

<form method="POST">
    <input type="text" name="video_url" placeholder="YouTube Embed URL" required><br>
    <input type="text" name="description" placeholder="Description"><br>
    <button name="add">Add Video</button>
</form>

<hr>

<?php
$result = $conn->query("SELECT * FROM videos");
while($row = $result->fetch_assoc()){
    echo "<iframe width='200' src='".$row['video_url']."' frameborder='0'></iframe>";
    echo " <a href='?delete=".$row['id']."'>Delete</a><br>";
}
?>