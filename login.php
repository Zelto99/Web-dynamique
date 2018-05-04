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
if(isset($_POST['connexion']))
{
    $mail=htmlspecialchars($_POST['mail']);
    $mdp=$_POST['mdp'];
    $req = $bdd->prepare('SELECT * FROM auteur WHERE mail = ?');
    $req->execute(array($mail));
    $donnees = $req->fetch();
    if ($mdp==$donnees['mdp'])
    {
        $_SESSION['id_auteur']=$donnees['id_auteur'];
        $_SESSION['mail']=$mail;
        $_SESSION['mdp']=$donnees['mdp'];
        $_SESSION['prenom']=$donnees['prenom'];
        $_SESSION['nom']=$donnees['nom'];
        $_SESSION['pseudo']=$donnees['pseudo'];
        $_SESSION['age']=$donnees['age'];
        $_SESSION['adresse']=$donnees['adresse'];
        $_SESSION['ville']=$donnees['ville'];
        $_SESSION['code-postal']=$donnees['code-postal'];
        $_SESSION['photo']=$donnees['photo'];
        header("Location:vous.php");
    }
    else 
    {
        header('Location:login.php');
    }
}

?>