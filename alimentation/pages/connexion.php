<?php
require('verify.php');
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
            
        </ul>
     </nav>
      <div class="tab-content">
        <div class="tab-pane active" id="1">
            <div class="row">
        <!--compte user-->
        <div class="tab-pane " id="p">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-md-offset-3">
                        <div class="thumbnail espace">
                            <div class="caption con">
                                <h2>CONNEXION</h2>
                            </div>
                            <form method="POST" id="loginForm">
                            <table>
                                <tr>
                                    <td>Email</td><td><input type="text" class="" name="email" id="email"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="emailError"></td>
                                </tr>
                                <tr>
                                        <td>Password</td><td><input type="password" name="password"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" id="passError"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" value="connecte-toi" class="btn btn-info"></td>
                                    </tr>
                            </table>
                        </form>
                            </div>
                        </div>
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