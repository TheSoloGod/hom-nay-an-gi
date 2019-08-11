<?php
include_once '../connectDB/connectDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['id'])) {
        $userID = $_GET['id'];
    }

        $userName = $_GET['name'];

    $email = $_POST['email'];
    if (isset($_POST['height'])) {
        $height = $_POST['height'];
    }
    if (isset($_POST['weight'])) {
        $weight = $_POST['weight'];
    }
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }

    $sql = "UPDATE dataUsers 
            SET email = '$email',
                height = '$height',
                weight = '$weight',
                gender = '$gender'
            WHERE userID = '$userID'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    header("location: info.php?id=$userID&name=$userName", true);
}
?>
<!doctype html>
<html lang="en">
<?php include "../layout/header.php"?>
<body>

<div id="wrapper">
    <?php include '../layout/sidebar.php'?>

<h2>Chỉnh sửa thông tin cá nhân </h2>
<div class="table">
    <form method="post" action="">
        <table>
            <tr>
                <td>User Name</td>
                <td><?php echo $_GET['userName']?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" size="20" placeholder=""></td>
            </tr>
            <tr>
                <td>Height</td>
                <td><input type="text" name="height" size="20" placeholder=""></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><input type="text" name="weight" size="20" placeholder=""></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="gender" size="20" placeholder=""></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
</div>
</div>
<?php include '../layout/footer.php' ?>

</body>
</html>
