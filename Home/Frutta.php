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
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Home</title>
    <link rel="stylesheet" href="../dim.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">COOP</a>
    <div class="me-auto mb-2 mb-lg-0">
        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Menu</button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item" >
                        <a class="nav-link active" aria-current="page" href="Frutta.php" ><span style="color:#000">Frutta</span></a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link active" aria-current="page" href="Pasta.php"><span style="color:#000">Pasta</span></a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link active" aria-current="page" href="Carne.php"><span style="color:#000">Carne</span></a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link active" aria-current="page" href="Pesce.php"><span style="color:#000">Pesce</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"> </h5>
            <button type="button" class="btn-close btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" ><span style="color:#000">Account</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span style="color:#000">Carrello</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span style="color:#000">Prodotti già Acquistati</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Index/index.php"><span style="color:#000">Exit</span></a>
                </li>
                
            </ul>
        </div>
    </div>
  </div>
</nav>



<?php
include '../Class/ClassRegi.php';

$tipoUtente=$_SESSION['tipo'];
$sessEmail=$_SESSION['email'];
echo "<h1>.</h1>";
if($tipoUtente == 0 && $sessEmail == "niente")
{
    $connect = new UtNavigatore();
    $connect->VisualProdotti("Frutta");
}

if($tipoUtente==1)
{
    $connect = new UtRegistrato();
    $connect->VisualProdotti("Frutta",$sessEmail);
}

?>

    
</body>
</html>