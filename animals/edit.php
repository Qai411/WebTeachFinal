<?php
require_once "../classes/Management.php";
session_start();
$moreInfo = new Management;
$moreInfo->db_connect();

$_SESSION['token'] =  $_POST['more'];  //this is the id that uniquely identifies every animal
$token = $_SESSION['token'];


print_r($data);

if(isset($_POST['updateHealth'])){
    $condtion = $_POST['health'];
    $moreInfo->updateHealthCondition($conditon, $token);
    header("Location: animals.php");
}

if(isset($_POST['discard'])){
    echo '<script>confirm("Do you want to discard this animal?")</script>';
    //$moreInfo->exportAnimal($token);
    // header("Location: animals.php");
}

$moreInfo->getSingleAnimal($token);
$data = $moreInfo->db_fetch();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Making Changes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div>
        <img src="" alt="No image uploaded yet">
    </div>

    <div>
        <p>Real Name: <?php  echo $data[0]['generalName']?></p>
        <p>Species: <?php  echo $data[0]['species']?></p>
        <p>sex: <?php  echo $data[0]['sex']?></p>
        <p>Life-Expectancy: <?php  echo $data[0]['life_expectancy']?></p>
    </div>


    <div>
        <form action="" method="post">
            <textarea id="health" type="text" name="health" value=<?php echo $data[0]['keeper_act_of_management']; ?> placeholder="current health status"></textarea><br>
            <input type="submit" value="Save changes" class="btn btn-success" name="updateHealth"><br>

            <input type="submit" name="discard" id="delete" value="DISCARD" class="btn btn-danger">
        </form>
    </div>
</body>
</html>