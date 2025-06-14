<?php

date_default_timezone_set('Asia/Kuala_Lumpur');

// Database connection parameters
$servername = "localhost";  // MySQL service name from docker-compose.yml
$username = "hamizan";
$password = "zans9102";
$dbname = "ParcelDB";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Functions

function verifyAdmin($con) {
    if ($_SESSION['username'] && $_SESSION['password']) {
        $result = mysqli_query($con, "SELECT `username`, `password` FROM `admin` WHERE `username`='$_SESSION[username]' AND `password`='$_SESSION[password]'");

        if (mysqli_num_rows($result) == 1) 
            return true;
    }
    return false;
}

function verifyStudent($con) {
    if ($_SESSION['username'] && $_SESSION['password']) {
        $result = mysqli_query($con, "SELECT `username`, `password` FROM `student` WHERE `username`='$_SESSION[username]' AND `password`='$_SESSION[password]'");

        if (mysqli_num_rows($result) == 1) 
            return true;
    }
    return false;
}

function numRows($con, $query) {
    $result = mysqli_query($con, $query);
    $rowcount = mysqli_num_rows($result);
    return $rowcount;
}

function Notify($status, $alert, $redirect) {
    $color = ($status == "success") ? "w3-text-yellow" : "w3-text-red";

    header("refresh:1;url=$redirect");

    echo '<div class="'.$color.' w3-black w3-top w3-card w3-padding-24" style="z-index=999">
        <span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-large w3-display-topright">&times;</span>
        <div class="w3-padding w3-center">
        <div class="w3-large">'.$alert.'</div>
        </div>
    </div>';
}

function resizeImage($resourceType, $image_width, $image_height) {
    $resizeWidth = 300;
    $resizeHeight = 300;
    $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
    imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
    return $imageLayer;
}

?>
