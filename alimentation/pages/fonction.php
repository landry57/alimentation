<?php
//la protection des entrees
function verifyInput($var)
{
$var=htmlspecialchars($var);
$var=trim($var);
$var=stripcslashes($var);
return $var;
}
//entree forcee des lettres pour la formation du nom et prenom
function lettersExige($letters)
{
$letters=preg_match("/^[a-zA-Z]*$/",$letters);
return $letters;

}
//validation de l'email
function isEmail($email)
{
    $email=filter_var($email,FILTER_VALIDATE_EMAIL);
    return $email;
}
//fixation de la tail des mots de passe
function length_pass($pass)
{
    $pass=strlen($pass);
    return $pass;
}
//une methode saisie de mot de passe
function telEnter($tel)
{
    $tel=preg_match("#^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$#", $tel);
    return $tel;
}
//hacher pass
function hache_pass($hache)
{
    $hache=sha1($hache);
    return $hache;
}
?>