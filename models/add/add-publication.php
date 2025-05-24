<?php 
include('../../connexion/connexion.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $dates=date('Y-m-d');
    $designation=htmlspecialchars($_POST['designation']);
    $croppedImage = $_POST['croppedImage'];
    if ($croppedImage) 
        {
            $uploadDir = '../../admin/assets/img/publication/'; 
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImage));
            $fileName = time() . '.jpg'; 
            $filePath = $uploadDir . $fileName;
                if(file_put_contents($filePath, $imageData)) 
                {
                        $req=$connexion->prepare("INSERT INTO publication (dates,designation,photo) values (?,?,?)");
                        $req->execute(array($dates,$designation,$fileName)); 
                        if($req){
                            $upload="../../admin/assets/img/publication/";
                            move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
                    
                            $_SESSION['notif']="Enregistrement reussi";
                            $_SESSION['color']='dark';
                            $_SESSION['icon']="check-circle-fill";
                            header('location:../../views/publication.php');
                        }
                }
           }
    
                
}

?>