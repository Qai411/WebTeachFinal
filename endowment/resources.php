<?php
    require_once('../classes/Management.php');
    require_once('../classes/validation.php');

    $errorsFeed = array('feed'=>'', 'qty' => '');
    $errorsStructure = array('habitat'=>'','length'=>'', 'width'=>'', 'description'=>'', '');

    $resourceKeeper = new Management;
    $resourceKeeper->db_connect();

    $validator  = new validator;

    $result = "";


    if(isset($_POST['buy'])){

        $validator->validate('feed', '/[a-zA-Z0-9]/', $errorsFeed);
        $validator->validate('qty', '/[0-9]/', $errorsFeed);


        if (!array_filter($errorsFeed)){

            $feed = $_POST['feed'];
            $amount = $_POST['qty'];

            $resourceKeeper->createFeed($feed, $amount);
            $result =  "Success";
        }else{
            $result =  "Something went wrong";
        }
    }

    if(isset($_POST['build'])){

        

        $validator->validate('habitat', '/[a-zA-Z0-9]/', $errorsStructure);
        $validator->validate('length', '/[0-9]/', $errorsStructure);
        $validator->validate('width', '/[0-9]/', $errorsStructure);
        $validator->validate('description', '/[a-zA-Z0-9]/', $errorsStructure);

        if(!array_filter($errorsStructure)){

            echo print_r($errorsStructure);

            $description = $_POST['description'];
            $length = $_POST['length'];
            $width = $_POST['width'];
            $habitat = $_POST['habitat'];

            //algorithm for getting id
            $resourceKeeper->getIDStructure();
            $oldID = $resourceKeeper->db_fetch()[0]['id'];
            print_r($oldID);
            $varPart = explode('-', $oldID)[0];
            $intPart = explode('-', $oldID)[1];
            ++$intPart;
            $newId = $varPart . "-" . $intPart;
            echo($newId);
            //---end of algorithm---//

            $resourceKeeper->createStructure($newId, $description, $length, $width, $habitat);
            $result =  "Success";
        }else{
            $result =  "Something went wrong";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources</title>
</head>
<body>
    <form id="Resource" action="resources.php" method="post">
        <div class="food">
            <div>
                <h3>
                    BUY FEED
                </h3>
            </div>
            <input type="text" name="feed" id="feed" placeholder="Feed Name">
            <small><?php echo $errorsFeed['feed']; ?></small> <br>
            <input type="number" name="qty" placeholder="Quantity">
            <small><?php echo $errorsFeed['qty']; ?></small> <br>

            <input type="submit" name="buy" value="BUY FEED">
            
        </div>

        <div class="land">
            <div>
                RECORD NEWLY BUILT SHELTER
            </div>
            <div>
                <input type="text" name="habitat" placeholder="Type of shelther">
                <small><?php echo $errorsStructure['habitat']; ?></small> <br>
                <input type="number" name="length" placeholder="Length">
                <small><?php echo $errorsStructure['length']; ?></small> <br>
                <input type="number" name="width" placeholder="Width">
                <small><?php echo $errorsStructure['width']; ?></small> <br>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
                <small><?php echo $errorsStructure['description']; ?></small> <br>

                <input type="submit" name="build" value="RECORD STRUCTURE">
                
            </div>
        </div>
    </form>

    <span id="result"><?php echo $result?></span>
    
</body>
</html>