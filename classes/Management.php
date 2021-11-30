<?php
require_once('../settings/db_conn.php');

class Management extends DbConnection{
    public function storeAnimal(
            $anmalTag, $assignedKeeper, $generalName, $kingdom, $phylum, $class,
            $ordr, $family, $genus, $species,
            $sex, $dob, $admissionDate, $life_expectancy, $feedType, 
            $keeper_act_of_management, $homeID, $reportID
        ){
        $sql  = "INSERT INTO `animal`(`animalTag`, `assignedKeeper`, `generalName`, `kingdom`, `phylum`, `class`,
            `ordr`, `family`, `genus`, `species`,
           `sex`, `dob`, `admissionDate`, `life_expectancy`, `feedType`, 
           `keeper_act_of_management`, `homeID`, `reportID` VALUES ('$anmalTag', '$assignedKeeper', '$generalName', '$kingdom', '$phylum', '$class',
            '$ordr', '$family', '$genus', '$species',
            '$sex', '$dob', '$admissionDate', '$life_expectancy', '$feedType', 
            '$keeper_act_of_management', '$homeID', '$reportID')";

        return $this->db_query($sql);
    }

    // public function recruitPersonnel(
    //     we are not recruiting anyone
    // ){
        
    // }

    //All animals
    public function getAnimalsInfo(){
        $sql = "SELECT * FROM `animal`";
        return $this->db_query($sql);
    }

    public function totalAnimals(){
        $sql = "SELECT `count`(*) FROM `animal`";
    }

    //One specific animal
    public function getSingleAnimal($id){
        $sql = "SELECT * FROM `animal` WHERE `animalTag` = '$id'";
        return $this->db_query($sql);
    }

    //For drug used, it will be id (1,2, or 3), loaction (LB main gate, LB mainroom,LB Core room), etc and drugUsed (sleeping pils, First Aid, etc)
    public function admitAnimalToVet($id, $location, $drugUsed){
        $sql = "UPDATE `vetcenter` SET `reportID` = '$id' `lab` = '$location', `drugsUsed` = '$drugsUsed'";
    }

    //same as delete
    public function exportAnimal($id){
        $sql = "DELETE FROM `animal` WHERE `animalTag` = '$id'";
    }


    public function getUnhealthyAnimals(){
        $sql = 'SELECT COUNT(*) as `sick` FROM `animal` WHERE `keeper_act_of_management` NOT LIKE "healthy"';
        return $this->db_query($sql);
    }

    public function getHealthyAnimals(){
        $sql = 'SELECT COUNT(*) FROM `animal` WHERE `keeper_act_of_management` LIKE "healthy"';
        return $this->db_query($sql);
    }

    public function getUnhealthyBirds(){
        $sqk = 'SELECT COUNT(*) as `sickBirds` FROM animal, bird WHERE animalTag = birdTag AND keeper_act_of_management NOT LIKE "healthy"';
        return $this->db_query($sql);
    }

    public function getHealthyMammals(){
        $sql = 'SELECT COUNT(*) FROM animal, mammal WHERE animalTag = mammalTag AND keeper_act_of_management LIKE "healthy"';
        return $this->db_query($sql);
    }

    public function getHealthyReptiles(){
        $sql = 'SELECT COUNT(*) FROM animal, reptiles WHERE animalTag = repTag AND keeper_act_of_management LIKE "healthy"';
        return $this->db_query($sql);
    }

    public function getFeedConsumption(){
        $sql = 'SELECT SUM(`amount`) AS `food` FROM `feed`';
        return $this->db_query($sql);
    }

    public function getLandUsed(){
        $sql = 'SELECT SUM(`length` * `width`) as `acres` FROM `habitat`;';
        return $this->db_query($sql);
    }

    public function getReptiles(){


    }

    public function getEachBirdEggs(){

        $sql = 'SELECT DISTINCT(generalName), SUM(birdEggs) as `eggs` FROM `animal`,`bird`WHERE animalTag = birdTag GROUP BY generalName';
        return $this->db_query($sql);
        
    }

    public function getAllBirds(){
        $sql = 'SELECT `birdTag`,`generalName`, `species`, `admission_date` FROM `animal`,`bird` WHERE `animalTag` = `birdTag`';
        return $this->db_query($sql);
    }


    public function getAllMammals(){
        $sql = 'SELECT `mammalTag`, `generalName`, `feedType` FROM `animal`, `mammal` WHERE `animalTag` = `mammalTag`';
        return $this->db_query($sql);
    }

    public function getAllReptiles(){
        $sql = 'SELECT `repTag`, `generalName`, `isPoisonous` FROM `animal`, `reptile` WHERE `animalTag` = `repTag`';
        return $this->db_query($sql);   
    }


    public function getTotalBirds(){
        $sql = 'SELECT COUNT(*) AS `all` FROM `bird`';
        return $this->db_query($sql);
    }

    public function getTotalMammals(){
        $sql = 'SELECT COUNT(*) AS `all` FROM `mammal`';
        return $this->db_query($sql);
    }

    public function getTotalReptiles(){
        $sql = 'SELECT COUNT(*) AS `all` FROM `reptile`';
        return $this->db_query($sql);
    }


}
?>