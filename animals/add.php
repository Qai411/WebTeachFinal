<?php
    require_once __DIR__.'/../classes/Management.php';
    $recruiter = new Management;
    $recruiter->db_connect();
    
    $generalErrors = array('generalName' => '', 'kingdom' => '', 'phylum' => '', 'class'=>'', 'ordr' => '', 'family'=> '', 'genus'=>'', 'species'=>'' , 'sex'=> '' );
    $specificErrors = array()
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend>Personal Information</legend>

                <input type="text" placeholder="Name" name="generalName" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['generalName'] : ""; ?> > <br>
                <input type="text" placeholder="kingdom" name="kingdom" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['kingdom'] : ""; ?> > <br>
                <input type="text" placeholder="phylum" name="phylum" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['phylum'] : ""; ?> > <br>
                <input type="text" placeholder="class" name="class" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['class'] : ""; ?> >  <br>
                <input type="text" placeholder="order" name="ordr" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['ordr'] : ""; ?> >  <br>
                <input type="text" placeholder="family" name="family" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['family'] : ""; ?> > <br>
                <input type="text" placeholder="genus" name="genus" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['genus'] : ""; ?>>  <br>
                <input type="text" placeholder="species" name="species" value=<?= isset($_POST['general']) || isset($_POST['SUBMIT_FINAL'])? $_POST['species'] : ""; ?> > <br>

                <input type="radio" id="male" name="sex">
                <label for="male">Male</label>

                <input type="radio" id="female" name="sex">
                <label for="female">Female</label>
                <br>
                <input type="date" id="dob" name="dob">
                <br>

                <select id="animalType" name="animalType">
                    <option value="">--Animal Type--</option>
                    <option value="mammal">Mammal</option>
                    <option value="reptile">Reptile</option>
                    <option value="bird">Bird</option>
                </select>

            </fieldset>

            <input type="submit" name="general" value="Save"> <br>

            <?php
                if(isset($_POST['general'])){
                    
                    if($_POST['animalType'] === 'mammal'){
                        ?>

                        <select id="skin" name="skin">
                            <option value="">--Skin--</option>
                            <option value="fur">Fur</option>
                            <option value="furless">Furless</option>
                        </select>
                        <br>
                        <select id="maturity" name="maturity">
                            <option value="">--Maturity--</option>
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="cub">Cub</option>
                        </select>  
                        <br>
                    <?php
                    }
                
                    if($_POST["animalType"] === "bird"){
                    ?>
                        <select id="beakType" name="beakType">
                            <option value="">--Beak Type--</option>
                            <option value="'meat-eater'">Meat Eater</option>
                            <option value="seed-eater">Seed Eater</option>
                            <option value="fruit-nut-eater">Fruit-Nut Eater</option>
                            <option value="fish-eater">Fish eater</option>
                        </select> 
                        <br>
                        <select id="feetType" name="feetType">
                            <option value="">--Feet Type--</option>
                            <option value="'anisodactyl'">Anisodactyl</option>
                            <option value="zygodactyl">Zygodactyl</option>
                            <option value="heterodactyl">Heterodactyl</option>
                            <option value="pamprodactyl">Pamprodactyl</option>
                        </select>
                        <br>
                        <label for="bEggs">Averages eggs laid: </label>
                        <input id="bEggs" type="number" name="birdEggs">
                        <br>
                    <?php
                    }

                    if($_POST['animalType'] === 'reptile'){
                    ?>

                    <label for="rEggs">Average Eggs laid: </label>
                    <input id="rEggs" type="number" name="reptEggs">
                    <br>
                        <select id="isPoisonous" name="isPoisonous">
                            <option value="">--Feet Type--</option>
                            <option value="'non-poisonous'">Non-poisonous</option>
                            <option value="poisonous">Poisonous</option>
                        </select>
                        <br>
            <?php
                    }
                }
            ?>

            <input type="submit" name="SUBMIT_FINAL" value="Submit">

        </form>
    </div>
</body>

</html>