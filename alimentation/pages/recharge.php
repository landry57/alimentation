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



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Charm" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

       <link rel="stylesheet" type="text/css" href="../css/style.css">
       
    <title> </title>
</head>
<body>
   <div class="container site">
    <h1 class="text-logo"><span class="glyphicon glyphicon"></span>LES PRODUITS VIVRIERS DE COTE D'IVOIRE<span class="glyphicon glyphicon"></span></h1>
     <nav>
        <ul class="nav nav-pills">
        <li role="presentation" ><a href="../index.php" id="lien" ><i class="fa fa-reply" aria-hidden="true"></i></a></li>
            <li role="presentation" class="active" ><a href="#p" data-toggle="tab"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
            <li role="presentation" id="right"><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
     </nav>
      <div class="tab-content">
        <div class="tab-pane active" id="1">
            <div class="row">
        <!--compte user-->
        <div class="tab-pane " id="p">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="thumbnail espace">
                            <div class="caption">
                              <h4>RECHARGE  COMPTE</h4>
                            </div>
                            <table class="table table-condensed table-striped">
                            <form  method="POST" id="rechargeForm">
                              <tr>
                                  
                                  <td style="font-family:sans-serif;"><input type="text" name="email" placeholder="email.."></td>
                              </tr>
                              <tr><td  style="font-family:sans-serif;" id="emailError"></td></tr>
                              <tr>
                                  
                                  <td  style="font-family:sans-serif;"><input type="text" name="sum" placeholder="sum.."></td>
                              </tr>
                              <tr><td  style="font-family:sans-serif;" id="sumError"></td></tr>
                              <tr>
                                  
                                  <td  style="font-family:sans-serif;" id="code"></td>
                              </tr>
                              <tr>
                                  
                                  <td><input type="submit" value="recharger"></td>
                              </tr>
                              </form>
                            </table>
                           
                        </div>
                    </div>
                   
           </div>
   
 

  </div>
</div>     

  <section class="container">
      <div class="clearfix"></div>
      <footer >
          <div>
               <p>Le marché des vivriers en côte d'Ivoire</p>
                <p>le but est de faciliter le paiement</p>
                <p>De rester à la maison et être livré à temps</p>
          </div>
      </footer>
  </section>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="../js/script.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>