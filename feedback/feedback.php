<?php
include_once '../connectDB/connectDB.php';
$userID = $_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['feedBack'])) {
        $feedBack = $_POST['feedBack'];
    }
    $sql = "INSERT INTO feedBacks (userID, feedBack) VALUE ('$userID','$feedBack')";
    $conn->exec($sql);
    $conn = null;
    header("location: thankYou.php?id=$userID", true);
}
?>
<html>

<?php include "../layout/header.php"; ?>
<body>

<div id="wrapper">
    <?php include '../layout/sidebar.php' ?>


<div class="FeedBack">
    <form  method="post" action="">
        <div >
            <textarea name="feedBack" rows="10" cols="50"
                      style="resize:none" placeholder="Bạn hãy cho chúng tôi biết vấn đề của bạn là gì ?"></textarea>
        </div>
        <div name="Send">
            <button id="sendFeedBack" type="submit">SEND</button>
        </div>
    </form>
</div>
</div>
</body>
</html>