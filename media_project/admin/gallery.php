<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}

// Upload Image
if(isset($_POST['upload'])){
    $image = $_FILES['image']['name'];
    $desc = $_POST['description'];

    move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/".$image);

    $conn->query("INSERT INTO image_gallery (image_path, description)
                  VALUES ('$image','$desc')");
}

// Delete Image
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $get = $conn->query("SELECT * FROM image_gallery WHERE id=$id");
    $row = $get->fetch_assoc();
    unlink("../uploads/".$row['image_path']);

    $conn->query("DELETE FROM image_gallery WHERE id=$id");
}
?>

<h2>Manage Image Gallery</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image" required><br>
    <input type="text" name="description" placeholder="Description"><br>
    <button name="upload">Upload</button>
</form>

<hr>

<?php
$result = $conn->query("SELECT * FROM image_gallery");
while($row = $result->fetch_assoc()){
    echo "<img src='../uploads/".$row['image_path']."' width='100'>";
    echo " <a href='?delete=".$row['id']."'>Delete</a><br>";
}
?>