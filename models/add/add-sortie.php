<?php
include("../../connexion/connexion.php");
if(isset($_POST['valider']))
{

    $sel_lastnum=$connexion->prepare("SELECT numero from sortie order by  id desc limit 1");
    $sel_lastnum->execute();
    $numfacutre=0;
    if($last=$sel_lastnum->fetch())
    {
        $numfacutre=$last['numero']+1;
       
    }
    else
    {
        $numfacutre=1;
       
    }

   
    $date=date('Y-m-d');
    $libelle=htmlspecialchars($_POST['libelle']);
    $montant=htmlspecialchars($_POST['montant']);

    $req=$connexion->prepare("INSERT INTO sortie(dates,libelle,montant,numero) values (?,?,?,?)");
    $req->execute(array($date,$libelle,$montant,$numfacutre));
    if($req)
    {
       
        $_SESSION['notif']="Enregistrement reussi";
        $_SESSION['color']='dark';
        $_SESSION['icon']="check-circle-fill";
        header("location:../../views/sortie.php");
    }
}