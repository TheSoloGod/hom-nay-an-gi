
<?php
include_once '../connectDB/connectDB.php';
$userID = $_GET["id"];

$stmt = $conn->prepare('SELECT * FROM dataUsers where userID='.$userID);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
$result = $result[0];
$conn = null
?>
<?php
function ibm($height,$weight){
    $IBM=round($weight/($height*$height)*10000,2);
    return $IBM;
}

$ibm=ibm($result['height'],$result['weight']);

function checkBMI($number,$gender){
    if($gender=="Female"){
        if ($number<18.5){
            echo " Thap gay";
        }elseif ($number<22.9){
            echo "binh thuong";
        }elseif ($number==23){
            echo " ban nen van dong";
        }elseif ($number<25){
            echo "tien beo phi";
        }elseif ($number<30){
            echo "Can gian can";
        }elseif ($number<40){
            echo "Can gian can ngay";
        }else{
            echo " can gian can khan cap";
        }
    }elseif ($gender=="Male"){
        if ($number<18.5){
            echo " Thap gay";
        }elseif ($number<25){
            echo "binh thuong";
        }elseif ($number==25){
            echo " ban nen van dong";
        }elseif ($number<30){
            echo "tien beo phi";
        }elseif ($number<35){
            echo "Can gian can";
        }elseif ($number<40){
            echo "Can gian can ngay";
        }else{
            echo " can gian can khan cap";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<?php include "../layout/header.php"?>
<body>

<div id="wrapper">
    <?php include '../layout/sidebar.php'?>
<div >
<h1>Thông tin cá nhân </h1>
<div class="table">
    <table>
        <tr>
            <td>Name</td>
            <td><?php echo $result["userName"] ?></td>
            <td></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $result["email"] ?></td>
            <td></td>
        </tr>
        <tr>
            <td>Height</td>
            <td><?php echo $result["height"] ?></td>
            <td></td>
        </tr>
        <tr>
            <td>Weight</td>
            <td><?php echo $result["weight"] ?></td>
            <td></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $result["gender"] ?></td>
            <td></td>
        </tr>
        <tr>
            <td>IBM</td>
            <td ><?php echo ibm($result['height'],$result['weight'])?></td>
            <td ><span><a href="editUser.php?id=<?php echo $result['userID']?>&userName=<?php echo $result['userName'] ?>">Update</a></span></td>
        </tr>
    </table>
    <p> <?php checkBMI($ibm,$result['gender']); ?></p>
</div>
<?php include '../layout/footer.php'?>
<?php  ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"image/".$file_name);
            echo "Success";
        }else{
            print_r($errors);
        }
    }
}
?>

</div>

</div>
</div>

</body>
</html>
