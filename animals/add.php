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
        <form action="">
            <fieldset>
                <legend>Personal Information</legend>

                <input type="text" placeholder="Name" name="generalName">
                <input type="text" placeholder="kingdom" name="kingdom">
                <input type="text" placeholder="phylum" name="phylum">
                <input type="text" placeholder="class" name="class">
                <input type="text" placeholder="order" name="ordr">
                <input type="text" placeholder="family" name="family">
                <input type="text" placeholder="genus" name="genus">
                <input type="text" placeholder="species" name="genus">

                <input type="radio" id="male" name="sex">
                <label for="male">Male</label>

                <input type="radio" id="female" name="sex">
                <label for="female">Female</label>

                <input type="date" id="dob" name="dob">

            </fieldset>
        </form>
    </div>
</body>
</html>