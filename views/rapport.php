<?php 
include('../connexion/connexion.php');
include_once('../models/select/sel-rapport.php');
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
            
                <h2 class=" text-danger">rapport</h2>
              
            </div><!-- End Page Title -->
       
        </div>
       
        
          <section class="section">
              <div class="row">
                  <div class="col-lg-12">

                      <div class=" p-3  m-3">
                          <div class="card-body ">
                            <?php if(isset($_GET['date'])){?>
                                <div class="col-12 no-print mb-3">
                                    <a href="rapport.php" class="btn btn-danger col-12 me-2">retour a la liste </a>
                                </div>
                                <div class=" table-responsive shadow p-3">
                                    <table class="table table-borderless datatable   ">
                                    <h4 class="p-3 ">Rapport  du <?php $datees=strtotime($_GET["date"]); echo date('d/m/Y',$datees);?> </h4>

                                        <thead>
                                            <tr>
                                                <th scope="col">N°</th>  
                                                <th scope="col">client</th>
                                                <th scope="col">montant</th>
                                                <th scope="col">action</th>
                                            

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                        
                                            $numero=0;
                                            $totalg=0;
                                            while($data=$SelData->fetch())
                                            { 
                                                
                                                $totalg=$totalg+$data['total'];
                                            
                                            
                                            
                                            
                                                $numero++;
                                            ?>
                                        <tr>
                                                <th scope="row"><?php echo $numero; ?></th>
                                                
                                                <td><?=$data['client']?></td>
                                                
                                            
                                                <td><?=$data['total']?>$</td>
                                                <td>   <a href="facture.php?com=<?=$data['id']?>" class="btn btn-danger btn-sm "><i
                                                class="bi bi-eye-fill"></i></a></td>
                                                

                                        </tr>
                                
                                            <?php } ?>
                                            <tr>
                                                <td colspan="2">TOTAL</td>
                                            
                                            
                                                <td><?=$totalg?> $</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            <?php }else{ ?>
                                <div class=" table-responsive shadow p-3">
                                    <table class="table table-borderless datatable   ">
                                    <h4 class="p-3 ">Rapport</h4>
                                        <thead>
                                            <tr>
                                                <th scope="col">N°</th>  
                                                <th scope="col">Date</th>
                                                <th scope="col">montant</th>
                                                <th scope="col">action</th>
                                            

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                        
                                            $numero=0;
                                            $totalg=0;
                                            while($data=$SelData->fetch())
                                            { 
                                                
                                                $totalg=$totalg+$data['total'];
                                            
                                            
                                            
                                            
                                                $numero++;
                                            ?>
                                        <tr>
                                                <th scope="row"><?php echo $numero; ?></th>
                                                
                                                <td><?php $dates=strtotime($data["dates"]); echo date('d/m/Y',$dates);?></td>
                                                
                                            
                                                <td><?=$data['total']?>$</td>
                                                <td>   <a href="?date=<?=$data['dates']?>" class="btn btn-danger btn-sm "><i
                                                class="bi bi-eye-fill"></i></a></td>
                                                

                                        </tr>
                                
                                            <?php } ?>
                                            <tr>
                                                <td colspan="2">TOTAL</td>
                                            
                                            
                                                <td><?=$totalg?> $</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <!-- End Table with stripped rows -->
                            <?php }?>
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