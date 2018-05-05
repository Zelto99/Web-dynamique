<?php

session_start();

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=Swim', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
  die('Erreur connexion'.$e->getMessage());
}


  echo $id_auteur=$_SESSION['id_auteur'];    
  echo $type=$_POST['type'];
  echo $titre=$_POST['titre'];
  echo $nom_entreprise=$_POST['nom_entreprise'];
  echo $mission1=$_POST['mission1'];
  echo $mission2=$_POST['mission2'];
  echo $mission3=$_POST['mission3'];
  echo $mail_entreprise=$_POST['mail_entreprise'];

  $req1=$bdd->prepare("INSERT INTO emploi(id_auteur,type,titre,nom_entreprise,mission1,mission2,mision3,mail_entreprise) VALUES(?,?,?,?,?,?,?,?)");
  $req1->execute(array($id_auteur,$type,$titre,$nom_entreprise,$mission1,$mission2,$mission3,$mail_entreprise,));
     

//header("Location:emp.php");
?>