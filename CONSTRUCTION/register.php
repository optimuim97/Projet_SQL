<?php require('partials/config.php');?>

<?php

 if(isset($_POST['submit_reg'])){
      
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $profession=$_POST['profession'];
    $date=$_POST['date_naiss'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordc=$_POST['passwordc'];



  $errors=[];

    if(empty($nom) or empty($prenom) or empty($prenom) or empty($date) or empty($profession) or empty($contact) or empty($email) or empty($password) or empty($passwordc)){
      $errors['tout vide'] = "Veuillez renseigner tous les champs !";
    }

		if(empty($nom) || !preg_match('/^[a-zA-Z0-9_]+$/', $nom)){
			$errors['nom']="Ce nom n'est pas valide(alphanumerique)";
		}
    
		if(empty($prenom) || !preg_match('/^[a-zA-Z0-9_]+$/', $prenom)){
			$errors['nom']="Ce nom n'est pas valide(alphanumerique)";
		}
    
		if(empty($profession) || !preg_match('/^[a-zA-Z0-9_]+$/', $profession)){
			$errors['profession']="Cet entré(profession) n'est pas valide(alphanumerique)";
		}
    
		if(empty($date)){
			$errors['date']="le Champ date a été mal rempli";
    } 
    
		if(empty($contact) or !preg_match('/^[0-9_]+$/', $contact)){
			$errors['contact']="le Champ contact a été mal rempli";
		}
    
	
		if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
			$errors['email']="Ce email n'est pas valide(alphanumerique,@ inclus)";
    }else{
      $req = $pdo->prepare('SELECT * FROM clients WHERE email = ?');
      $req->execute([$email]);
      $users = $req->fetch();
       if($users){
         $errors['Duplication']="Ce compte existe deja ";
       }
    }
    
		if($password != $passwordc ){
			$errors['mdp']="Les mots de passe ne correspondent pas)";
    }
     
    if(empty($errors)){
      $req = $pdo->prepare('INSERT INTO clients(nom,prenom,profession,date_naissance,contact,email,password) values(?,?,?,?,?,?,?)');
      $password = md5($password);
      $data = [$nom,$prenom,$profession,$date,$contact,$email,$password];
      $req->execute($data);
      $success = "Votre Compte a été enregistré avec succès";
    }
    
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php require('partials/head2.php'); ?>
</head>
<body>
    <!-- header -->
    <header class="bg-image">
        <div class="bw-gradient"></div>
        <div class="header">
            <div class="sub-header">
                  <ul class="left-menu">
                      <li><a href="#">SERVICES</a></li>
                      <li><a href="#">COMMANDER MATERIEL</a></li>
                  </ul>
                        <div class="logo">
                            <a href="home.php">AllForBuild</a>
                        </div>
                    <ul class="right-menu">
                        <li><a href="login.php">SE CONNECTE</a></li>
                    </ul>
            </div>

        </div>
    </header>

<section id="formulaire">
  
<div class="container" style="margin-top: 3%;margin-bottom: 3%;">
 
 <!-- AFFICHEZ LES ERREURS -->
 <?php if(!empty($errors)) : ?>
          <div class="alert alert-danger">
          <h4>VOUS AVEZ PAS REMPLIR CORRECTEMENT LE FORMULAIRE</h4>
          <ul>
            <?php foreach ($errors as $error):?>
              <li><?= $error; ?></li>
              <?= '<meta http-equiv="refresh" content="4;register.php">';?>
            <?php  endforeach;?>
          </ul>      
			    </div>
<?php endif; ?>
<!-- FIN ERREUR -->

  <div class="row">
    <div class="col-sm-4"> </div>
     <div class="col-md-6">

              <h1 class="text-center text-success">S'Inscrire</h1>
              <?php if(!empty($success)) :?>
            <div class="alert alert-success">
                <?= $success;?>
                <?= '<meta http-equiv="refresh" content="4;register.php">';?>
            </div>
          <?php endif;?>
              <br/>

     <div class="col-sm-12">
       <form action="#" method="post" class="well">

        <div class="form-group">
          <label for="UserName">Nom:</label>
          <input type="text" class="form-control" id="email" name="nom">
        </div>

        <div class="form-group">
          <label for="prenom">Prenom:</label>
          <input type="text" class="form-control" id="prenom" name="prenom">
        </div>

        <div class="form-group">
          <label for="email">Profession:</label>
          <input type="Profession" class="form-control" id="Profession" name="profession">
        </div>

        <div class="form-group">
          <label for="date">Date de naissance:</label>
          <input type="date" class="form-control" id="date" name="date_naiss">
        </div>

        <div class="form-group">
          <label for="contact">Contact:</label>
          <input type="contact" class="form-control" id="contact" name="contact">
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control" id="contact" name="email">
        </div>

        <div class="form-group">
          <label for="pwd">Mot de passe:</label>
          <input type="password" class="form-control" id="pwd" name="password">
        </div>

        <div class="form-group">
          <label for="pwd">Confirmation:</label>
          <input type="password" class="form-control" id="pwd" name="passwordc">
        </div>

          <!-- SANS PROBLEME -->
      
        <button type="submit" class="btn btn-info  btn-lg"  name="submit_reg">S'inscrire</button>

      </form>
        </div>
       </div>
      </div>
    </div>
    </div>
</section>
<!-- footer -->
<?php require('partials/footer.php');?>
<!-- end footer -->

</body>
</html>
