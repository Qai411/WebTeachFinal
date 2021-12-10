<?php
    require_once("../classes/Management.php");
    $management = new Management;
    $management->db_connect();

    session_start();

    if (isset($_POST['more'])){
        $_SESSION['id'] = $_POST['more'];
        header("Location: edit.php");
    }

?>

<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mammals.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mammals</title>
</head>
<body>
    
    <p>
        <?php  
            $management->getAllMammals();
            $mammals = $management->db_fetch();

            $management->getTotalMammals();
            $pop = $management->db_fetch();
        ?>
    </p>

    <div class="container position-relative">

        <h1 class="center">Mammals</h1>

        <h3 class="position-absolute top-0 end-0 ">
                Population : <?php echo $pop[0]["all"];?>
        </h3>

        <table class="table">
            <thead>
                <tr>
                    <th>General Name</th>
                    <th>Health Status</th>
                    <th>More</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach($mammals as $eachMammal){
                ?>
                <tr>
                    <td style='display: none'><?= $eachMammal['mammalTag']?></td>
                    <td><span> <?php
                        echo htmlspecialchars($eachMammal['generalName']); 
                    ?> </span></td>
                    <td> <?php echo htmlspecialchars($eachMammal["keeper_act_of_management"]);?></td>
                    <form action="mammals.php" method="post">
                        <td><button class="btn" style="background-color:#172774; color: white;" name="more" value=<?= $eachMammal['mammalTag'] ?> class="btn btn-success">MORE</button></td>
                    </form>
                    
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
        
    </div>



    

</body>
</html>