<html>
<?php include "../layout/header.php" ?>

<body>

<div id="wrapper">
    <?php include '../layout/sidebar.php' ?>
    <div style="text-align: center">
        <?php
        $userID = $_GET["id"];
        $userName = $_GET["name"];
        echo "<h1>Cảm ơn bạn vì đã gửi phản hồi cho chúng tôi !<h1>";

        ?>
        <div class="Back">
            <a href="feedback.php?id=<?php echo $userID ?>&name=<?php echo $userName ?>">Trở về </a>
        </div>
    </div>
</div>
</body>
</html>
