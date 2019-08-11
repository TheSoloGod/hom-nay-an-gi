<?php

include_once '../connectDB/connectDB.php';
$stmt = $conn->prepare('SELECT * FROM history ORDER BY dateEat DESC, timeInDay DESC');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
$conn = null;
$userId = $_GET["id"];
$userHistory = userHistoryToArr($result, $userId);
$count = count($userHistory);

function userHistoryToArr($arr, $userId)
{
    $userHistory = [];
    foreach ($arr as $item) {
        if ($item['userID'] == $userId) {
            array_push($userHistory, $item);
        }
    }
    return $userHistory;
}

function showUserHistory($userHistory)
{
    for ($i = 0; $i < count($userHistory); $i++) {
        echo '<tr>';
        if ($userHistory[$i]['dateEat'] == $userHistory[$i + 1]['dateEat']) {
            echo '<td>' . $userHistory[$i]['dateEat'] . '</td>';
            foreach ($userHistory[$i] as $item => $value) {
                if ($item != 'userID' && $item != 'dateEat' && $item != 'timeInDay') {
                    echo '<td>' . $value . '</td>';
                }
            }
            $i++;
            foreach ($userHistory[$i] as $item => $value) {
                if ($item != 'userID' && $item != 'dateEat' && $item != 'timeInDay') {
                    echo '<td>' . $value . '</td>';
                }
            }
        } else {
            echo '<td>' . $userHistory[$i]['dateEat'] . '</td>';
            foreach ($userHistory[$i] as $item => $value) {
                if ($item != 'userID' && $item != 'dateEat' && $item != 'timeInDay') {
                    echo '<td>' . $value . '</td>';

                }
            }
        }
        echo '</tr>';
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<div id="page-top">

<div id="wrapper">
    <?php include '../layout/sidebar.php'?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                        <h2>Lịch sử ăn uống gần nhất</h2>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr style="text-align: center">
                                <th>Ngày</th>
                                <th colspan="4">Sáng</th>
                                <th colspan="4">Chiều</th>
                            </tr>
                            <?php
                            if ($count / 2 > 7) {
                                $temparr = [];
                                for ($i = 0; $i < 14; $i++) {
                                    array_push($temparr, $userHistory[$i]);
                                }
                                showUserHistory($temparr);
                            } else {
                                showUserHistory($userHistory);
                            }
                            ?>
                        </table>
                </div>
            </div>
        </div>

    </div>


    <!-- /.container-fluid -->

    </div>
</div>
    <!-- End of Main Content -->

<?php
include "../layout/footer.php";
?>


</body>
</html>
