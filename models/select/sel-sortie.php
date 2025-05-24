<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-sortie.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier l'sortie";
    
    $req=$connexion->prepare("SELECT * from sortie where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}
else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from sortie where  id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else
{
    $action="../models/add/add-sortie.php";
    $bouton="ajouter";
    $titre="ajouter une depense";
}










$SelData=$connexion->prepare("SELECT  * from sortie  where supprimer=0  ORDER BY id DESC");
$SelData->execute();