<?php
require_once "../classes/Management.php";
session_start();
$moreInfo = new Management;
$moreInfo->db_connect();

 //this is the id that uniquely identifies every animal
$token = $_SESSION['id'];


$moreInfo->getSingleAnimal($token);
$data = $moreInfo->db_fetch();

if(isset($_POST['updateHealth'])){
    $condition = $_POST['health'];

    if(!($condition == "")){
        var_dump($moreInfo->updateHealthCondition($condition, $token));
        echo $_POST['health'] . "   ". $token;
        session_abort();
    }
    header("Location: animals.php");

}
 ?>

<?php
if(isset($_POST['discard'])){
    ?>
    <script> cf =  confirm("Do you want to discard this animal?");
    cf();
    if (cf){
        <?php echo
            $moreInfo->exportAnimal($token);
            session_abort();
            header("Location: animals.php");
        ?>
    }
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Making Changes</title>
    <link rel="stylesheet" href="../css/edit.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <a href="animals.php">Back</a>
    <div class="container form-control">
        <div>
            <img src= <?= '../profiles/'.$data[0]['generalName'].'.jpg'?> alt="No image uploaded yet" width=200px height=150px">
        </div>

        <div id="details">
            <p>Real Name: <?php  echo $data[0]['generalName']?></p>
            <p>Species: <?php  echo $data[0]['species']?></p>
            <p>sex: <?php  echo $data[0]['sex']?></p>
            <p>Life-Expectancy: <?php  echo $data[0]['life_expectancy']?></p>
        </div>


        <div>
            <form action="" method="post">
                <input type="text" name="health" placeholder="current health status" value=<?php isset($token) ? $token : "";?> ><br>
                <input type="submit" value="Save changes" class="btn btn-success" name="updateHealth"><br>

                <input type="submit" name="discard" id="delete" value="DISCARD" class="btn btn-danger">
            </form>
        </div>
    </div>


</body>
</html>