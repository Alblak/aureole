<?php
include("../../connexion/connexion.php");
if(isset($_POST['valider_new']))
{

    $sel_lastnum=$connexion->prepare("SELECT numfacture from transaction order by  id desc limit 1");
    $sel_lastnum->execute();
    $numfacutre=0;
    if($last=$sel_lastnum->fetch())
    {
        $numfacutre=$last['numfacture']+1;
       
    }
    else
    {
        $numfacutre=1;
       
    }

   
    $date=date('Y-m-d');
    $client=htmlspecialchars($_POST['client']);
    $req=$connexion->prepare("INSERT INTO transaction(dates,client,numfacture) values (?,?,?)");
    $req->execute(array($date,$client,$numfacutre));
    if($req)
    {
        $sel_com=$connexion->prepare("SELECT  * from transaction where dates=? and client=? order by id desc LIMIT 1");
        $sel_com->execute(array($date,$client));
        $com=$sel_com->fetch();
        $idcom=$com['id'];
        header("location:../../views/transaction.php?new&com=$idcom");
    }
}

if (isset($_POST['valider'])){
    $service=htmlspecialchars($_POST['service']);
    $prix=htmlspecialchars($_POST['prix']);
   
    $transaction=$_GET['com'];
    $req=$connexion->prepare("INSERT into panier(transaction,service,prix) values (?,?,?)");
    $req->execute(array($transaction,$service,$prix));
    if($req)
    {
        $_SESSION['notif']="Un element vient d'etre ajouter dans le panier";
        $_SESSION['color']='success';
        $_SESSION['icon']="check-circle-fill";
        header("location:../../views/transaction.php?com=$transaction");
    }
 }



?>