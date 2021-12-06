<?php
    require_once "../classes/Management.php";
    $management = new Management;
    $management->db_connect();

    $score = new Management();
    $score->db_connect();

    $birds = [];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link rel="stylesheet" href="../../header/header.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Birds</title>
</head>
<body>
 
    
        <?php  
            $management->getAllBirds();
            $birds = $management->db_fetch();

            $score->getTotalBirds();
            $pop = $score->db_fetch();
        ?>


    <div class="container position-relative">

        <h1>Birds</h1>

        <h3 class="position-absolute top-0 end-0 ">
            Population : <?php echo $pop[0]["all"];?>
        </h3>
    
        <table class="table">
            <thead>
                <tr>
                    <th>General Name</th>
                    <th>Species</th>
                    <th>Admission Date</th>
                    <th>More</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach($birds as $eachBird){
                ?>
                <tr>
                    <td><span style="color: black;"> <?php
                        echo htmlspecialchars($eachBird['generalName']); 
                    ?> </span></td>
                    <td> <?php echo htmlspecialchars($eachBird["keeper_act_of_management"]);?></td>
                    <td><?php echo htmlspecialchars($eachBird["admission_date"]); ?></td>
                    <form action="edit.php" method="post" enctype="multipart/form">
                    <td><button name="more" value=<?= $eachBird['birdTag'] ?> class="btn btn-success">MORE</button></td>
                    </form>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>


    </div>


</body>
</html>