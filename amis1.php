<!doctype html>
<html lang="fr">
  <head>

   <?php
   
     try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=Swim;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title><?php echo $_SESSION['prenom']?><?php echo $_SESSION['nom']?></title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
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
          <li class="nav-item active">
            <a class="nav-link" href="#">Réseaux</a>
          </li>
          <li class="nav-item">
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

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-primary">
        <div class="col-md-8 px-0">
          <h1 class="display-4">
              <center>Bienvenue sur le profil de <?php echo $_SESSION['prenom']?> <?php echo $_SESSION['nom']?> !</center>
            </h1>
        </div>
      </div>
    
    <div class="container">
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary display-4">Voici son profil</strong>
              <h6 class="mb-0">
                <?php echo $_SESSION['prenom']?>
              </h6>
              <h6 class="mb-0">
                <?php echo $_SESSION['nom']?> 
              </h6>
              <h6 class="mb-0">
                <?php echo $_SESSION['age']?> ans
              </h6>
              <h6 class="mb-0">
                <?php echo $_SESSION['mail']?>
              </h6>
              <h6 class="mb-0">
                <?php echo $_SESSION['adresse']?> 
              </h6>
              <h6 class="mb-0">
                <?php echo $_SESSION['ville']?>
              </h6>
            </div>
            <img class="card-img-right align-self-center rounded-circle" src="<?php echo $_SESSION['photo']?>" width="150" height="150" alt="Card image cap">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary display-4">Curriculum Vitae </strong>
              <h6 class="mb-0">
                <a class="text-dark" href="#">Consulter le CV de <?php echo $_SESSION['prenom']?> </a>
              </h6>
            </div>
            <img class="card-img-right align-self-center flex-auto d-none d-lg-block" src="http://www.oakmoor-recruitment.co.uk/wp-content/uploads/2016/03/job-seekers-icon.png" width="100" height="100">
          </div>
        </div>
      </div>
    </div>
      
    <main role="main" class="container">
      <div class="row bg-white">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 border-bottom">
            Expérience
          </h3>
    
    <?php
        $req = $bdd->prepare('SELECT * FROM experience WHERE id_auteur = ?');
        $req->execute(array($_SESSION['id_auteur']));
    
        while ($experience = $req->fetch())
        {
        $poste=$experience['poste'];
        $mission=$experience['mission'];
        $entreprise=$experience['entreprise'];
      
      ?>
            <h5>Poste</h5>
            <p> <?php echo $poste ?> </p>
            <h5>Mission</h5>
            <p> <?php echo $mission ?> </p>
            <h5>Entreprise</h5>
            <p> <?php echo $entreprise ?> </p>
            <hr>
    <?php  }
    ?>
        </div>

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">Un petit plus !</h4>
            <p class="mb-0"> Enrichissez votre profil afin de trouver plus facilement des stages ou des emplois mais surtout d'attirer l'oeil des professionnels ! </p>
          </div>

            
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Ajouter une expérience
        </button>
          
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <div class="container">
        <p class="mb-1">&copy; 2017-2018 Swim</p>
      </div>
    </footer>
  </body>
</html>