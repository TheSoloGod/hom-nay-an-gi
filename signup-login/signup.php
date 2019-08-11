<?php
$userName1 = NULL;
$email = NULL;
$userPassword1 = NULL;
$passConfirm = NULL;
$height = NULL;
$weight = NULL;
$gender = NULL;

$userNameErr = NULL;
$emailErr = NULL;
$userPasswordErr = NULL;
$passConfirmErr = NULL;
$heightErr = NULL;
$weightErr = NULL;
$genderErr = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName1 = $_POST["username"];
    $email = $_POST["email"];
    $userPassword1 = $_POST["password"];
    $passConfirm = $_POST["passConfirm"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $gender = $_POST["gender"];
    $has_error = false;


    if (empty($userName1)) {
        $userNameErr = "Enter your name!";
        $has_error = true;
    }
    if (empty($email)) {
        $emailErr = "Enter your email!";
        $has_error = true;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Wrong email format (xxx@xxx.xxx.xxx)!";
            $has_error = true;
        }
    }
    if (empty($userPassword1)) {
        $userPasswordErr = " Enter your password!";
        $has_error = true;
    }
    if (empty($passConfirm) || $userPassword1 != $passConfirm) {
        $passConfirmErr = " Password do not match!";
        $has_error = true;
    }
    if (empty($height)) {
        $heightErr = " Enter your height!";
        $has_error = true;
    }
    if (empty($weight)) {
        $weightErr = " Enter your weight!";
        $has_error = true;
    }
    if (empty($gender)) {
        $genderErr = " Choose gender!";
        $has_error = true;
    }
    if (!$has_error) {

        include_once '../connectDB/connectDB.php';

        $sql = "INSERT INTO dataUsers (`userName`, `userPassword`, `email`)
               VALUES ('$userName1', '$userPassword1', '$email')";
        $conn->exec($sql);
        $conn = null;

        $userName1 = NULL;
        $email = NULL;
        $userPassword1 = NULL;
        $passConfirm = NULL;
        $height = NULL;
        $weight = NULL;
        $gender = NULL;
    } else {
    }

}
?>

<!doctype html>
<html lang="en">

<?php include "../layout/header.php"; ?>

<body class="bg-gradient-primary">

<!--<form method="post">-->
<!--    <table cellpadding="5">-->
<!--        <tr>-->
<!--            <th colspan="2" bgcolor="aqua">Register</th>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="label">Username <span class="required">*</span></td>-->
<!--            <td><input type="text" name="username" value="--><?php //echo $userName1; ?><!--" /><br>-->
<!--                <span class="error">--><?php //echo $userNameErr; ?><!--</span>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="label">Email <span class="required">*</span></td>-->
<!--            <td>-->
<!--                <input type="text" name="email" value="--><?php //echo $email; ?><!--" /><br>-->
<!--                <span class="error">--><?php //echo $emailErr; ?><!--</span>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="label">Password <span class="required">*</span></td>-->
<!--            <td>-->
<!--                <input type="password" name="password" value="--><?php //echo $userPassword1; ?><!--" /><br>-->
<!--                <span class="error">--><?php //echo $userPasswordErr; ?><!--</span>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="label">Confirm Password <span class="required">*</span></td>-->
<!--            <td>-->
<!--                <input type="password" name="passConfirm" value="--><?php //echo $passConfirm; ?><!--" /><br>-->
<!--                <span class="error">--><?php //echo $passConfirmErr; ?><!--</span>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="lable">Height <span class="required">*</span></td>-->
<!--            <td><input type="text" name="height" placeholder="meter" value="-->
<?php //echo $height; ?><!--" /><br>-->
<!--            <span class="error">--><?php //echo $heightErr; ?><!--</span>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="label">Weight <span class="required">*</span></td>-->
<!--            <td><input type="text" name="weight" placeholder="kg" value="--><?php //echo $weight; ?><!--" /><br>-->
<!--            <span class="error">--><?php //echo $weightErr; ?><!--</span>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="label">Gender <span class="required">*</span></td>-->
<!--            <td>-->
<!--                <label><input class="label" type="radio" name="gender" value="male">Male</label>-->
<!--                <label><input class="label" type="radio" name="gender" value="female">Female</label><br>-->
<!--                <span class="error">--><?php //echo $genderErr; ?><!--</span>-->
<!--            </td>-->
<!--        </tr>-->
<!--    </table>-->
<!--    <p><input class="input" type="submit" name="submit" value="Register"/></p>-->
<!--</form>-->

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="">
                            <div class="form-group">
                                <input type="text" name="username" value="<?php echo $userName1; ?>"
                                       class="form-control form-control-user" id="exampleInputEmail"
                                       placeholder="User Name">
                                <span class=" alert-danger"><?php echo $userNameErr; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" value="<?php echo $email; ?>"
                                       class="form-control form-control-user" id="exampleInputEmail"
                                       placeholder="Email">
                                <span class=" alert-danger"><?php echo $emailErr; ?></span>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" value="<?php echo $userPassword1; ?>"
                                           class="form-control form-control-user" id="exampleInputPassword"
                                           placeholder="Password">
                                    <span class=" alert-danger"><?php echo $userPasswordErr; ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="passConfirm" value="<?php echo $passConfirm; ?>"
                                           class="form-control form-control-user" id="exampleRepeatPassword"
                                           placeholder="Repeat Password">
                                    <span class=" alert-danger"><?php echo $passConfirmErr; ?></span>
                                </div>
                            </div>
                            <!--                            <div class="form-group row">-->
                            <!--                                <div class="col-sm-6 mb-3 mb-sm-0">-->
                            <!--                                    <input type="text" name="height" value="-->
                            <?php //echo $height; ?><!--" class="form-control form-control-user" id="exampleFirstName" placeholder="Height">-->
                            <!--                                    <span class="error">-->
                            <?php //echo $heightErr; ?><!--</span>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-sm-6">-->
                            <!--                                    <input type="text" name="weight" value="-->
                            <?php //echo $weight; ?><!--" class="form-control form-control-user" id="exampleLastName" placeholder="Weight">-->
                            <!--                                    <span class="error">-->
                            <?php //echo $weightErr; ?><!--</span-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div class="form-group row">-->
                            <!--                                <table style="width: 576px; text-align: center">-->
                            <!--                                    <tr>-->
                            <!--                                        <td>Gender:</td>-->
                            <!--                                        <td>-->
                            <!--                                            <label><input class="label" type="radio" name="gender" value="male">Male</label>-->
                            <!--                                        </td>-->
                            <!--                                        <td>-->
                            <!--                                            <label><input class="label" type="radio" name="gender" value="female">Female</label><br>-->
                            <!--                                        </td>-->
                            <!--                                        <span class="error">-->
                            <?php //echo $genderErr; ?><!--</span>-->
                            <!--                                    </tr>-->
                            <!--                                </table>-->
                            <!--                            </div>-->
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>

</div>

<?php include "../layout/footer.php" ?>

</body>
</html>

