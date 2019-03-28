<?php
session_start();
ob_start();
?>
<?php
require('config.php');
require('fonction.php');
$array=array("email"=>"","password"=>"","emailDb"=>"","passwordDb"=>"","id"=>"","emailError"=>"","passwordError"=>"","isSuccess"=>false);
if ($_SERVER['REQUEST_METHOD']=="POST") {
   $array['email']=verifyInput($_POST['email']);
   $array['password']=verifyInput($_POST['password']);
   $array['isSuccess']=true;
   if (empty( $array['email'])) {
    $array['emailError']="Il faut ton email  a cet endroit";
    $array['isSuccess']=false;
   }
   else
   {
    $array['email']; 
   }
   if (empty( $array['password'])) {
    $array['passwordError']="Saisis   ton password  a cet endroit";
    $array['isSuccess']=false;
   }
   else
   {
    $array['password']; 
   }
   if (!isEmail($array['email'])) {
    $array['emailError']="Stp entre un mail valide";
    $array['isSuccess']=false;
   }
   else
   {
    $array['email'];   
   }
   //
   $array['password']=hache_pass($array['password']);
   $select=$bdd->prepare("SELECT * FROM ussers WHERE email=?");
    $select->execute(array($array['email']));
    $rows=$select->rowCount();
    $user=$select->fetch();
    $array['emailDb']=$user['email'];

    $selectp=$bdd->prepare("SELECT * FROM ussers WHERE password=?");
    $selectp->execute(array($array['password']));
    $userp=$selectp->fetch();
    $array['passwordDb']=$userp['password'];
   
   if ($array['isSuccess']) {
    $userSelect=$bdd->prepare("SELECT * FROM ussers WHERE email=? AND password=?");
    $userSelect->execute(array($array['email'],$array['password']));
    $rows=$userSelect->rowCount();
    
    if ($rows==1) {
      $us=$userSelect->fetch();
      $array['id']=$us['id'];
      $_SESSION['id']=$us['id'];
    }
   }
   echo json_encode($array);
}




?>