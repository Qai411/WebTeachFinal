<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="animals.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>

    <div class="container">

        <div class="">
            <div class="card">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Statistics of Animals</title><rect width="100%" height="100%" fill="#172774"/><text x="30%" y="50%" fill="#dee2e6" dy=".3em"> ADD </text></svg>

                <div class="card-body">
                <div class="cate-add">
                    <h5 class="card-title">CATEGORIES</h5>
                    <a href= "/add.php" ?>><button class="btn btn-primary" name="add" value="create">ADD</button></a> 
                </div>


                <div class="categories">

                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Statistics of Animals</title><rect width="100%" height="100%" fill="#172774"/><text x="30%" y="50%" fill="#dee2e6" dy=".3em">POPULATION</text></svg>
                            <div class="card-body">
                                <h5 class="card-title">MAMMALS</h5>
                                <p class="card-text"></p>
                                <p class="card-text"></p>
                                <p class="card-text"></p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Statistics of Animals</title><rect width="100%" height="100%" fill="#172774"/><text x="30%" y="50%" fill="#dee2e6" dy=".3em">POPULATION</text></svg>
                            <div class="card-body">
                                <h5 class="card-title">REPTILES :</h5>
                                <p class="card-text"></p>
                                <p class="card-text"></p>
                                <p class="card-text"></p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Statistics of Animals</title><rect width="100%" height="100%" fill="#172774"/><text x="30%" y="50%" fill="#dee2e6" dy=".3em">POPULATION</text></svg>
                            <div class="card-body">
                                <h5 class="card-title">BIRDS </h5>
                                <p class="card-text"></p>
                                <p class="card-text"></p>
                                <p class="card-text"></p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>


    </div>
    




















    <!-- <nav>
        <a href="../dashboard/dashboard.php" class="red-text">Animal Ally</a>
        <div class="search-container">
            <label for="search"><span>Find:</span>  </label>
            <input type="text" name="search" id="search">
        </div>
    </nav> -->

    <!-- <div class="container">
        <div class="reptiles">
            <a href="reptiles/reptiles.php">
                <h4>REPTILES</h4>
                <p>
                They are distinguished by having a dry scaly skin and typically laying soft-shelled eggs on land.
                </p>
            </a>

        </div>

        <div class="mammals">
            <a href="mammals/mammals.php">
                <h4>MAMMALS</h4>
                <p>
                Any member of the group of vertebrate animals
                in which the young are nourished with milk from special mammary glands of the mother.
                </p>
            </a>

        </div>


        <div class="birds">
            <a href="birds/birds.php">
                <h4>BIRDS</h4>
                <p>
                a warm-blooded egg-laying vertebrate animal distinguished by the possession of
                 feathers, wings, a beak, and typically by being able to fly.
                </p>
            </a>

        </div>
    </div> -->


</body>
</html>