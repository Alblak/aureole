<?php include_once('../../connexion/connexion.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $supprimer=1;
    $req=$connexion->prepare("UPDATE  utilisateur SET supprimer=? where id=?");
    $req->execute(array($supprimer,$id));
    if($req)
    {
        $_SESSION['notif']="Suppression  reussie";
        $_SESSION['color']='dark';
        $_SESSION['icon']="trash3-fill";
        header('location:../../views/utilisateur.php');
    }
}
?>