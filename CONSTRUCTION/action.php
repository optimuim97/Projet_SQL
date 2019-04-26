<?php
    require('partials/config.php');
    $prenom = $_SESSION['prenom'];
    $id = $_SESSION['id_clients'];



    
    // ciment
    if(isset($_POST['submit_ciment'])){
        $id;
        $nom =$_POST['ciment'];
        $quantite =$_POST['quantite'];
        $prix =$_POST['prix'];
        
         $query="INSERT INTO commande(nom_produits,id_clients,quantite,prix) VALUES (?,?,?,?)";
        
            $req = $pdo->prepare($query);
            
            $req->bindValue(1,$nom);
            $req->bindValue(2,$id);
            $req->bindValue(3,$quantite);
            $req->bindValue(4,$prix);
            // $req->bindValue(5,curdate());
            $req->execute();
            $success='<div class="alert alert-success">Votre commande a été prise en compte</dib>';
        }
       

    // Gravier
        if(isset($_POST['submit_gravier'])){
            $id;
            $nom =$_POST['gravier'];
            $quantite =$_POST['quantite'];
            $prix =$_POST['prix'];
            
             $query="INSERT INTO commande(nom_produits,id_clients,quantite,prix) VALUES (?,?,?,?)";
            
                $req = $pdo->prepare($query);
                
                $req->bindValue(1,$nom);
                $req->bindValue(2,$id);
                $req->bindValue(3,$quantite);
                $req->bindValue(4,$prix);
                // $req->bindValue(5,curdate());
                $req->execute();  
                $success="<div class='alert alert-success'>Votre commande a été prise en compte</dib>";

        }

    // Bois
        if(isset($_POST['submit_bois'])){
            $id;
            $nom =$_POST['bois'];
            $quantite =$_POST['quantite'];
            $prix =$_POST['prix'];
            
             $query="INSERT INTO commande(nom_produits,id_clients,quantite,prix) VALUES (?,?,?,?)";
            
                $req = $pdo->prepare($query);
                
                
                $req->bindValue(1,$nom);
                $req->bindValue(2,$id);
                $req->bindValue(3,$quantite);
                $req->bindValue(4,$prix);
                // $req->bindValue(5,curdate());
                $req->execute();  
                $success="<div class='alert alert-success'>Votre commande a été prise en compte</dib>";

        }

    // Fer
        if(isset($_POST['submit_fer'])){
            $id;
            $nom =$_POST['fer'];
            $quantite =$_POST['quantite'];
            $prix =$_POST['prix'];
            
             $query="INSERT INTO commande(nom_produits,id_clients,quantite,prix) VALUES (?,?,?,?)";
            
                $req = $pdo->prepare($query);
                
                $req->bindValue(1,$nom);
                $req->bindValue(2,$id);
                $req->bindValue(3,$quantite);
                $req->bindValue(4,$prix);
                // $req->bindValue(5,curdate());
                $req->execute();  
                $success="<div class='alert alert-success'>Votre commande a été prise en compte</dib>";

        }

    
?>


<?php if(isset($_SESSION['id_clients'])){ ?>
<!DOCTYPE html>
    <html lang="fr">
    <?php require('partials/head2.php') ;?>
    <body>
        <!-- header -->
        <header class="bg-image">
            <div class="bw-gradient"></div>
            <div class="header">
                <div class="sub-header">
                        <ul class="left-menu">
                            <li><a href="service.php">SERVICES</a></li>
                         
                        </ul>
                        <div class="logo">
                                <a href="home.php">AllForBuild</a>
                            </div>
                        <ul class="right-menu">
                            <li><a href="home.php">ACCUEIL</a></li>
                            <li><a href="profil.php"><?=$prenom ?></a></li>
                            <li><a href="logout.php">DECONNEXION</a></li>
                        </ul>
                </div>
                
            </div>
        </header>
    
    <section id="formulaire">
        <div class="container" style="margin-top:5%;margin-bottom:5%;">
                 <div class="col-lg-12">
                 
            

                 <?php if(!empty($success)) :?>
                          <?= $success; ?>
                          <?='<meta http-equiv="refresh" content="2;action.php">'; ?>
                 <?php endif;?>
                
                    
                   <center><h1>MATERIAUX  DE CONSTRUCTION</h1></center>
                   
                    <hr>

                <div class="row">
                     <div class="col-md-6">
                        <div class="thumbnail">
                            <img src="public/images/gravier.png" alt="" height="250" width="520" class="thumnail">
                            <form action="" method="post">
                            <input type="hidden" name="gravier" value="gravier">
                            <input type="hidden" name="prix" value="9000">

                                <select name="quantite" id="" class="form-control">
                                    <option value="">Veuillez choisir une quantité</option>
                                    <option value="1">1 (Tonne)</option>
                                    <option value="2">2 (Tonnes)</option>
                                    <option value="3">3 (Tonnes)</option>
                                </select>
                                 <center><button  type='submit' name="submit_gravier" class="btn btn-primary btn-sm" name="commander">
                                        COMMANDER <span class="badge badge-primary "></span>
                                </button></center>
                                </form>
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="thumbnail">
                            
                            <img src="public/images/ciment.png" alt="" height="250" width="520" class="thumnail">
                            <form action="" method="post">
                            <input type="hidden" name="ciment" value='ciment'>
                            <input type="hidden" name="prix" value="1000">
                                <select name="quantite" id="" class="form-control">
                                    <option value="0">Veuillez choisir une quantité</option>
                                    <option value="1">1 (Tonne)</option>
                                    <option value="2">2 (Tonnes)</option>
                                    <option value="3">3 (Tonnes)</option>
                                </select>
                                <center><button type="submit" class="btn btn-primary btn-sm" name="submit_ciment">
                                        COMMANDER <span class="badge badge-primary "></span>
                                </button></center>
                            </div>
                         </div>
                         </form>
                    </div>

      
                    <hr>
                    <div class="row">
                         
                    <div class="col-md-6">
                            <div class="thumbnail">
                                <img src="public/images/bois.jpg" alt="" height="250" width="520" class="thumnail">
                                <form action="" method="post">
                                <input type="hidden" name="bois" value="bois">
                                <input type="hidden" name="prix" value="8000">

                                <select name="quantite" id="" class="form-control">
                                    <option value="1">Veuillez choisir une quantité</option>
                                    <option value="2">1 (Tonne)</option>
                                    <option value="3">2 (Tonnes)</option>
                                    <option value="4">3 (Tonnes)</option>
                                </select>
                                 <center><button type="submit" class="btn btn-primary btn-sm" name="submit_bois">
                                        COMMANDER <span class="badge badge-primary "></span>
                                </button></center>
                                </form>
                            </div>
                         </div>

                         
                         <div class="col-md-6">
                            <div class="thumbnail">
                            <form action="" method="post">
                                <input type="hidden" name="fer" value="fer">
                                <input type="hidden" name="prix" value="4000">
                                <img src="public/images/fer.jpg" alt="" height="250" width="520" class="thumnail">
                                <select name="quantite" id="" class="form-control">
                                    <option value="1">Veuillez choisir une quantité</option>
                                    <option value="2">1 (Tonne)</option>
                                    <option value="3">2 (Tonnes)</option>
                                    <option value="3">3 (Tonnes)</option>
                                </select>
                                 <center><button type="submit" class="btn btn-primary btn-sm" name="submit_fer">
                                        COMMANDER <span class="badge badge-primary "></span>
                                </button></center>
                                </form>
                            </div>
                         </div>

                    </div> 

             </div>
             </div>
    </div>
        </div>
    </section>
    
    <!-- footer-->
        <?php require('partials/footer.php');?>
    <!-- end footer-->
    </body>
    </html>
<?php }else{ ?>
   <?php header('Location:login.php'); ?>
<?php } ?>


