<?php
include_once('../connexion/connexion.php');
$_SESSION['fonction']="";
// if(!isset($_SESSION['fonction']) || empty($_SESSION['fonction'] ))
// {
//   header('location:../index.html');
// }
?>
<header id="header" class="bg-black no-print">
    <div class="d-flex flex-column " >

      <div class="profile">
        <img src="../admin/assets/img/log.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light "><a href="#">Aureole</a></h1>
       
        <div class="social-links mt-3 text-center">
      
         
          <hr class="text-danger">

       
        </div>
      </div>
     

      <nav id="navbar" class="nav-menu navbar ">
        <ul>
          <li class=""><a  href="../views/accueil.php" class="nav-link scrollto active pb-0 mb-0   text-danger "><i class="bx bx-home text-danger"></i><strong> <span>Home</span></strong></a></li>
          <li ><a href="../views/publication.php" class="nav-link scrollto active pb-0 mb-0  text-danger"><i class="bi bi-arrow-repeat text-danger"></i><strong> <span>Publier</span></strong></a></li>
          <li ><a href="../views/transaction.php" class="nav-link scrollto active pb-0 mb-0  text-danger"><i class="bi bi-bar-chart-fill text-danger"></i><strong> <span>transaction</span></strong></a></li>
          <li ><a href="../views/sortie.php" class="nav-link scrollto active pb-0 mb-0  text-danger"><i class="bi bi-bar-chart-fill text-danger"></i><strong> <span>sortie</span></strong></a></li>
          <li ><a href="../views/rapport.php" class="nav-link scrollto active pb-0 mb-0  text-danger"><i class="bi bi-book-half text-danger"></i><strong> <span>rapport</span></strong></a></li>
          <?php if($_SESSION['fonction']=="secretaire"){?>
                <li ><a href="../views/publication.php" class="nav-link scrollto active pb-0 mb-0  text-danger"><i class="bi bi-arrow-repeat text-danger"></i><strong> <span>Publier</span></strong></a></li>
               
              
               
          <?php }  else { ?>
                 <li ><a href="../views/utilisateur.php" class="nav-link scrollto active pb-0 mb-0  text-danger"><i class="bi bi-people text-danger"></i><strong> <span>users</span></strong></a></li>
                 
          <?php } ?>
                 <li ><a  href="../index.html" class="nav-link scrollto active pb-0 mb-0  text-danger"><i class="bi bi-toggle2-off text-danger"></i><strong><span>Deconnexion</span></strong> </a></li>
          
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
         

         
         
          
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header>