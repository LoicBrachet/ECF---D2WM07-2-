<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fontawesome-free-5.15.2-web/css/all.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>ECF-1-DWWM07 - Ventes</title>
</head>

<body>
    <header>
        <div class="bar">
            <div><a href="#"><i class="fas fa-user"></i></a></div>
            <div><input type="text" placeholder="Rechercher"></div>
            <div><a href="#"><i class="fas fa-search"></i></a></div>
        </div>
    </header>
    <main>
        <h1>Tableau de bord</h1>
        <h2>Ventes</h2>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="ventes.php"> Données</a></li>
                <li><a href="#"> Outils</a></li>
            </ul>
        </nav>
        <div class="container">
            <a href="#">
                <div class="card-sm">
                    <div class="box-icon green">
                        <i class="fas fa-eye icon"></i>
                    </div>
                    <div class="box-data">
                        <div>
                            <p class="number"><strong>690</strong></p>
                            <p>Visites</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="ventes.php">
                <div class="card-sm-active">
                    <div class="box-icon white">
                        <i class="fas fa-shopping-cart icon-active"></i>
                    </div>
                    <div class="box-data">
                        <div>
                            <p class="number"><strong>350</strong></p>
                            <p>Ventes</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card-sm">
                    <div class="box-icon red">
                        <i class="fas fa-comments icon"></i>
                    </div>
                    <div class="box-data">
                        <div>
                            <p class="number"><strong>156</strong></p>
                            <p>Messages</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card-sm">
                    <div class="box-icon yellow">
                        <i class="fas fa-users icon"></i>
                    </div>
                    <div class="box-data">
                        <div>
                            <p class="number"><strong>286</strong></p>
                            <p>Abonnés</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <br>
        <a href="export.php">Cliquer ici pour exporter la base de données</a>
        <br><br>
        <form action="date.php" method="post">
            <select name="date" id="">
            <?php
            require ('base.php');
            $bdd = new PDO($dsn, $util, $pwd);
            $req= 'SELECT date FROM ventes';
            $res= $bdd -> prepare($req);
            $res -> execute();
            while($lignes = $res->fetch()){
            ?>
            
                <option name="date[]" value="<?php echo $lignes['date']?>"><?php echo $lignes['date']?></option>
    <?php
            }
    ?>
                </select>
                <input type="submit">
            </form>
        <br>
        <ol>
<?php
 $bdd = new PDO($dsn, $util, $pwd);
 $requete ='SELECT nom, date, quantite, totalHT, totalTTC FROM `client` RIGHT JOIN ventes ON client.idclient = ventes.client_idclient';
 $resultat = $bdd -> prepare($requete);
 $resultat -> execute();
    while($ligne = $resultat->fetch()){
 echo '<li>Commande du client '.$ligne['nom'].' :<br>
 date: '.$ligne['date'].'<br>
 quantité achetée: '.$ligne['quantite'].'<br>
 Total HT: '.$ligne['totalHT'].'<br>
 Total TTC: '.$ligne['totalTTC'].'</li><br>';
 }
?>
</ol>
        
<form action="delete.php" method="POST">
    <label>Entrez le numéro id de la commande à supprimer: </label><br>
    <input type="text" name="id">
    <input type="submit">
</form>
    </main>
    <footer>
        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                    alt="CSS Valide !" />
            </a>
        </p>
    </footer>
</body>

</html>