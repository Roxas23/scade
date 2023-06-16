<?php
session_start();

class UtNavigatore{
    private $servername = "localhost";
    private $user = "Utente_Navigatore";
    private $password_c = "navigatore";
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
    public function VisualProdotti($NomPagina)
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
                <div class="card col" style="width: 18rem;" >
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
                    echo "<script type='text/javascript'>alert('Non puoi Aquistare -- Loggati/Registrati');</script>";
                }

        }
        ?></div><?php
    }
}
?>
