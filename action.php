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
 
if ($_GET['action']=="delete") 
{
	$bdd->query("DELETE FROM sendami WHERE id=".$_GET['id']);
	header("Location:vous.php");
} 
if ($_GET['action']=="add")
{
	$req0=$bdd->prepare("INSERT INTO  sendami(id_demande,id_receveur, attente) VALUES (:id_demande, :id_receveur, :attente)");
	$req0->execute([
		 "id_demande"=>$_SESSION['id_auteur'],
		 "id_receveur"=>$_GET['id_auteur'],
		 "attente"=>1
	]);
	header("Location:sugami.php");
}

if ($_GET['action']=="accept")
{
	$bdd->query("UPDATE sendami SET attente=0 WHERE id =:".$_GET['id'] );
	header("Location:sugami.php");
}


?>