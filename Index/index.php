<?php
session_start()
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
    <title>Pagina Iniziale</title>
    <link rel="stylesheet" href="../dim.css">
</head>
<body>
    
<div  id="centrBT">
    <a href="Login.php" class="btn btn-dark" >Login</a>
    <a href="Registrazione.php" class="btn btn-dark" >Registrazione</a>
    <a href="../Home/Home.php" class="btn btn-dark">Vai al sito </a>
</div>
<?php

$_SESSION['tipo']=0;
$_SESSION['email']="niente";


//echo date("d/m/Y", strtotime("now"))."\n";
//echo date("d/m/Y", strtotime("+30 day"))."\n";
$d1=date("d/m/Y", strtotime("now"));
echo $d1."\n";
list($gg,$mm,$aa) = explode("/",$d1);
echo $gg ."\n".$mm ."\n".$aa ."\n";
?>
</body>
</html>