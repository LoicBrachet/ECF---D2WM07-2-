<?php
require ('base.php');
$bdd = new PDO($dsn, $util, $pwd);
$requete = 'DELETE FROM panier ventes WHERE idventes = '.$_POST['id'].' ';
$resultat = $bdd -> prepare($requete);
$resultat -> execute();
if ($resultat){
header("Location: ventes.php");
} else echo'erreur';
?>