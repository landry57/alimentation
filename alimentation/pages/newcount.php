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
     <div class="tab-pane " id="c">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="thumbnail register">
                    <div class="caption">
                      <h4>Création de compte</h4>
                    </div>
                    <form method="POST" id="registerForm">
                        <div>
                            <div class="nameError"></div>
                            <input type="text" name="name" id="name" placeholder="nom.." class="form-control">
                        </div>
                       
                        <div>
                            <div class="lastnameError"></div>
                            <input type="text" name="lastname" id="lastname" placeholder="prenom.." class="form-control">
                        </div>
                        <div>
                            <div class="emailError"></div>
                            <input type="text" name="email" id="email" placeholder="email.." class="form-control">
                        </div>
                        <div>
                             <div class="telError"></div>
                            <input type="text" name="tel" id="tel" placeholder="tel:+22567568790" class="form-control">
                            </div>
                        <div>
                          <div class="passwordError"></div>
                          <input type="password" name="password" id="password" placeholder="password.." class="form-control">
                        </div>
                        <div>
                            <div class="repeatpasswordError"></div>
                            <input type="password" name="repeatpassword" id="repeatpassword" placeholder="repeat password.." class="form-control">
                        </div>
                        <div>
                            <div class="isSuccess"></div>
                            
                            <input type="submit" class="btn btn-info">
                            </div>
                    </form>
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