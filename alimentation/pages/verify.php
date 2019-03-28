<?php
session_start();
ob_start();
?>
<?php
require('config.php');
require('fonction.php');
if (isset($_SESSION['id']) AND $_SESSION['id']>0) {
    header('Location:count.php');
}else
{
    //header('Location:connexion.php'); 
}
?>