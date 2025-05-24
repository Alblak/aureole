<?php 
include('../connexion/connexion.php');
include_once('../models/select/sel-transaction.php');
if(isset($_GET['idclient']))
{

   
  

   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>transaction </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- link -->
    <?php 
    include_once('../include/link.php');
    
    ?>
  <!-- link -->
  
<!-- menu -->
<?php 
include_once('../include/menu.php');
?>

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <main id="main" class="main">
        <div class="row " >
    
            <div class="col-120 bg-black position-fixed m-auto p-3">
            
                <h2 class=" text-danger">transaction</h2>
              
            </div><!-- End Page Title -->
       
        </div>
       
        
          <section class="section">
              <div class="row">
                  <div class="col-lg-12">

                      <div class=" p-3  m-3">
                          <div class="card-body ">
                    <?php      if(isset($_GET['idsup']) && ! empty($_GET['idsup'])){
                    ?>
                        <div class="col-12 h-100  d-flex justify-content-center align-items-center p-4">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 bg-black card p-3 shadow   m-3">
                                <div class="card-header text-dark d-flex justify-content-between">
                                    <b class="text-white">Supprimer</b>
                                    <a href="transaction.php" class="btn btn-outline-danger text-white"><b><i class="bi bi-x"></i></b></a>
                                    
                                </div>
                                <div class="card-body py-3  text-white">
                                    Voulez-vous vraiment supprimer l'transaction de "<b> <?=$supprimer['client']."  du  "?> <?php $dates=strtotime($supprimer["dates"]); echo date('d-m-Y',$dates);?> </b>"?
                                    <br>
                                    <em class="mt-3 text-danger">NB: cette action est irréversible</em>
                                </div>
                                <div class="card-footer">
                                    <a href='../models/del/del-transaction.php?iddel=<?=$_GET['idsup'] ?>' class="btn btn-outline-danger">Supprimer</a>
                                    <a href="transaction.php" class="btn btn-danger">Annuler</a>
                                </div>
                            </div>
                        </div>
                    <?php
                }else { ?>
                            <?php if(isset($_GET['new']) && !isset($_GET['com'])){?>
                                <div class="shadow p-3 row">
                                    <center><h2>transaction</h2></center>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                                                <label for=""></span></label>
                                                <a href="transaction.php?fin"><input type="buttom" class="btn btn-danger w-100" name="annuler " value="Annuler l'operation"></a>
                                        </div>
                                            
                                        <div>
                                  <form  class="shadow  p-3 m-3" action="<?=$action?>" id="uploadForm" method="POST" enctype="multipart/form-data">
                                  <h5 class="card-title text-center ">chosir le client</h5>
                                    <div class="row">
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                                            <label for="">Nom du client</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: ALBERT"  name="client" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['client']?>" <?php } ?>> 
                                        </div>
                                       
                                        
                                     
                                      
                                        <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">


                                        <?php if(isset($_SESSION['notif'])){ ?>
                                            <center><p class="alert-<?=$_SESSION['color']?> alert">
                                            <b> <i class="bi bi-<?=$_SESSION['icon']?>">  <?php echo $_SESSION['notif']; unset($_SESSION['notif']) ?></i></b>
                                                    
                                            </p></center> 
                                        <?php } ?> 
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 ">
                                        <input type="submit" class="btn btn-dark text-white p-2 w-100" name="valider_new" value="suivant">
                                        
                                    </div>
                                          
                  
                
                                  </form>
                                </div>
                                      
                                          

                                    
                                
                                </div>
                            <?php }else if(isset($_GET['com']) || isset($_GET['id'])){ ?>
                                
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6">
                                         <form  class="shadow  p-3 m-3" action="<?=$action?>" method="POST">
                                            <h5 class="card-title text-center "></h5>
                                            <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                                                    <label for="">service rendu</span></label>
                                                    <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:impression"  name="service" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['service']?>" <?php } ?>> 
                                                </div>
                                                
                                               
                                                <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                                                    <label for="">prix</span></label>
                                                    <input autocomplete="off" required type="number" class="form-control" step="0.01" placeholder="Ex:12.5"  name="prix" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['prix']?>" <?php } ?>> 
                                                </div>
                                                
                                                <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">


                                                    <?php if(isset($_SESSION['notif'])){ ?>
                                                        <center><p class="alert-<?=$_SESSION['color']?> alert">
                                                        <b> <i class="bi bi-<?=$_SESSION['icon']?>">  <?php echo $_SESSION['notif']; unset($_SESSION['notif']) ?></i></b>
                                                                
                                                        </p></center> 
                                                    <?php } ?> 
                                                </div>
                                                
                                                <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 ">
                                            
                                                    <?php if(isset($_GET['id'])){?>
                                                    <div class="row">
                                                        <div class="col-xl-8 col-lg-8 col-md-8  col-sm-8">
                                                            <input type="submit" class="btn btn-danger text-white p-2 mt-1 w-100" name="valider" value="<?=$bouton?>">
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4">
                                                            <a href="transaction.php" class="btn btn-dark p-2  mt-1 w-100">Annuler</a>
                                                        </div>
                                                    </div>
                                                    <?php }else {?>
                                                            <input type="submit" class="btn btn-danger text-white p-2 w-100" name="valider" value="valider">
                                                        <?php } ?>
                                                </div>
                                            </div>
                                                
                        
                        
                                        </form>
                                    </div>
                                   
                                    <div class="shadow p-3 col-xl-6 col-lg-6 col-md-6  col-sm-6">

                                        <?php if(isset($_GET['com'])){?>
                                        <div>

                                            <h5>Aureole multiservice</h5>
                                            <p>CLIENT : <?=$detail['client'];?></p>
                                            <p>Date : <?php $dates=strtotime($detail["dates"]); echo date('d-m-Y',$dates);?></p>
                                           
                                        </div>
                                        <?php } ?>
                                        

                                        <div class=" table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    
                                                    <th scope="col">designation</th>
                                                   
                                                    <th scope="col">Prix</th>
                                                    
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $numero=0;
                                                $total=0;
                                                $totalo=0;
                                                while($data=$Selpanier->fetch()){
                                                    $numero++;
                                                    $PT=$data['prix'];
                                                    $total=$total+$PT;
                                                    $totalo=$total;
                                                ?>
                                                <tr>
                                                    <td><?=$data['service']?></td>
                                                   
                                       
                                                   
                                                    <td><?=$data['prix']?> </td>
                                                    
                                                    <td>
                                                    
                                                        <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                                                        href="../models/del/del-transaction.php?iddelpanier=<?=$data['id']?>&com=<?=$_GET['com']?>"
                                                        class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                                                    </td>
                                                </tr> 
                                                <?php } ?> 
                                                <tr>
                                                <td colspan='1'>TOTAL</td>
                                                <td><?=$total?>$</td>
                                                </tr>       
                                            </tbody>
                                        </table>
                                        </div>

                                        </div>
                                        <div class="col-4"><a  href="../models/del/del-transaction.php?cancel=<?=$_GET['com'];?>" class="col-12 btn btn-danger ">Annuler </a> </div>
            
                                        <div  <?php if($totalo==0){ ?> Hidden <?php } ?> class="col-8"><a href="facture.php?com=<?=$_GET['com'];?>"  class="col-12 btn btn-dark ">Valider et imprimer</a> </div>

                                        <div class="col-12 p-3"><a  href="transaction.php?new" class="col-12 btn btn-outline-dark bi bi-plus">Nouvelle commande</a> </div>

                                    
                            </div>

                            <?php }else{ ?>
                                
                                <a href=" transaction.php?new" class="col-12 btn btn-outline-danger">facturer</a> 
                                <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">


                                        <?php if(isset($_SESSION['notif'])){ ?>
                                            <center><p class="alert-<?=$_SESSION['color']?> alert">
                                            <b> <i class="bi bi-<?=$_SESSION['icon']?>">  <?php echo $_SESSION['notif']; unset($_SESSION['notif']) ?></i></b>
                                                    
                                            </p></center> 
                                        <?php } ?> 
                                    </div>
                            <?php } ?>
                <?php }  ?>
                            <div class=" table-responsive shadow p-3">
                                <table class="table table-borderless datatable   ">
                                <h4 class="p-3 ">Liste d'transaction</h4>
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>  
                                            <th scope="col">Date</th>
                                            <th scope="col">N° facture</th> 
                                            <th scope="col">Client</th>
        
                                            <th scope="col">montant</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        $quantite=0;
                                        $numero=0;
                                        $totalg=0;
                                        while($data=$SelData->fetch())
                                        { 
                                             $total=0;
                                           
                                            $com=$data['id'];
                                            $Selpanier=$connexion->prepare("SELECT sum(prix) as prix from panier where transaction=?");
                                            $Selpanier->execute(array($com));
                                            $tot=0;
                                            while($panier=$Selpanier->fetch())
                                            {
                                                $tot=$panier['prix'];
                                                $total=$total+$tot;
                                                $totalg=$totalg+$total;
                                            }
                                        
                                           
                                            $numero++;
                                        ?>
                                       <tr>
                                            <th scope="row"><?php echo $numero; ?></th>
                                            
                                            <td><?php $dates=strtotime($data["dates"]); echo date('d/m/Y',$dates);?></td>
                                            <td><?php echo sprintf('%04d', $data['numfacture']);?></td>
                                            <td><?=$data['client']?></td>
                                            <td><?=$total?>$</td>
                                            <td>
                                            <a href="facture.php?com=<?=$data['id']?>" class="btn btn-danger btn-sm "><i
                                             class="bi bi-eye-fill"></i></a>

                                              <a   href="?idsup=<?=$data['id']?>"
                                                class="btn btn-dark btn-sm "><i class="bi bi-trash3-fill"></i></a>
                                        </td>

                                       </tr>
                               
                                        <?php } ?>
                                        <tr>
                                            <td colspan="4">TOTAL</td>
                                           
                                          
                                            <td><?=$totalg?> $</td>
                                       </tr>
                                    </tbody>
                                </table>
                                
                              </div>
                              <!-- End Table with stripped rows -->

                             </div>
                          </div>
                      </div>

                  </div>
              </div>
          </section>
    

     

        <footer id="footer">
        <?php 
          include_once('../include/footer.php');
          
          ?>
        </footer>

  </main><!-- End #main -->
  

  <!-- ======= Footer ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- JS Files -->
  <?php 
    include_once('../include/script_tab.php');
    
    ?>

 


</body>

</html>