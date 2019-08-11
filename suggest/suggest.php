<?php
include "../connectDB/connectDB.php";
include "../function/selectFromTable.php";
include "../function/frequencyArray.php";
include "../function/selectFromTableWithCondi.php";
include "../function/suggest.php";
include "arrayInSuggest.php";

$userID = $_GET["id"];
$userName = $_GET["name"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tinhBot = $_POST["tinhBot"];
    $dam = $_POST["dam"];
    $xo = $_POST["xo"];
    $monPhu = $_POST["monPhu"];
    $time = $_POST["time"];
    $date = date('Y-m-d');

    $sql = "INSERT INTO history (userID, dateEat, timeInDay, tinhBot, dam, xo, monPhu)
                VALUES ('$userID', '$date', '$time', '$tinhBot', '$dam', '$xo', '$monPhu')";
    $conn->exec($sql);
    $conn = null;
}
?>
<!doctype html>
<html lang="en">
<?php include '../layout/header.php' ?>
<body>

<div id="wrapper">
    <?php include '../layout/sidebar.php' ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hôm nay ăn gì?</h1>
    </div>
    <form method="post">
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tinh bột</div>
                                <select name="tinhBot" class="custom-select">
                                    <option><?php echo $suggestTinhBot[rand(0, count($suggestTinhBot) - 1)]; ?></option>
                                    <?php foreach ($listTinhBot as $key => $value): ?>
                                        <option><?php echo $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Chất Đạm</div>
                                <select name="dam" class="custom-select">
                                    <option><?php echo $suggestDam[rand(0, count($suggestDam) - 1)]; ?></option>
                                    <?php foreach ($listDam as $key => $value): ?>
                                        <option><?php echo $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">chất xơ</div>
                                <select name="xo" class="custom-select">
                                    <option><?php echo $suggestXo[rand(0, count($suggestXo) - 1)]; ?></option>
                                    <?php foreach ($listXo as $key => $value): ?>
                                        <option><?php echo $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ăn thêm</div>
                                <select name="monPhu" class="custom-select">
                                    <option><?php echo $suggestMonPhu[rand(0, count($suggestMonPhu) - 1)]; ?></option>
                                    <?php foreach ($listMonPhu as $key => $value): ?>
                                        <option><?php echo $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <select class="custom-select" name="time">
                    <option>Sáng</option>
                    <option>Chiều</option>
                </select>
            </div>
            <div class="col-xl-6 col-md-6 mb-4" style="text-align: center">
                <!--            <span><select class="custom-select" name="time">-->
                <!--                <option>Sáng</option>-->
                <!--                <option>Chiều</option>-->
                <!--                </select></span>-->
                <span><button type="submit" style="height: 40px" href="#"
                              class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">CHỌN  </button>
            </span>
            </div>

        </div>
    </form>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!--        <h1 class="h3 mb-2 text-gray-800">Tables</h1>-->
        <p class="mb-4">
        <h2>Những món bạn đã chọn hiển thị bên dưới</h2> </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kết quả hôm nay </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Ngày</th>
                            <th>Tinh Bột</th>
                            <th>Đạm</th>
                            <th>Xơ</th>
                            <th>Món ăn thêm</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><?php echo $time . " ngày " . date('d-m-Y'); ?></th>
                            <th><?php echo $tinhBot ?></th>
                            <th><?php echo $dam ?></th>
                            <th><?php echo $xo ?></th>
                            <th><?php echo $monPhu ?></th>
                            <th>
                                <a href="deleteResult.php?id=<?php echo $userID ?>&time=<?php echo $time ?>&date=<?php echo $date ?>&name=<?php echo $userName ?>">Delete</a>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


    <!-- Content Row -->


</div>
<?php include '../layout/footer.php' ?>


</body>
</html>
