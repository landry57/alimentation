<?php
session_start();
ob_start();
?>
<?php
require('pages/config.php');
require('pages/fonction.php');


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

       <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Charm" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
       <link rel="stylesheet" type="text/css" href="css/style.css">
       
    <title>VENTE </title>
</head>
<body>
   <div class="container site">
    <h1 class=" animated slideInLeft infinite slower delay-2s text-logo"><span class="glyphicon glyphicon"></span>LES PRODUITS VIVRIERS DE COTE D'IVOIRE<span class="glyphicon glyphicon"></span></h1>
    <?php 
    //
    echo'<nav>
        <ul class="nav nav-pills">';
        $statement = $bdd->query('SELECT * FROM categories');
        $categories = $statement->fetchAll();
        foreach ($categories as $category) 
        {
            if($category['id'] == '1')
                echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
            else
                echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
              
        }
        if (isset($_SESSION['id']) AND $_SESSION['id'] ==2) {
            echo'  <li role="presentation"><a href="pages/count.php"><i class="fas fa-shopping-cart"></i></a></li>';
        echo'  <li role="presentation"><a href="pages/connexion.php"><i class="fas fa-user"></i></a></li>';
        echo'  <li role="presentation"><a href="pages/connexion.php"><i class="fas fa-user-plus"></i></a></li>';
        echo'<li role="presentation" id="right"><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span></a></li>';
            
            echo'  <li role="presentation"><a href="pages/ajout.php"><i class="fas fa-pen"></i></a></li>';
            echo'  <li role="presentation"><a href="pages/recharge.php"><i class="fas fa-charging-station"></i></a></li>';
            
        }else{
        echo'  <li role="presentation"><a href="pages/count.php"><i class="fas fa-shopping-cart"></i></a></li>';
        echo'  <li role="presentation"><a href="pages/connexion.php"><i class="fas fa-user"></i></a></li>';
        echo'  <li role="presentation"><a href="pages/newcount.php"><i class="fas fa-user-plus"></i></a></li>';
        echo'<li role="presentation" id="right"><a href="pages/deconnexion.php"><span class="glyphicon glyphicon-log-out"></span></a></li>';
        }
        echo    '</ul>
              </nav>';
      echo'<div class="tab-content animated slideInRight slower  bounce">';//
      foreach ($categories as $category) 
                {
         if($category['id'] == '1')

         echo '<div class="tab-pane active" id="' . $category['id'] .'">';
         else
          echo '<div class="tab-pane" id="' . $category['id'] .'">';
          echo '<div class="row">';
          $statement = $bdd->prepare('SELECT * FROM items WHERE items.category_id = ?');
                    $statement->execute(array($category['id']));
                    while ($item = $statement->fetch()) 
                    {
               echo' <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="images/' . $item['image'] . '" alt="image">
                        <div class="price">' . number_format($item['price'], 2, '.', ''). ' F</div>
                        <div class="caption">
                            <h4>' . $item['name'] . '</h4>
                            <p>' . $item['description'] . '</p>
                            <a href=""class="btn btn-border" role="button" ><span class="glyphicon glyphicon-shopping-cart">Acheter</span></a>
                            
                        </div>
                           <div class="form ">
                            <p id="aff"></p>
                            <form  method="POST" id="commande">
                            <input type="hidden"  name="id" value='. $item['id'] .'>
                            <input type="text" placeholder="quantité" name="quantite">
                            <input type="submit">
                            </form>
                          </div>
                         
                    </div>
                    
                </div>';
               
                    }
           echo' </div>
        </div>';
                }
                
                
 echo' </div>
</div> ';

?>    

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


  
 <script src="js/script.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>