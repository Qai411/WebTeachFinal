<?php
    require_once __DIR__.'/../classes/Management.php';
    require_once __DIR__.'/../classes/validation.php';
    $recruiter = new Management;
    $recruiter->db_connect();

    $valid = new Validator;
    
    $generalErrors = array('generalName' => '', 'kingdom' => '', 'phylum' => '', 'class'=>'', 'ordr' => '', 'family'=> '', 'genus'=>'', 'species'=>'' , 'sex'=> '', 'animalType' => '');
    $mammalErrors = array('skin'=>'', 'maturity'=>'');
    $reptileErrors = array('reptEggs'=>'', 'isPoisonous'=>'');
    $birdErrors = array('beakType'=>'', 'feetType'=>'', 'birdEggs'=>'');

    // function validate($name, $regex){
    //     global $generalErrors;
    //     if(empty($_POST[$name])){
    //         $generalErrors[$name] = "Required";
    //     }else{
    //         $input = $_POST[$name];
    //         if(!preg_match($regex, $input)){
    //             $generalErrors[$name] = "Invalid";
    //         }
    //     }
    // }

    // function validateSelect($name){
    //     global $generalErrors;
    //     if(empty($_POST[$name])){
    //         $generalErrors[$name] = "Required";
    //     }
    // }

    // function validateRept($name){
    //     global $reptileErrors;
    //     if(empty($_POST[$name])){
    //         $reptileErrors[$name] = "Required";
    //     }
    // }

    // function validateMammal($name){
    //     global $reptileErrors;
    //     if(empty($_POST[$name])){
    //         $mammalErrors[$name] = "Required";
    //     }
    // }

    // function validateBird($name){
    //     global $reptileErrors;
    //     if(empty($_POST[$name])){
    //         $birdErrors[$name] = "Required";
    //     }
    // }




    if (isset($_POST['SUBMIT_FINAL'])){
        $valid->validate("generalName",'/^[a-zA-Z]+$/',$generalErrors);
        $valid->validate("kingdom",'/^[a-zA-Z]+$/',$generalErrors);
        $valid->validate("phylum",'/^[a-zA-Z]+$/',$generalErrors);
        $valid->validate("class",'/^[a-zA-Z]+$/',$generalErrors);
        $valid->validate("ordr",'/^[a-zA-Z]+$/',$generalErrors);
        $valid->validate("family",'/^[a-zA-Z]+$/',$generalErrors);
        $valid->validate("genus",'/^[a-zA-Z]+$/',$generalErrors);

        $valid->validateSelect("animalType",$generalErrors);
        $valid->validateMammal("skin",$mammalErrors);
        $valid->validateMammal("maturity",$mammalErrors);
        $valid->validateBird("beakType",$birdErrors);
        $valid->validateBird("feetType",$birdErrors);
        $valid->validateBird("birdEggs",$birdErrors);
        $valid->validateRept("reptEggs",$reptileErrors);
        $valid->validateRept("isPoisonous",$reptileErrors);

        $generalName =  $_POST['generalName'];
        $kingdom =  $_POST['kingdom'];
        $phylum =  $_POST['phylum'];
        $class =  $_POST['class'];
        $order =  $_POST['ordr'];
        $family = $_POST['family'];
        $genus =  $_POST['genus'];
        $species =  $_POST['species'];
        $sex =  $_POST['sex'];

        $animalType =  $_POST['animalType'];

        
        $recruiter->getID();
        $id = $recruiter->db_fetch()[0]['id'];

        //Using the previous id to generate the next id
        $newId  = explode("-", $id)[1];
        echo "   ".$newId . "   ";
        $number_on_roll = explode("Z", $newId)[1];
        echo print_r(explode("Z", $newId));
        ++$number_on_roll;   //increase the id by 1
        $realId = explode("-", $id)[0] . "-". explode("Z", $newId)[0] . "Z" . strval($number_on_roll);
        echo "realID is :". $realId;

       echo var_dump($recruiter->storeAnimal($realId, 'ZKP-002', $generalName, $kingdom, $phylum, $class, $order, $family, $genus ,$species, $sex, '2018-06-13', '2020-01-27', 45, "omnivore", "healthy", "HBT-17", "1"));
        $recruiter->getID();
        echo "REALEST ID" .$recruiter->db_fetch()[0]['id'];

        print_r($generalErrors);

        if(!array_filter($generalErrors)){

            if(!array_filter($generalErrors) && $_POST['animalType'] === 'mammal' && !array_filter($mammalErrors)){
                echo "will be adding mammal";
                        //Mammal specialisation
                $skin =  $_POST['skin'];
                $maturity =  $_POST['maturity'];
                $recruiter->storeMammal($realId,$skin, $maturity);
            }

            if(!array_filter($generalErrors) && $_POST['animalType'] === 'bird' && !array_filter($birdErrors)){
                echo "will be adding bird";
                //bird Specialisation
                $beakType = $_POST['beakType'];
                $feetType = $_POST['feetType'];
                $birdEggs = $_POST['birdEggs'];
                $recruiter->storeBird($realId, $beakType, $feetType, $birdEggs);
            }

            if(!array_filter($generalErrors) && $_POST['animalType'] === 'reptile' && !array_filter($reptileErrors)){
                echo "will be adding reptile";
                //reptile Specialisation
                $reptEggs =  $_POST['reptEggs'];
                $isPoisonous = $_POST['isPoisonous'];
                $recruiter->storeReptile($realId, $reptEggs, $isPoisonous);
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
    <link rel="stylesheet" href="../css/add.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="add.php" method="post">
            <fieldset>
                <legend style="text-align: center">Register an Animal</legend>
                <div class="input-group">
                    <input type="text" placeholder="Name" name="generalName" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['generalName'] : ""; ?> > 
                    <small><?php echo $generalErrors['generalName']; ?></small> <br>
                    <input type="text" placeholder="kingdom" name="kingdom" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['kingdom'] : ""; ?> >
                    <small><?php echo $generalErrors['kingdom']; ?></small><br>
                    <input type="text" placeholder="phylum" name="phylum" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['phylum'] : ""; ?> >
                    <small><?php echo $generalErrors['phylum']; ?></small> <br>
                    <input type="text" placeholder="class" name="class" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['class'] : ""; ?> >
                    <small><?php echo $generalErrors['class']; ?></small>  <br>
                    <input type="text" placeholder="order" name="ordr" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['ordr'] : ""; ?> >
                    <small><?php echo $generalErrors['ordr']; ?></small>  <br>
                    <input type="text" placeholder="family" name="family" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['family'] : ""; ?> >
                    <small><?php echo $generalErrors['family']; ?></small> <br>
                    <input type="text" placeholder="genus" name="genus" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['genus'] : ""; ?>>
                    <small><?php echo $generalErrors['genus']; ?></small>  <br>
                    <input type="text" placeholder="species" name="species" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['species'] : ""; ?> >
                    <small><?php echo $generalErrors['species']; ?></small> <br>
                </div>
               
                <div style="display: flex;">
                    <label for="male">Male</label>
                    <input type="radio" id="male" name="sex" value='M'>
                    <label for="female">Female</label>
                    <input type="radio" id="female" name="sex" value="F">
                </div>

                
                <br>
                <select id="animalType" name="animalType">
                    <option value="">--Animal Type--</option>
                    <option value="mammal">Mammal</option>
                    <option value="reptile">Reptile</option>
                    <option value="bird">Bird</option>
                </select>
                <small><?php echo $generalErrors['animalType']; ?></small> <br>
                

            </fieldset>

            <input  class="btn btn-primary" type="submit" name="general" value="Save"> <br>

            <?php
                if(isset($_POST['general'])){
                    ?>

                    <?php
                    if($_POST['animalType'] === 'mammal'){
                        ?>
                        <select id="skin" name="skin">
                            <option value="">--Skin--</option>
                            <option value="fur">Fur</option>
                            <option value="furless">Furless</option>
                        </select>
                        <small><?php echo $mammalErrors['skin']; ?></small>
                        <br>
                        <select id="maturity" name="maturity">
                            <option value="">--Maturity--</option>
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="cub">Cub</option>
                        </select>  
                        <small><?php echo $mammalErrors['maturity']; ?></small>
                        <br>
                    <?php
                    }
                
                    if($_POST["animalType"] === "bird"){
                    ?>
                        <select id="beakType" name="beakType">
                            <option value="">--Beak Type--</option>
                            <option value="meat-eater">Meat Eater</option>
                            <option value="seed-eater">Seed Eater</option>
                            <option value="fruit-nut-eater">Fruit-Nut Eater</option>
                            <option value="fish-eater">Fish eater</option>
                        </select> 
                        <small><?php echo $birdErrors['beakType']; ?></small>
                        <br>
                        <select id="feetType" name="feetType">
                            <option value="">--Feet Type--</option>
                            <option value="anisodactyl">Anisodactyl</option>
                            <option value="zygodactyl">Zygodactyl</option>
                            <option value="heterodactyl">Heterodactyl</option>
                            <option value="pamprodactyl">Pamprodactyl</option>
                        </select>
                        <small><?php echo $birdErrors['feetType']; ?></small>
                        <br>
                        <label for="bEggs">Averages eggs laid: </label>
                        <input id="bEggs" type="number" name="birdEggs">
                        <br>
                    <?php
                    }
                    ?>

                    <?php
                    if($_POST['animalType'] === 'reptile'){
                    ?>

                    <label for="rEggs">Average Eggs laid: </label>
                    <input id="rEggs" type="number" name="reptEggs">
                    <small><?php echo $reptileErrors['reptEggs']; ?></small>
                    <br>
                        <select id="isPoisonous" name="isPoisonous">
                            <option value="">--Vernomous?--</option>
                            <option value="non-poisonous">Non-poisonous</option>
                            <option value="poisonous">Poisonous</option>
                        </select>
                        <small><?php echo $reptileErrors['isPoisonous']; ?></small>
                        <br>
            <?php
                    }
                }
            ?>

            <input class="btn btn-success" type="submit" name="SUBMIT_FINAL" value="Submit">

        </form>
    </div>
</body>

</html>