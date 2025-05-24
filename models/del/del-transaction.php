<?php 
include('../../connexion/connexion.php');
if(isset($_GET['iddel']))
{
    $id=$_GET['iddel'];
    $req=$connexion->prepare("DELETE FROM transaction where id=?");
    $req->execute(array($id));
    if($req){
        $reqq=$connexion->prepare("DELETE FROM panier where transaction=?");
        $reqq->execute(array($id));
        $_SESSION['notif']="suppression  reussie";
        $_SESSION['color']='dark';
        $_SESSION['icon']="trash3-fill";
        header("location:../../views/transaction.php");
    }
}
if(isset($_GET['iddelpanier']))
{
    $com=$_GET['com'];
    $id=$_GET['iddelpanier'];
    $req=$connexion->prepare("DELETE FROM panier where id=?");
    $req->execute(array($id));
    $_SESSION['notif']="suppression  reussie";
    $_SESSION['color']='dark';
    $_SESSION['icon']="trash3-fill";
    header("location:../../views/transaction.php?com=$com");
    
}

if(isset($_GET['cancel']))
{

    $id=$_GET['cancel'];
    $req=$connexion->prepare("DELETE FROM transaction where id=?");
    $req->execute(array($id));
    if($req)
    {
        $reqq=$connexion->prepare("DELETE FROM panier where transaction=?");
        $reqq->execute(array($id));
        $_SESSION['color']='dark';
        $_SESSION['icon']="trash3-fill";
        $_SESSION['notif']="une transaction a ete annuler";
        header("location:../../views/transaction.php");

    }
}