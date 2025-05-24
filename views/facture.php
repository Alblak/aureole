<?php 
include('../connexion/connexion.php');
include('../models/select/sel-transaction.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>multi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 <?php include('../include/link.php'); ?> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<style>

@media print {
    .no-print {
        display: none;
    }
}

 @media print {
            .no-print {
                display: none;
            }
        }

 th, td, tr {
      border: 5px solid black; 
      border-collapse: collapse; 
  }
 
</style>


</head>

<body class='m-3'>
<div class="row ">

   
        <div class="col-6 no-print mb-3">
            <a href="transaction.php?new" class="btn btn-danger col-12 me-2">Nouvelle Facture</a>
        </div>
        <div class="col-6 no-print mb-3">
            <button onclick="window.print()" class="btn btn-dark col-12 me-2">Imprimer</button>
        </div>
        <!-- <div class="col-6 no-print mb-3">
            <button onclick="saveAsImage()" class="btn btn-dark col-12 me-2">Imprimer</button>
         </div> -->
   
</div>

<div class="m-3" id="invoice">
  <table class="table">
      <thead>
        <tr>
            <th class='fs-3'  colspan='4'><span class='fs-1'>AUREOLE MULTISERVICES</span> 
      <br>
      <div class="row">
        <div class="col-6">
              
                 Q.Vungi  
                 <br> rue kin ,   N° 1  
        </div>
        <div class="col-6">
            Bbo le <?php $dates=strtotime($detail["dates"]); echo date('d/m/Y ',$dates);?>   
        </div>
      </div>
          Tel : +243 977139499 
      <br>
              <center>Facture n° <?php echo sprintf('%04d', $detail['numfacture']);?></center>
      <br>
              Mr,Mme : <?php echo strtoupper($detail['client']);?>
    
    
            
            </th>
              
        </tr>
            
          <tr class='fs-1'>
             
              <th scope="col">Designation</th>
              
              <th scope="col"><center>Prix</center></th>
             
             
          </tr>
      </thead>
      <tbody class='fs-1'>
        <?php 
        $numero=0;
        $total=0;
        while($data=$Selpanier->fetch()){
            $numero++;
            $PT=$data['prix'];
            $total=$total+$PT;
        ?>
        <tr>
             <td><strong><?=$data['service']?></strong></td>
          
       
            <td><strong><center><?=$PT?></center></strong></td>
           
        </tr> 
        <?php } ?> 
        <tr class='fs-1'>
          <td  ><strong>TOTAL</strong> </td>
          <td><strong><center><?=$total?> $</center></strong> </td>
        </tr>  
        <tr>
            <td colspan='4' class='text-center'>
                <em><strong>The tehcno of the brain</strong></em>

            </td>
        </tr>  
          
      </tbody>
  </table>
</div>

<script>
function saveAsImage() {
    const invoiceElement = document.getElementById('invoice');
    html2canvas(invoiceElement).then(canvas => {
        const link = document.createElement('a');
        link.download = 'facture.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    });
}
</script>

</body>

</html>