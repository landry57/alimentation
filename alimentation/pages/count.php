
<?php
require('panier.php');

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
                              <h4>MON COMPTE</h4>
                            </div>
                            <table class="table table-condensed table-striped">
                             <form method="POST" id="conf">
                            <tr>
                                  <td><input type="text" name="code"></td>
                                  <td><input type="submit" value="confirmer"></td>
                              </tr>
                              <tr>
                                  <td id="res"></td>
                              </tr>
                              </form>
                              <tr>
                                  <th>Solde Courant:</th>
                                <?php
                                   
                                   while ($list=$comp->fetch()) {?>
                                    <?php if($list['sum']<10){?>
                                      <td style="color:red"><?=$list['sum']?> Fr</td>
                                    <?php } ?>
                                    <?php if($list['sum']>=10){?>
                                      <td style="color:green"><?=$list['sum']?> Fr</td>
                                    <?php } ?>
                                   <?php } ?>
                              </tr>
                            </table>
                            <div class="utilisation">
                                utilisation
                                <table style="font-family:sans-serif;">
                                    <td>Cela fait <?=$rows?> fois que vous utilisez votre compte</td>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="thumbnail espace">
                            <h4>Mon panier</h4>
                            <table class="table table-condensed table-striped">
                                <?php
                                 while($s=$art->fetch()){?>
                                 
                                 <tr><th>Article</th><th>Nombre de kilo</th><th>Date</th><th>Livraison</th></tr>
                                 <tr style="font-family:sans-serif;">
                                     <td><?=$s['name']?></td>
                                     <td><?=$lit['q']?></td>
                                     <td><?=$annee?></td>
                                     <td><?=$dl?>H</td>
                                 </tr>
                                 <?php } ?>
                            </table>  
                            
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