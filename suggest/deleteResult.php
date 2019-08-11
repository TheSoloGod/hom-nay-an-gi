<?php
include '../connectDB/connectDB.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $userID = $_GET['id'];
    }
    if (isset($_GET['name'])) {
        $userName = $_GET['name'];
    }
    if (isset($_GET['time'])) {
        $time = $_GET['time'];
    }
    if (isset($_GET['date'])) {
        $date = $_GET['date'];
    }

    $sql = "DELETE FROM history
                WHERE userID = '$userID' AND timeInDay = '$time' AND dateEat = '$date'";

    $conn->exec($sql);
    $conn = null;
    header("location: suggest.php?id=$userID&name=$userName", true);
}
?>