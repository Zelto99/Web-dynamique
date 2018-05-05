<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Emplois</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="emp.css" rel="stylesheet">
  </head>

  <body>
      
      <?php
    session_start();
     try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=Swim;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    ?>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-navy">
        <a class="navbar-brand" href="#"><img src="http://exetertri.co.uk/wp-content/uploads/2015/10/swim-logo.png" alt="" width="45" height="45"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Recherche</button>
        </form>
      </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Réseaux</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Emplois</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Messagerie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Notifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Vous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Album</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Déconnexion</a>
          </li>
          
          
        </ul>
        
      </div>
    </nav>


      <div class="jumbotron">
        <div class="container mb-0">
          <h1 class="display-3 mx-auto text-center mt-4">Bienvenue sur la page emplois !</h1>
            <p class="lead mx-auto text-center">Vous y trouverez toutes vos offres d'emplois et de stages.</p>
        </div>
      </div>
      
   
      
      

    <div class="container">
        <div class="row">
              <?php
              $req=$bdd->query('SELECT * FROM emploi');
              while($emploi = $req->fetch()){
                  ?>
            <div class="col-lg-4 mb-3 text-center">
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Offre de <?php echo $emploi['type'];?></h4>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title pricing-card-title"><?php echo $emploi['titre'];?> </h3>
                      <h5> <ul class="list-unstyled mt-3 mb-4">
                      <li>
                        <?php echo $emploi['nom_entreprise'];?>
                      </li>
                    </ul></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li>
                        <?php echo $emploi['mission1'];?>
                      </li>
                    </ul>
                      <ul class="list-unstyled mt-3 mb-4">
                      <li>
                        <?php echo $emploi['mission2'];?>
                      </li>
                    </ul>
                      <ul class="list-unstyled mt-3 mb-4">
                      <li>
                        <?php echo $emploi['mission3'];?>
                      </li>
                    </ul>
                    <a class="btn btn-lg btn-block btn-primary" href="mailto:<?php echo $emploi['mail_entreprise'] ;?>"> Postuler</a>
                    
                  </div>
                </div>
              </div>
            
         <?php   }
      ?>
        </div>
        
        <hr>
        <h2>Soumettre une offre</h2>
        <form method="post" action="formstage.php">
            <div class="form-group">
                <select class="custom-select d-block w-100" id="type" name="type" required>
                  <option value="">Type d'offre </option>
                  <option>Offre de Stage</option>
                  <option>Offre d'Emploi</option>
                </select>
                </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Titre de l'offre" name="titre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nom de l'entreprise" name= "nom_entreprise">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Mission 1" name="mission1">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Mission 2" name="mission2">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Mission 3" name="mission3">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Mail de l'entreprise" name="mail_entreprise">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
        </form>
        
    </div>

     
        
    <footer class="my-5 pt-md-5 border-top text-muted text-center text-small">
      <div class="container">
          <img class="mb-2" src="http://exetertri.co.uk/wp-content/uploads/2015/10/swim-logo.png" alt="" width="24" height="24">
        <p class="mb-1">&copy; 2017-2018 Swim</p>
      </div>
    </footer>
  </body>
</html>
