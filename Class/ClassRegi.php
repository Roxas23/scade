<?php
include 'ClassNav.php';
session_start();

class UtRegistrato{
    private $servername = "localhost";
    private $user = "Utente_Registrato";
    private $password_c = "registrato";
    private $dbname = "Scadenza";

    private $db; // database handle
    private  $stmt; // sql statement

    public function __construct()
    {
       
        $dsn = 'mysql:host='. $this->servername . ';dbname=' . $this->dbname;
        try{
            $this->db = new PDO($dsn, $this->user, $this->password_c);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e){
            echo "Failed: " . $e->getMessage();
        }
    }

    public function login($email,$password){
        $sql = "SELECT * FROM Utenti WHERE Email=?";
        $this->stmt= $this->db->prepare($sql);
        $this->stmt->execute([$email]);

        $data = $this->stmt->fetch();

        if($data['Password'] == $password)
        { 
            $_SESSION['tipo']=1; 
            $_SESSION['email']=$data['Email'];
            header("location: ../Home/Home.php");
        }
        else{
            echo "<script type='text/javascript'>alert('Email o Password sbagliati');</script>";
        }
    }

    public function Registrazione($nome, $cognome, $email, $password){

        $sql = "SELECT * FROM Utenti WHERE Email=?";
        $this->stmt= $this->db->prepare($sql);
        $this->stmt->execute([$email]);

        $data = $this->stmt->fetch();

        if($data['Email'] == $email){
            echo "<script type='text/javascript'>alert('Utente già registrato');</script>";
        }else{
            $_SESSION['tipo']=1;
            $_SESSION['email']=$data['Email'];
            $sql = "INSERT INTO Utenti (Nome, Cognome, Email,Password) VALUES (?,?,?,?)";
            $this->stmt= $this->db->prepare($sql);
            $this->stmt->execute([$nome, $cognome, $email, $password]);
            
            header("location: ../Home/Home.php");
            
        }
    }


    public function VisualProdotti($NomPagina,$persona)
    {

        $sql = "SELECT * FROM Prodotti WHERE Categoria=?";
        $this->stmt= $this->db->prepare($sql);
        $this->stmt->execute([$NomPagina]);
        $data = $this->stmt->fetchAll();

        ?>
        <div class="row" id="BoxImg"><?php
        foreach($data as $row)
        {
            ?>
                <div class="card col" style="width: 18rem;">
                    <img src="<?php echo $row["Immagine"]?>" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $row["Descrizione"] ; echo " ". $row["Costo"] ."€";?></h5>
                        <form action="" method="post">
                            <input type="number" name="Aggiungi" min="1" max="10" id="" placeholder="Quantità">
                            <input type="submit"class="btn btn-dark" value="Aggiungi" name=<?php echo $row["ID_Prodotti"]?>>
                        </form>
                    </div>
                </div><?php 
                if(isset($_POST[$row["ID_Prodotti"]]))
                {
                    $this->Carrello($row["ID_Prodotti"],$_REQUEST["Aggiungi"],$persona);
                }

        }
        ?></div><?php
    }

    public function Carrello($IDprodotto,$quantità,$persona)
    {
        $sql = "SELECT * FROM Utenti WHERE Email=?";
        $this->stmt= $this->db->prepare($sql);
        $this->stmt->execute([$persona]);
        $data = $this->stmt->fetch();
        $IDutente=$data["ID"];
       
        $this->Aggiungi($IDutente,$IDprodotto,$quantità);
    }

    public function Aggiungi($IDutente,$IDprodotto,$quantità)
    {
        
        $sql = "SELECT * FROM Carrello WHERE FK_Utenti=$IDutente AND FK_Prodotti=$IDprodotto ";
        $this->stmt= $this->db->prepare($sql);
        $this->stmt->execute();
        $data = $this->stmt->fetch();

        if($data["Quantità"] >= 1)
        {
            $add = $data["Quantità"] + $quantità;
            $sql = "UPDATE Carrello SET Quantità=?  WHERE FK_Utenti=? AND FK_Prodotti=?";
            $this->stmt= $this->db->prepare($sql);
            $this->stmt->execute([$add,$IDutente,$IDprodotto]);
            
        }
        else
        {
            $sql = "INSERT INTO Carrello (FK_Utenti,FK_Prodotti,Quantità) VALUES (?,?,?)";
            $this->stmt= $this->db->prepare($sql);
            $this->stmt->execute([$IDutente,$IDprodotto, $quantità]);
        }
    }
}
?>