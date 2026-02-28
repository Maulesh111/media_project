<?php include("config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>NGO Media Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Media Page</h1>

<!-- Press Releases -->
<h2>Press Releases</h2>
<?php
$result = $conn->query("SELECT * FROM press_releases ORDER BY release_date DESC");
while($row = $result->fetch_assoc()) {
    echo "<div class='card'>";
    echo "<h3>".$row['title']."</h3>";
    echo "<p>".$row['description']."</p>";
    echo "<small>".$row['release_date']."</small>";
    echo "</div>";
}
?>

<!-- Media Coverage -->
<h2>Media Coverage</h2>
<?php
$result = $conn->query("SELECT * FROM media_coverage");
while($row = $result->fetch_assoc()) {
    echo "<div class='card'>";
    echo "<a href='".$row['url']."' target='_blank'>".$row['title']."</a>";
    echo "</div>";
}
?>

<!-- Image Gallery -->
<h2>Image Gallery</h2>
<?php
$result = $conn->query("SELECT * FROM image_gallery");
while($row = $result->fetch_assoc()) {
    echo "<img src='uploads/".$row['image_path']."' width='200'>";
}
?>

<!-- Videos -->
<h2>Videos</h2>
<?php
$result = $conn->query("SELECT * FROM videos");
while($row = $result->fetch_assoc()) {
    echo "<iframe width='300' height='200' src='".$row['video_url']."' frameborder='0' allowfullscreen></iframe>";
}
?>

</body>
</html>