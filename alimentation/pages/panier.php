<?php
session_start();
ob_start();
?>
<?php
require('config.php');
require('fonction.php');
if (isset($_SESSION['id']) AND $_SESSION['id']>0) {
    //header('Location:count.php');
}else
{
    header('Location:connexion.php'); 
}

$comp=$bdd->prepare("SELECT * FROM compte WHERE user_id=? ");
$comp->execute(array($_SESSION['id']));
//
$panier=$bdd->prepare("SELECT * FROM sales WHERE user_id=? ");
$panier->execute(array($_SESSION['id']));
$rows=$panier->rowCount();
$lit=$panier->fetch();
$datform= date_create($lit['date']);
 $annee=date_format($datform,"d/m/Y");
 $heure=date_format($datform,"H");
 $dl=(24-$heure)/4;
//
$art=$bdd->prepare('SELECT * FROM items WHERE id=? ');
$art->execute(array($lit['prod_id']));
?>