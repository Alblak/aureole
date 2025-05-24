<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-publication.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier publication";
    
    $req=$connexion->prepare("SELECT * from publication where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from publication where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-publication.php";
    $bouton="Enregistrer";
    $titre="Ajouter publication";

}

$SelData=$connexion->prepare("SELECT * from publication where supprimer=0");
$SelData->execute();

