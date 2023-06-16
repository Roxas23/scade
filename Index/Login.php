<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Login</title>
    <link rel="stylesheet" href="../dim.css">

</head>
<body>
<script>
    function pass_visibility(){
        var input = document.getElementById("password");
        if (input.type === "password")
        {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>
<a href="index.php" class="btn btn-dark">Torna Indietro</a>
<div class="text-center" style="margin-top: 30px;">
    <h3><span style="color:black">Log in</span></h3>
</div>
<div class="container">
    <form method="POST">
        <div class="row justify-content-md-center">
            <div class="col col-lg-4">
                <label for="email" class="form-label"><span style="color:black">Email address</span></label>
                <input type="email" class="form-control" id="email" name="email" required>

            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col col-lg-4">
                <label for="password" class="form-label"><span style="color:black">Password</span></label>
                <input type="password" class="form-control" id="password" name="password" max="6">
                <p>
                <label>
                    <input type="checkbox" onclick="pass_visibility()"/>
                    <span style="color:black">Mostra password</span>
                </label>
            </p>
            </div>
            
        </div>
        <div class="row justify-content-md-center" style="margin-top: 1rem">
            <div class="col col-lg-4">
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-dark" name="submit_btn" value="Invia">
                </div>
                <a href="Registrazione.php" class="btn btn-dark" ><span style="color:white">Registrazione</span></a>
            </div>
        </div>
        
    </form>
</div>

<?php
include '../Class/ClassRegi.php';

$sub = isset($_POST['submit_btn']) ? true : false;
if($sub){
    $connect = new UtRegistrato();
    $connect->Login($_REQUEST['email'], $_REQUEST['password']);
}
?>

</body>
</html>