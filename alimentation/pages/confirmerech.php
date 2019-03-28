<?php
session_start();
ob_start();
?>
<?php
require('config.php');
require('fonction.php');
$array=array("email"=>"","sum"=>"","emailDb"=>"","code"=>"","id"=>"","emailError"=>"","sumError"=>"","isSuccess"=>false);
if ($_SERVER['REQUEST_METHOD']=="POST") {
   $array['email']=verifyInput($_POST['email']);
   $array['sum']=verifyInput($_POST['sum']);
   $array['isSuccess']=true;
   if (empty( $array['email'])) {
    $array['emailError']="Entre le mail du compte";
    $array['isSuccess']=false;
   }
   else
   {
    $array['email']; 
   }
   if (empty( $array['sum'])) {
    $array['sumError']="Saisis  la somme";
    $array['isSuccess']=false;
   }
   else
   {
    $array['sum']; 
   }
   if (!isEmail($array['email'])) {
    $array['emailError']="Stp entre un mail valide";
    $array['isSuccess']=false;
   }
   else
   {
    $array['email'];   
   }
    $sel=$bdd->prepare("SELECT * FROM ussers WHERE email=?");
    $sel->execute(array($array['email']));
    $user=$sel->fetch();

    $array['emailDb']=$user['email'];
   if ($array['isSuccess']) {
    $rows=$sel->rowCount();
       if ($rows==1) {
       $array['code']=rand(4,9999);
       $insert=$bdd->prepare("INSERT INTO recharge(email,sum,code,date) VALUES(?,?,?,NOW())");
       $insert->execute(array($array['email'],$array['sum'],$array['code']));
    }else
    {
        $array['gError']="compte pas encore créé";
    }
    
  
   }
  
  echo json_encode($array);
}



?>