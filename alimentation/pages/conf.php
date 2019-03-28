<?php
session_start();
ob_start();
?>
<?php
require('config.php');
require('fonction.php');

$array=array("sum"=>"","code"=>"","codeError"=>"","globalSuccess"=>"","gError"=>"","isSuccess"=>false);
if ($_SERVER['REQUEST_METHOD']=="POST") {
        $array['code']=verifyInput($_POST['code']);
        $array['isSuccess']=true;

        
        if (empty($array['code'])) {
            $array['codeError']="Entre le code";
            $array['isSuccess']=false;
        }
        else
        {
            $array['code']; 
        }
        
        
        
        if($array['isSuccess']) {
            $sel=$bdd->prepare("SELECT * FROM ussers WHERE id=?");
            $sel->execute(array($_SESSION['id']));
            $em=$sel->fetch();
            $select=$bdd->prepare("SELECT * FROM recharge WHERE email=? AND code=?");
            $select->execute(array($em['email'],$array['code']));
            $rows=$select->rowCount();
            // 
            $selet=$bdd->prepare("SELECT * FROM compte WHERE user_id=?");
            $selet->execute(array($_SESSION['id']));
            if ($rows==1) {
                
                $rw=$selet->rowCount();
                if ($rw==1) {
                $user=$select->fetch();
                $userc=$selet->fetch();
                $id=$user['id'];
                $som=$user['sum'] + $userc['sum'];
                $insert=$bdd->prepare('UPDATE  compte SET user_id=?,sum=?,datsend=NOW() ');
                $insert->execute(array($_SESSION['id'],$som));
                $del=$bdd->prepare('DELETE FROM recharge WHERE id=?');
                $del->execute(array($id));
                $array['globalSuccess']="Transfert confirmé";
                }else
                {
            
                $user=$select->fetch();
                $id=$user['id'];
                $som=$user['sum'];
                $insert=$bdd->prepare('INSERT INTO compte(user_id,sum,datsend) VALUES(?,?,NOW())');
                $insert->execute(array($_SESSION['id'],$som));
                $del=$bdd->prepare('DELETE FROM recharge WHERE id=?');
                $del->execute(array($id));
               $array['globalSuccess']="Transfert confirmé";
                }
            }else{
                $array['gError']="code errone";
            }
            
       }
  
  echo  json_encode($array);
}

?>