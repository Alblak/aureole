<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-transaction.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier l'transaction";
    
    $req=$connexion->prepare("SELECT * from transaction where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}
else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from transaction where  id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
if(isset($_GET['idexp'])){
    $idexp=$_GET['idexp'];
    $action="../models/add/add-transaction.php?idexp=$idexp";
    $bouton="Enregistrer";
    $titre="Ajouter transaction";
}
else
{
   
    $action="../models/add/add-transaction.php";
    $bouton="enregistrer";
    $titre="ajouter une transaction";
    
    

}

if(isset($_GET['com']))
{
    

    $idd=$_GET['com'];
    $action="../models/add/add-transaction.php?com=$idd";
    $bouton="Enregistrer";
    $titre="Ajouter sortie";
    $sel_cl=$connexion->prepare("SELECT * from transaction where id=?");
    $sel_cl->execute(array($idd));
    $detail=$sel_cl->fetch();
   
    $Selpanier=$connexion->prepare("SELECT * from panier where transaction=?");
    $Selpanier->execute(array($idd));
}






$SelData=$connexion->prepare("SELECT  transaction.* from transaction  where transaction.supprimer=0  ORDER BY transaction.id DESC");
$SelData->execute();