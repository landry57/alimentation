<?php
session_start();
ob_start();
?>
<?php
require('config.php');
require('fonction.php');
$array=array("quantite"=>"","sum"=>"","emailDb"=>"","code"=>"","id"=>"","quantiteError"=>"","sumError"=>"","isSuccess"=>false);
if ($_SERVER['REQUEST_METHOD']=="POST") {
   $array['quantite']=verifyInput($_POST['quantite']);
   $array['id']=verifyInput($_POST['id']);
   $array['isSuccess']=true;

   if (empty( $array['quantite'])) {
    $array['quantiteError']="champs vide";
    $array['isSuccess']=false;
   }
   else
   {
    $array['quantite']; 
   }
  
   
    $sel=$bdd->prepare('SELECT * FROM ussers WHERE id=?');
    $sel->execute(array($_SESSION['id']));
    $user=$sel->fetch();
    $rows=$sel->rowCount();
    $array['emailDb']=$user['email'];
   if ($array['isSuccess']) {
       if ($rows==1) {
        $selq=$bdd->prepare("SELECT * FROM sales WHERE user_id=?");
        $selq->execute(array($_SESSION['id']));
        $q=$selq->fetch();
        //
        $selprix=$bdd->prepare("SELECT * FROM items WHERE id=?");
        $selprix->execute(array($array['id']));
        $p=$selprix->fetch();
        //
        $selcompte=$bdd->prepare("SELECT * FROM compte WHERE user_id=?");
        $selcompte->execute(array($_SESSION['id']));
        $sold=$selcompte->fetch();
        $prod=$p['price']*$array['quantite'];
       
        $facturation=$sold['sum']-$prod;
        
        //
        $up=$bdd->prepare("UPDATE compte SET sum=? WHERE user_id=?");
        $up->execute(array($facturation,$_SESSION['id'])); 
        //
       $insert=$bdd->prepare('INSERT INTO sales(user_id,prod_id,q,date) VALUES(?,?,?,NOW())');
       $insert->execute(array($_SESSION['id'],$array['id'],$array['quantite']));
       $array['isSuccess']="Commande validee";
    }else
    {
    // header('Location:connexion.php');
    }
    
  
   }

  echo json_encode($array);
}




?>