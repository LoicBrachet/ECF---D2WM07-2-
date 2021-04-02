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
    <title>ECF-1-DWWM07</title>
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
        <h2>Vue d'ensemble</h2>
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
                <div class="card-sm">
                    <div class="box-icon blue">
                        <i class="fas fa-shopping-cart icon"></i>
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
        <br>
<?php
  require ('base.php');
  $bdd = new PDO($dsn, $util, $pwd);
 $requete ='SELECT nom, date, quantite, totalHT, totalTTC FROM `client` RIGHT JOIN ventes ON client.idclient = ventes.client_idclient';
 $resultat = $bdd -> prepare($requete);
 $resultat -> execute(); 
  $data = array();
  while ( $row = $resultat->fetch())  {
     $data[] = $row;
  }
  echo json_encode($data);
 
?>
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
