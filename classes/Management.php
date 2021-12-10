<?php
require_once('../settings/db_conn.php');

class Management extends DbConnection{

    public function storeAnimal(
            $anmalTag, $assignedKeeper, $generalName, $kingdom, $phylum, $class,
            $ordr, $family, $genus, $species,
            $sex, $dob, $admissionDate, $life_expectancy, $feedType, 
            $keeper_act_of_management, $homeID, $reportID
        ){
        $sql  = "INSERT INTO `animal` VALUES ('$anmalTag', '$assignedKeeper', '$generalName', '$kingdom', '$phylum', '$class',
            '$ordr', '$family', '$genus', '$species',
            '$sex', '$dob', '$admissionDate', '$life_expectancy', '$feedType', 
            '$keeper_act_of_management', '$homeID', '$reportID')";

        return $this->db_query($sql);
    }

    public function storeBird($birdTag, $beakType, $feetType, $birdEggs){
        $sql = "INSERT INTO `bird` VALUES ('$birdTag', '$beakType', '$feetType', '$birdEggs')";
        return $this->db_query($sql);
    }

    public function storeMammal($mammalTag,$skin,$maturity){
        $sql = "INSERT INTO `mammal` VALUES ('$mammalTag','$skin','$maturity')";
        return $this->db_query($sql);
    }

    public function storeReptile($repTag, $reptEggs, $isPoisonous){
        $sql = "INSERT INTO `bird` VALUES ('$repTag', '$reptEggs', '$isPoisonous')";
        return $this->db_query($sql);
    }    

    public function createFeed($feed, $amount){
        $sql = "INSERT INTO `feed` VALUES ('$feed', '$amount')";
        return $this->db_query($sql);
    }

    public function createStructure($id, $description, $length, $width, $habitat){
        $sql = "INSERT INTO `habitat` VALUES ('$id', '$description', '$length', '$width', '$habitat')";
        return $this->db_query($sql);
    }

    //Fetches the id of the recently entered data
    public function getID(){
        $sql = 'SELECT `animalTag` as `id` FROM `animal` ORDER BY `animalTag` DESC LIMIT 1';
        return $this->db_query($sql);
    }

    public function getIDFeed(){
        $sql = 'SELECT `feed` as `id` FROM `animal` ORDER BY `animalTag` DESC LIMIT 1';
        return $this->db_query($sql);
    }

    public function getIDStructure(){
        $sql = 'SELECT `homeID` as `id` FROM `habitat` ORDER BY `homeID` DESC LIMIT 1';
        return $this->db_query($sql);
    }

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
    public function admitAnimalToVet($id, $location, $drugsUsed){
        $sql = "UPDATE `vetcenter` SET `reportID` = '$id' `lab` = '$location', `drugsUsed` = '$drugsUsed'";
        return $this->db_query($sql);
    }

    public function updateHealthCondition($condition, $tag){
        $sql = "UPDATE `animal` SET `keeper_act_of_management` = '$condition' WHERE `animalTag` = '$tag'";
        return $this->db_query($sql);
    }

    //same as delete
    public function exportAnimal($id){
        $sql = "DELETE FROM `animal` WHERE `animalTag` = '$id'";
        return $this->db_query($sql);
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
        $sql = 'SELECT COUNT(*) as `sickBirds` FROM animal, bird WHERE animalTag = birdTag AND keeper_act_of_management NOT LIKE "healthy"';
        return $this->db_query($sql);
    }

    public function getUnhealthyMammals(){
        $sql = 'SELECT COUNT(*) AS `sickMammals` FROM animal, mammal WHERE animalTag = mammalTag AND keeper_act_of_management NOT LIKE "healthy"';
        return $this->db_query($sql);
    }

    public function getUnhealthyReptiles(){
        $sql = 'SELECT COUNT(*) AS `sickReptiles` FROM animal, reptile WHERE animalTag = repTag AND keeper_act_of_management NOT LIKE "healthy"';
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
        $sql = 'SELECT `birdTag`,`generalName`, `keeper_act_of_management`, `admission_date` FROM `animal`,`bird` WHERE `animalTag` = `birdTag`';
        return $this->db_query($sql);
    }


    public function getAllMammals(){
        $sql = 'SELECT `mammalTag`, `generalName`, `keeper_act_of_management` FROM `animal`, `mammal` WHERE `animalTag` = `mammalTag`';
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