<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}
?>

<h1>Admin Dashboard</h1>

<ul>
    <li><a href="press_release.php">Manage Press Releases</a></li>
    <li><a href="media_coverage.php">Manage Media Coverage</a></li>
    <li><a href="gallery.php">Manage Image Gallery</a></li>
    <li><a href="videos.php">Manage Videos</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>