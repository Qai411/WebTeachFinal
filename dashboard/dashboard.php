<?php
include_once('../classes/Management.php');


//Population score
$management = new Management;
$management->db_connect();

$management->getTotalMammals();
$mammals = $management->db_fetch();

$management->getTotalReptiles();
$reptiles = $management->db_fetch();

$management->getTotalBirds();
$birds = $management->db_fetch();

//Produce Score
$management->getEachBirdEggs();
$birdEggs = $management->db_fetch();

//Resources score
$management->getFeedConsumption();
$foodKg = $management->db_fetch();

$management->getLandUsed();
$construction = $management->db_fetch();

//health Score
$management->getUnhealthyAnimals();
$sickAnimals = $management->db_fetch();

$management->getUnhealthyMammals();
$sickMammals = $management->db_fetch();

$management->getUnhealthyReptiles();
$sickReptiles = $management->db_fetch();

$management->getUnhealthyBirds();
$sickBirds = $management->db_fetch();





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <div class="overallContent">

        <div class="sideContent d-flex-column flex-shrink-0">
            <a href="../login/login.php"><img class="mb-4" src="../resources/images/logo.png" alt="Logo" Title="Log Out" style="margin-left: 27px;"></a>
            <div class="sideCenterPos">
                <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                    <li><a href="../home/home.php"><img id= "homeHover" src="../resources/images/home_white.png" alt="home" title="Home" /></a></li>
                    <li><a href="../animals/animals.php"><img src="../resources/images/animal_white.png" alt="animals" title="Animals"></a></li>
                    <li><a href="../endowment/resources.php"><img src="../resources/images/landused_white.png" alt="resources" title="Land Used"></a></li>
                </ul>
            </div>
        </div>

        <div class="mainContent">
            <h1 style='color: #2CB67D; margin-left: 50px; margin-bottom: 20px;'>DASHBOARD</h1>

            <div>
                <!-- 4 functionalities come here -->
                <div class="flex-1-2">
                    <!--Population-->
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Statistics of Animals</title><rect width="100%" height="100%" fill="#172774"/><text x="30%" y="50%" fill="#dee2e6" dy=".3em">POPULATION</text></svg>

                            <div class="card-body">
                            <h5 class="card-title">TOTAL :  <?php echo $mammals[0]["all"] + $birds[0]['all'] + $reptiles[0]['all'];?></h5>
                            <p class="card-text">Number of Mammals: <?php echo $mammals[0]['all']?></p>
                            <p class="card-text">Number of Reptiles: <?php echo $reptiles[0]['all']?></p>
                            <p class="card-text">Number of Birds: <?php echo $birds[0]['all']?></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>

                    <!--Produce-->
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120"  role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>What animals produce</title><rect width="100%" height="100%" fill="#2F88FF"/><text x="30%" y="50%" fill="#dee2e6" dy=".3em">BY-PRODUCTS</text></svg>

                            <div class="card-body">
                            <h5 class="card-title">EGG PRODUCTION FROM BIRDS</h5>
                            <p class="card-text">
                                <?php
                                    foreach ($birdEggs as $produce){
                                         echo $produce['generalName'] . "s have " . $produce['eggs'] .' eggs<br />';
                                ?>
                                <?php } ?>
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex-3-4">
                                    <!--Resources-->
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#2E7D32"/><text x="30%" y="50%" fill="#dee2e6" dy=".3em">RESOURCES</text></svg>

                            <div class="card-body">
                            <h5 class="card-title">LAND USE AND FEED QTY</h5>
                            <p class="card-text">
                                <?php 
                                    echo $foodKg[0]['food'] . " Kg needed to feed animals" ."<br />";
                                    echo $construction[0]['acres']. " square meters of land used";
                                ?>
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>

                    <!--Tourist-->
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#A52A2A"/><text x="30%" y="50%" fill="#dee2e6">HEALTH CONDITION</text></svg>

                            <div class="card-body">
                            <h5 class="card-title">TOTAL :  <?php echo $sickAnimals[0]['sick'];?></h5>
                            <p class="card-text">
                                <?php
                                    echo "Sick Mammals: ". $sickMammals[0]['sickMammals']. '<br />';
                                    echo "Sick Reptiles: ". $sickReptiles[0]['sickReptiles']. '<br />';
                                    echo "Sick Birds: ". $sickBirds[0]['sickBirds'] .'<br />';
                                ?>
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
</html>





































<!--
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="dashboard.css">
    
</head>
    <body>
    <*?php
            include("../header/header.php");

        ?*/>
        <div class="mainContainer">
            <div>
                <section class="container-left">
                    <div>
                        <ul id="dashboardWarp">
                            <li>
                                <div>
                                    <img src="#home" alt="Home image">
                                    <a href="dashboard.php">Home</a>
                                </div>
                            </li>
            
                            <li>
                                <div>
                                    <img src="#animals" alt="animals image">
                                    <a href="dashboard.php">Animals</a>
                                </div>
                            </li>
            
                            <li>
                                <div>
                                    <img src="#vertinary" alt="vertinary image">
                                    <a href="dashboard.php">Vertinary</a>
                                </div>
                            </li>
            
                            <li>
                                <div>
                                    <img src="#people" alt="people image">
                                    <a href="dashboard.php">People</a>
                                </div>
                            </li>
            
                            <li>
                                <div>
                                    <img src="#home" alt="customer belongings">
                                    <a href="dashboard.php">Belongings</a>
                                </div>
                            </li>
            
                            <li>
                                <div>
                                    <img src="#home" alt="resources image">
                                    <a href="dashboard.php">Resources</a>
                                </div>
                            </li>
            
                            <div class="help-settings">
                                <li>
                                    <div>
                                        <img src="#help" alt="help image">
                                        <a href="dashboard.php">Help</a>
                                    </div>
                                </li>
            
                                <li>
                                    <div>
                                        <img src="#settings" alt="settings image">
                                        <a href="dashboard.php">Settings</a>
                                    </div>
                                </li>
                            </div>
            
                        </ul>
                    </div>
                </section>
            </div>
            
            
            <div>
                <main>
                    <div class="flex_1-2">

                        <div id="landuse" class="queryContainers">
                            <p class="queryTexts">Land Use</p>
                            <img src="#lanuse" alt="avartar of land">
                        </div>
                
                        <div id="population" class="queryContainers">
                            <p class="queryTexts">Population ratio</p>
                            <img src="#lanuse" alt="avartar of population">
                        </div>
                    </div>

                    <div class="flex_3-4">
                        <div id="feed" class="queryContainers">
                            <p class="queryTexts">Feed Consumption</p>
                            <img src="#lanuse" alt="avartar of land">
                        </div>
                
                        <div id="customers" class="queryContainers">
                            <p class="queryTexts">Customer Lugguages</p>
                            <img src="#lanuse" alt="avartar of lugguages">
                        </div>
                    </div>        

                    <div id="vet" class="queryContainers">
                        <p class="queryTexts">Vertinary</p>
                        <img src="#lanuse" alt="avartar of vertinary">
                    </div>
                </main>
            </div>
        
        </div>

    </body>
</html>

 -->
