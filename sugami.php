<?php

session_start();

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=SWIM', 'root', 'root');
}
catch(Exception $e)
{
  die('Erreur connexion'.$e->getMessage());
}
  
$req=$bdd->prepare("SELECT * FROM sendami WHERE id_demande=:id_demande OR id_receveur=:id_receveur");
$req->execute([
	"id_demande"=> $_SESSION['id_auteur'],
	"id_receveur"=> $_SESSION['id_auteur']]);
$res=$req->fetchAll();

if($_SESSION["id_auteur"])
{
	$autre[]=$_SESSION["id_auteur"];
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Reseaux</title>

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
          <li class="nav-item">
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
          <li class="nav-item active">
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

<body>
	<div class="container">
		<h1><br/><br/>Bienvenue dans ta liste d'amie</h1>
		<h2>Liste d'ami : </h2>

<?php
for ($i=0; $i <sizeof($res) ; $i++) 
{ 
	if($res[$i]['id_demande']==$_SESSION['id_auteur'])
	{
    $req99=$bdd->query('SELECT * FROM auteur');
    $res2= $req99->fetchAll();
    echo $res2[$i]['prenom']." ".$res2[$i]['nom']. "<a href='action.php?action=delete&id=".$res[$i]['id']."'> Supprimer </a>";
		$autre[]=$res[$i]['id_receveur'];

		if ($res[$i]['attente']== true) 
		{
			echo ('en attente d acceptation');
		}
	}
	else
	{
		if ($res[$i]['attente']== false) 
		{
    $req99=$bdd->query('SELECT * FROM auteur');
  $res2= $req99->fetchAll();
    echo $res2[$i]['prenom']." ".$res2[$i]['nom']. "<a href='action.php?action=delete&id=".$res[$i]['id_auteur']."'> Supprimer </a>";
			$autre[]=$res[$i]['id_demande'];
		}
	}
	echo '<br/>';
} 
?>

<h2>En attente :</h2>
 <?php  
for ($i=0; $i <sizeof($res) ; $i++) 
{ 
  $req99=$bdd->query('SELECT * FROM auteur');
  $res2= $req99->fetchAll();
	if($res[$i]['attente']==true && $res[$i]['id_receveur']== $_SESSION['id_auteur'])
	{
		echo $res2[$i]['prenom']." ".$res2[$i]['nom']. "<a href='action.php?action=accept&id=". $res[$i]['id'] ."'> Accepte </a> <a href='action.php?action=delete&id=".$res[$i]['id_auteur']."'> Refusé  </a><br/>";
		$autre[]=$res[$i]['id_demande'];
	}

	echo '<br/>';
} 

 ?>

 <h2> Suggestions d'amis : </h2>
<?php  
$req99=$bdd->query('SELECT * FROM auteur');
$res2= $req99->fetchAll();
for ($i=0; $i <sizeof($res2) ; $i++) 
{
	if (!in_array($res2[$i]['id_auteur'], $autre)) 
	{
		echo $res2[$i]['prenom']." ".$res2[$i]['nom']. "<a href='action.php?action=add&id_auteur=".$res2[$i]['id_auteur']."'> Inviter en ami </a>" ;
	}

}
?>
	</div>
</body>
</html>