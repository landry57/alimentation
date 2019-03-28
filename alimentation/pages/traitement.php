<?php
session_start();
ob_start();
?>
<?php
require('config.php');
require('fonction.php');
$tab=array("name"=>"","lastname"=>"","email"=>"","tel"=>"","password"=>"","repeatpassword"=>"","nameError"=>"","lastnameError"=>"",
"emailError"=>"","telError"=>"","passwordError"=>"","repeatpasswordError"=>"","globalError"=>"","isSuccess"=>false);
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $tab['name']=verifyInput($_POST['name']);
    $tab['lastname']=verifyInput($_POST['lastname']);
    $tab['email']=verifyInput($_POST['email']);
    $tab['tel']=verifyInput($_POST['tel']);
    $tab['password']=verifyInput($_POST['password']);
    $tab['repeatpassword']=verifyInput($_POST['repeatpassword']);
    $tab['isSuccess']=true;
    if (empty( $tab['name'])) {
        $tab['nameError']="j'ai besoin de savoir ton nom stp!";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['name'];  
    }
    if (empty( $tab['lastname'])) {
        $tab['lastnameError']="j'ai besoin de savoir ton prénom stp!";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['lastname'];  
    }
    if (empty( $tab['email'])) {
        $tab['emailError']="Saisis ton email stp!";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['email'];  
    }
    if (empty( $tab['tel'])) {
        $tab['telError']="Donne moi l'un de tes numéros.";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['tel'];  
    }
    if (empty($tab['password'])) {
        $tab['passwordError']="Le mot de passe est exgigé";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['password'];  
    }
    if (empty( $tab['repeatpassword'])) {
        $tab['repeatpasswordError']="Il est conseillé de repéter ton mot de passe.";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['repeatpassword'];  
    }
    
    if (!lettersExige($tab['name'])) {
        $tab['nameError']="Stp utilise des lettres pour composer ton nom ";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['name'];
    }
    if (!lettersExige($tab['lastname'])) {
        $tab['lastnameError']="Stp utilise des lettres pour composer ton prénom ";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['lastname'];
    }
    if (!isEmail($tab['email'])) {
        $tab['emailError']="Saisis un email valide";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['email']; 
    }
    if (length_pass( $tab['password'])!=6) {
        $tab['passwordError']="Donne moi 6 caractères maxi pour ton paword.";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['password'];
    }
    if (length_pass( $tab['repeatpassword'])!=6) {
        $tab['repeatpasswordError']="Donne moi 6 caractères maxi pour ton paword.";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['repeatpassword'];
    }
    if ($tab['password']!=$tab['repeatpassword']) {
        $tab['passwordError']="Entre des password identiques";
        $tab['repeatpasswordError']="Entre des password identiques";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['password'];
        $tab['repeatpassword'];
    }
    if (!telEnter( $tab['tel'])) {
        $tab['telError']="la saisie n'est pas valide.";
        $tab['isSuccess']=false;
    }
    else
    {
        $tab['tel'];
    }

    if ($tab['isSuccess']) {
        $tab['password']=hache_pass($tab['password']);
       $select =$bdd->prepare("SELECT * FROM ussers WHERE email=?");
       $select->execute(array($tab['email']));
       $rows=$select->rowCount();
       if ($rows==0) {
        $insert=$bdd->prepare("INSERT INTO ussers(name,lastname, email,tel,password) VALUES(?,?,?,?,?)");
        $insert->execute(array($tab['name'],$tab['lastname'],$tab['email'],$tab['tel'],$tab['password']));
        $tab['isSuccess']="Le compte a ete cree avec succes";
       }else
       {
        $tab['globalError']="{$tab['email']} a deja un compte ";
       }
    }
 echo json_encode($tab);
}





?>