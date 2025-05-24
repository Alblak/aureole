<?php


$SelData=$connexion->prepare("SELECT transaction.dates,sum(panier.prix) as total from transaction,panier where transaction.supprimer=0 and transaction.id=panier.transaction group by transaction.dates DESC;");
$SelData->execute();
if(isset($_GET['date']))
{
    $dat=($_GET['date']);
    $SelData=$connexion->prepare("SELECT transaction.client,transaction.id,sum(panier.prix) as total from transaction,panier where transaction.supprimer=0 and transaction.id=panier.transaction and transaction.dates=? group by transaction.id DESC;");
    $SelData->execute(array($dat));

}


?>