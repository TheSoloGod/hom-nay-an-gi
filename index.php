<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hôm nay ăn gì?</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
<?php
include_once 'connectDB/connectDB.php';

$userName1 = NULL;
$userPassword1 = NULL;

$userNameErr = NULL;
$userPasswordErr = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName1 = $_POST["username"];
    $userPassword1 = $_POST["password"];

    $stmt = $conn->prepare("SELECT userID, userName, userPassword FROM dataUsers WHERE userName ='" . $userName1 . "'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $userID = $result[0]["userID"];
    $userName = $result[0]["userName"];
    $conn = null;
    $has_error = false;
    if (count($result) != 0) {
        if ($userPassword1 == $result[0]['userPassword']) {
            header("location: suggest/suggest.php?id=$userID&name=$userName");
        } else {
            echo 'Wrong password';
        }
    } else {
        echo 'Username do not exist';
    }


    if (empty($userName1)) {
        $userNameErr = "Enter your name!";
        $has_error = true;
    }

    if (empty($userPassword1)) {
        $userPasswordErr = " Enter your password!";
        $has_error = true;
    }

}
?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-3 "></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Hôm nay ăn gì? </h1>
                                </div>
                                <form class="user" method="post" action="">
                                    <div class="form-group">
                                        <input type="text" value="<?php echo $userName1; ?>" name="username"
                                               class="form-control form-control-user" id="exampleInputEmail"
                                               aria-describedby="emailHelp" placeholder="Enter User Name...">
                                        <span class="error"><?php echo $userNameErr; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" value="<?php echo $userPassword1; ?>"
                                               class="form-control form-control-user" id="exampleInputPassword"
                                               placeholder="Password">
                                        <span class="error"><?php echo $userPasswordErr; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button href="suggest/suggest.php?id=<?php if (empty($userID)) {
                                        echo $userID;
                                    }; ?>" type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="signup-login/signup.php">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 "></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>
