<?php
      require('partials/config.php');
     if(isset($_POST['submit'])){
		
      $nom=$_POST['nom'];
      $email=$_POST['email'];
      $sujet=$_POST['sujet'];
      $message=$_POST['message'];
    
    
      $errors=[];
    
         if(empty($nom) or empty($email) or empty($sujet) or empty($message) ){
          $errors['tout vide'] = "Veuillez renseigner tous les champs !";
        }
    
     
        if(empty($errors)){
          $req = $pdo->prepare('INSERT INTO message(nom,email,sujet,message) values(?,?,?,?)');
          $data = [$nom,$email,$sujet,$message];
          $req->execute($data);
          $success = "Message envoyé avec succès";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="fr">
<?php include('partials/head.php') ;?>
<body>
    <!-- header -->
    <header class="bg-image">
        <div class="bw-gradient"></div>
        <div class="header">
            <div class="sub-header">
                    <ul class="left-menu">
                            <li><a href="service.php">RECHERCHER PERSONNEL</a></li>
                            <li><a href="action.php">COMMANDER MATERIAUX</a></li>
                        </ul>
                        <div class="logo">
                            <a href="#">AllForBuild</a>
                        </div>
                        <ul class="right-menu">
                            <li><a href="register.php">S'INSCRIRE</a></li>
                            <li><a href="login.php">SE CONNECTE</a></li>
                        </ul>
            </div>

        </div>
    </header>
    <!-- end header -->

<div class="container-fluid">
    <h1 style="margin-top:30px; text-align: center;">A PROPPOS DE NOUS</h1>
    <p style="margin-top:30px;" align="center">
    <b><i>AllforBuild est une entreprise </i></b>qui a pour objectif de facilié les activités de construction.En effet, nous permettons a l'utilisateur d'obtenir des une main d'oeuvre qualifié.<br>Aussi l'utilisateur peut commander des materiaux de constructions. 
    </p>

    <!-- galerie -->
    <section id="vente" style="margin-top:50px;">

            <div class="container ">
                <div class="col-lg-12">

                   <center><h1>UN PERSONNEL QUALIFIE </h1></center>

                    <hr>

                <div class="row">
                     <div class="col-md-4">
                            <img src="public/images/imagecons.jpg" alt="" height="300" width="350">
                         </div>

                         <div class="col-md-4">
                            <img src="public/images/imagecons2.jpg" alt="" height="300" width="350">
                         </div>

                         <div class="col-md-4">
                            <img src="public/images/imagecons3.jpg" alt="" height="300" width="350">
                         </div>
                    </div>



                  <center><h1>DES PRODUITS DE CHOIX</h1></center>
                    <hr>
                    <div class="row">
                         <div class="col-md-4">
                            <img src="public/images/cons6.jpg" alt="" height="300" width="350">
                         </div>

                         <div class="col-md-4">
                            <img src="public/images/cons7.jpg" alt="" height="300" width="350">
                         </div>

                         <div class="col-md-4">
                            <img src="public/images/cons5.jpg" alt="" height="300" width="350">
                         </div>
                    </div>
                    </div>

             </div>
             </div>
    </div>
    </section>
    <!-- end galerie -->

<!-- contact form -->
    <div class="container" style="margin-top: 5%;margin-bottom: 5%;">
        <div class="row">
          <div class="col-sm-4"> </div>
           <div class="col-md-4">

              <h1 class="text-center text-success">Nous écrire</h1>
              <br/>
              <div class="col-sm-12">
                   <form action="" method="post">

                <div class="form-group">
                  <label for="UserName">Nom:</label>
                  <input type="text" class="form-control" id="email" name="nom">
                </div>

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="prenom" name="email">
                </div>

                <div class="form-group">
                  <label for="contact">Sujet:</label>
                  <input type="contact" class="form-control" id="contact" name="sujet">
                </div>

                <div class="form-group">
                  <label for="contact">Votre message:</label>
                  <textarea name="message" id="" cols="30" rows="7" class="form-control"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-info">Envoyer</button>
      </form>
        </div>
       </div>
      </div>
    </div>
    </div>
<!-- end form -->

    <!-- footer -->
    <?php require('partials/footer.php'); ?>
    <!-- end footer -->
</body>
</html>
