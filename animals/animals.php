

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../css/animals.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>

    <div class="container">

        <div class="">
            <div class="card">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Statistics of Animals</title><rect width="100%" height="100%" fill="#0f0e17"/><text x="45%" y="50%" fill="#dee2e6" dy=".3em"> ANIMALS </text></svg>

                <div class="card-body" style="background-color: #b8c1ec;">
                <div class="cate-add">
                    <h5 class="card-title">CATEGORIES</h5>
                    <a href= "add.php" ?><button class="btn btn-primary" name="add" value="create">ADD</button></a>
                </div>


                <div class="categories">

                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Statistics of Animals</title><rect width="100%" height="100%" fill="#172774"/><text x="30%" y="50%" fill="#dee2e6" dy=".3em">MAMMALS</text></svg>
                            <div class="card-body">
                                <h5 class="card-title">DESCRIPTION</h5>
                                <p class="card-text">Any member of the group of vertebrate animals in which the young are nourished with milk from special mammary glands of the mother</p>
                                <p class="card-text"><a href="https://www.britannica.com/animal/mammal">More about Mammals</a></p>
                                <p class="card-text"><a href="mammals.php"><button class="btn btn-warning" style="background-color:#172774; color: white;">Have a Peak</button></a></p>
                                <p class="card-text"><small class="text-muted">Fun Fact: Mammals have the highest emotions amongst all creatures</small></p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Statistics of Animals</title><rect width="100%" height="100%" fill="#ff8906"/><text x="35%" y="50%" fill="#dee2e6" dy=".3em">REPTILES</text></svg>
                            <div class="card-body">
                                <h5 class="card-title">DESCRIPTION</h5>
                                <p class="card-text">Any member of the class Reptilia, the group of air-breathing vertebrates that have internal fertilization, amniotic development, and epidermal scales covering part or all of their body</p>
                                <p class="card-text"><a href="https://www.britannica.com/animal/reptile">More about Reptiles</a></p>
                                <p class="card-text"><a href="reptiles.php"><button class="btn btn-warning" style="background-color:#ff8906; color: white;">Have a Peak</button></a></p>
                                <p class="card-text"><small class="text-muted">Fun Fact: Reptiles are cold-blooded</small></p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="120" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Statistics of Animals</title><rect width="100%" height="100%" fill="#004643"/><text x="40%" y="50%" fill="#dee2e6" dy=".3em">BIRDS</text></svg>
                            <div class="card-body">
                                <h5 class="card-title">DESCRIPTION</h5>
                                <p class="card-text">Any warm-blooded vertebrates more related to reptiles than to mammals that have forelimbs modified into wings, a hard-shelled egg and keen vision. The major sense they rely on for information is the environment.</p>
                                <p class="card-text"><a href="https://www.britannica.com/animal/bird-animal">More about Birds</a></p>
                                <p class="card-text"><a href="birds.php"><button class="btn btn-warning" style="background-color:#004643; color: white;">Have a Peak</button></a></p>
                                <p class="card-text"><small class="text-muted">Fun Fact: Birds have four chambered heart like mammals</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-text"><small class="text-muted"><a href="../dashboard/dashboard.php"><button class="btn btn-primary">Back to Dashboard</button></a></small></p>
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