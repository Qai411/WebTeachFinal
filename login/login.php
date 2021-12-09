<?php
    $authenticateUsername = "DavidS";
    $authenticateKey = "wb2021";
    $access = False;

    $username = $key = "";

    $errors = array('username'=>'', 'password'=>'');

    if(isset($_POST["submit"])){
        
        //checking username
        if (empty($_POST["username"])){
            $errors['username'] = "Username required";
        }else{
            $username = $_POST["username"];
            $access = $username === $authenticateUsername ? True : False;
        }

        //checking password
        if(empty($_POST['password'])){
            $errors['password'] = "Key is required";
        }else{
            $key = $_POST['password'];
            $access = $key === $authenticateKey ? True : False;
        }

        //Authorization checked moving to Dashboard 
        if(!array_filter($errors) && $access){
            header("Location: ../dashboard/dashboard.php");
        }else{
            $errors["password"] = "username or password wrong";
            $errors["username"] = "Username or password wrong";
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
</head>
    <body class="text-center">

        <div id="big" class="container">
            <div id="side" class="container"></div>
        
            <div class="container form-signin ">
            
            <form method="POST">
                <img src="../resources/images/logo.png" class="mb-4">
                <h3 class="h3 mb-3 fw-normal">Login</h3>
                <!-- Username -->
                <div class="center form-floating">
                    <input class="form-control mb-4" type="text" id="username" name = "username" autofocus placeholder="Username">
                </div>

                <div class="error">
                    <small>
                        <?php
                            echo $errors['username'];
                        ?>
                    </small>
                </div>
                <!--Key-->
                <div class="center form-floating mb-4">
                    <input class="form-control" type="text" id="password" name = "password" placeholder="Key">
                </div>

                <div class="error">
                    <small>
                        <?php
                            echo $errors['password'];
                        ?>
                    </small>
                </div>


                <div class="center">
                    <input type="submit" value="submit" name="submit" class="btn btn-lg btn-success">
                </div>

            </form>
        </div>

        </div>

        
    

        <script>
            function denyAccess(){
                alert("Wrong Username and password: use Username: DavidS \n Password: wb2021")
            }

            function allowAccess(){
                alert("Access granted!")
            }
        </script>
    </body>
</html>