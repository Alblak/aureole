<?php
include_once('../connexion/connexion.php');
if(isset($_POST['valider']))
{
   
    
    $username=htmlspecialchars($_POST['username']);
    $password=htmlspecialchars($_POST['password']);
    $req=$connexion->prepare("SELECT * from utilisateur where username=? and password=?");
    $req->execute(array($username,$password));
    if($user=$req->fetch())
    { 
        unset($_SESSION['notif']);
        unset($_SESSION['color']);
        unset($_SESSION['icon']);
        $_SESSION['fonction']=$user['fonction'];
        
        $_SESSION['noms']=$user['nom']." ".$user['postnom'];
        header("location:../views/accueil.php");

    }
    else
    {
        $_SESSION['notif']="username ou mot de passe incorrect";
        $_SESSION['color']='danger';
        $_SESSION['icon']="x-circle-fill";
        header("location:../loginn.php?fonction=$fonction");
    }

}
else
{
    header("location:../index.html");
}
?>