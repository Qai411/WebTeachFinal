<?php
    require_once("../classes/Management.php");
    $management = new Management;
    $management->db_connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reptiles.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Reptiles</title>
</head>
<body>
    <div class="container position-relative">

         <h1>Reptiles</h1>

        <p>
            <?php  
                $management->getAllReptiles();
                $reptiles = $management->db_fetch();

                $management->getTotalReptiles();
                $pop = $management->db_fetch()
            ?>
        </p>

        <h3 class="position-absolute top-0 end-0 " style="padding-right: 30px;">
                Population : <?php echo $pop[0]["all"];?>
        </h3>

        <table class="table">
            <thead>
                <tr>
                    <th>General Name</th>
                    <th>Venomous</th>
                    <th>More</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach($reptiles as $eachReptile){
                ?>
                <tr>
                    <td style='display: none'><?= $eachReptile['repTag']?></td>
                    <td><span> <?php
                        echo htmlspecialchars($eachReptile['generalName']); 
                    ?> </span></td>
                    <td> <?php echo htmlspecialchars($eachReptile["isPoisonous"]);?></td>
                    <td><button class="btn" name="more" style="background-color:#ff8906; color: white;" value=<?= $eachReptile['repTag'] ?> class="btn btn-success">MORE</button></td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>

    </div>

</body>
</html>