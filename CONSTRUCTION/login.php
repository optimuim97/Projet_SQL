<?php
      require('partials/config.php');

      if(isset($_POST['submit_log'])){
    // recup

        $email=$_POST['email'];
        $password =$_POST['password'];
        
    // End recup
    $errors =array();
   
    //Validation 
      if(empty($email) or empty($password)){
          $errors['AllVide'] = "Veuillez renseigner tous les champs";
      }
      
      if(empty($errors)){
        $req = $pdo->prepare("SELECT * FROM clients WHERE email=? AND password=?");
        $password=md5($password);
        $data=array($email,$password);
        $req->execute($data);
        $connexion=$req->fetch();
         
        if($connexion){
          $_SESSION=$connexion;
          $success="<div class='alert alert-success'>
          C'est Propre
          </div>";
          //  header('location:action.php');
        }else{
          $errors["Pas CO"]= "Email ou mot de passe invalide";
        }
      
      }
  }
?>

<!DOCTYPE html>
<html lang="fr">
<?php require('partials/head2.php') ;?>
<body>
    <!-- header -->
    <header class="bg-image">
        <div class="bw-gradient"></div>
        <div class="header">
            <div class="sub-header">
                
                    <div class="logo">
                            <a href="home.php">AllForBuild</a>
                        </div>
                    <ul class="right-menu">
                        <li><a href="home.php">Accueil</a></li>
                    </ul>
            </div>
        </div>
    </header>

<section id="formulaire">

      <div class="container" style="margin-top: 5%;margin-bottom: 5%;">
        <div class="row">
          <div class="col-sm-4"> </div>
           <div class="col-md-4">
        
              <h1 class="text-center text-success">Connexion</h1>
              <br/>
              
         <?php if(!empty($errors)) : ?>
          <div class="alert alert-danger">
          <h4>VOUS AVEZ PAS REMPLIR CORRECTEMENT LE FORMULAIRE</h4>
          <ul>
            <?php foreach ($errors as $error):?>
              <li><?= $error; ?></li>
              <?= '<meta http-equiv="refresh" content="2;login.php">';?>
            <?php  endforeach;?>

          </ul>      
			    </div>
		      <?php endif; ?>
              <div class="col-sm-12">
                   <form action="" method="post">

                      <div class="form-group">
                        <label for="UserName">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                      </div>
                  
                      <div class="form-group">
                        <label for="email">Password:</label>
                        <input type="password" class="form-control" id="prenom" name="password">
                      </div>

                      <?php if(!empty($success)) :?>
                          <?= $success; ?>
                          <?='<meta http-equiv="refresh" content="2;service.php">'; ?>
                      <?php endif;?>
                  <meta >
                    <button type="submit" class="btn btn-info  btn-lg" name="submit_log">Submit</button>
                  </form>
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