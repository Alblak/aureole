<?php
try {
session_start();	
$connexion=new PDO('mysql:dbname=multi; host=localhost', 'root', '');
} catch (Exception $e) {
	echo $e;
	
}
$sel_entree=$connexion->prepare("SELECT sum(panier.prix) as total from panier,transaction where panier.transaction=transaction.id and transaction.supprimer=0 and panier.supprimer=0");
$sel_entree->execute();
$entree=$sel_entree->fetch();
if($entree['total']!="")
{
	$total_entree=$entree['total'];
}
else
{
	$total_entree=0;
}

$sel_sortie=$connexion->prepare("SELECT sum(montant) as total from sortie where supprimer=0");
$sel_sortie->execute();
$sortie=$sel_sortie->fetch();
if($sortie['total']!="")
{
	$total_sortie=$sortie['total'];
}
else
{
	$total_sortie=0;
}
$_SESSION['caisse']=$total_entree-$total_sortie;




?>