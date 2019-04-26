 <?php
	require('../partials/config.php');
		$id=0; 
		$update = false;
		$nom ='';
		$prenom ='';
		$profession ='';
		$ville ='';
		$contact ='';
 	//CREATE
	if(isset($_POST['submit'])){
		$nom =$_POST['nom'];
		$prenom =$_POST['prenom'];
		$profession =$_POST['profession'];
		$ville =$_POST['ville'];
		$contact =$_POST['contact'];
		$req = $pdo->prepare("INSERT INTO personnel (nom,prenom,profession,ville,contact) VALUES (?,?,?,?,?)");
		$data=[$nom,$prenom,$profession,$ville,$contact];
		$req->execute($data);
		$message = '<div class="alert alert-success">Enregistrement effectué avec succès
		</div>';
		}

    //READ
	$req = $pdo->query("SELECT * FROM personnel ORDER BY id_personnel DESC");
	
	//DELETE
    if(isset($_GET['delete'])){
		$update=true;
        $id=$_GET['delete'];
		$pdo->query("DELETE FROM personnel WHERE id_personnel = $id");
		$suppression = '<div class="alert alert-danger">Suppression effectué avec succès
		</div>';
	}
	//EDIT
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];
		$result = $pdo->query("SELECT * FROM personnel WHERE id_personnel = $id");

		if(count($result)==1){
			$row = $result->fetch();
			$id =$row['id_personnel'];
			$nom =$row['nom'];
			$prenom =$row['prenom'];
			$profession =$row['profession'];
			$ville =$row['ville'];
			$contact =$row['contact'];
		}
	}	
	//UPDATE
	if(isset($_GET['update'])){
		$id=$_POST['id_personnel'];
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$profession=$_POST['profession'];
		$ville=$_POST['ville'];
		$contact=$_POST['contact'];
		$result = $pdo->query("UPDATE personnel SET nom ='$nom', prenom='$prenom',profession='$profession', ville='$ville',contact='$contact' WHERE id='$id' ");


	}	
 ?>


<?php if(isset($_SESSION['id_admin'])){ ?>
<!DOCTYPE html>
<?php require('../partials/head4.php');?>
<html>
<body>
<!-- header -->
<header class="bg-image">
    <div class="bw-gradient"></div>
        <div class="header">
            <div class="sub-header">
                    <ul class="left-menu">
					<li><a href="adminCustomer.php">Admin(Clients)</a></li>
					<li><a href="logoutAdmin.php">Deconnexion</a></li>
                    </ul>
                    <div class="logo">
                            <a href="../home.php">SysTem Admin(Personnel)</a>
                        </div>
                    <ul class="right-menu">
					<li><a href="adminCommande.php">Admin(Commande)</a></li>
					<li><a href="../home.php">Accueil</a></li>
                    </ul>
            </div> 
    </div>
</header>
<!-- End header -->


<!-- TABLEAU -->

<div  align="center" class="container-fluid" style="margin-top :5%;margin-bottom :5%;">

<?php  if(!empty($message)) : ?>
		<div class="alert alert-success">
			<?= $message; ?>
			<?= "<meta http-equiv='refresh' content='2;'>"; ?>
		</div>
<?php endif; ?>

<?php  if(!empty($suppression)) : ?>
			<?= $suppression; ?>
			<?= "<meta http-equiv='refresh' content='2;adminControl.php'>"; ?>
<?php endif; ?>

 	<table class="table" style="margin-top :5%;margin-bottom :5%;"> 
		<thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Profession</th>
				<th>Ville</th>
				<th>Contact</th>
				<th>Action</th>
			</tr>
		</thead>
	<tbody>
		<?php while($row = $req->fetch()): ?>
		<tr>
			<td><?=$row['id_personnel'] ?></td>
			<td><?=$row['nom'] ?></td>
			<td><?=$row['prenom'] ?></td>
			<td><?=$row['profession'] ?></td>
			<td><?=$row['ville'] ?></td>
			<td><?=$row['contact'] ?></td>			
            <td>
				<a href="adminControl.php?edit=<?= $row['id_personnel']; ?>" class='btn btn-info'>Modifier</a> 
				<a href="adminControl.php?delete=<?= $row['id_personnel']; ?>" class='btn btn-danger'>Suprimer</a>
			</td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>		
	
	<div class="container">
		<div class="col-md-6">
			<form action="" method="post">
				<input type="hidden" name='id_personnel' value="<?= $id;?>">
				<div class="from-group">
				<input type="text" name="nom" class="form-control" id="name" placeholder="Nom" value="<?= $nom;?>">
				</div>
				
				<div class="from-group">
					<input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom" value="<?= $prenom;?>">
				</div>
				
				<div class="from-group">
					<input type="text" name="profession" class="form-control" id="profession" placeholder="Profession" value="<?= $profession;?>">
				</div>
				
				<div class="from-group">
					<input type="text" name="ville" class="form-control" id="ville" placeholder="Ville" value="<?= $ville;?>">
				</div>
				
				<div class="from-group">
					<input type="text" name="contact" class="form-control" id="contact" placeholder="Contact" value="<?= $contact;?>">
				</div>
				
				<?php if($update == true) : ?>
					<button class="btn btn-primary" type='submit' name="submit">Mettre a jour</button>
				<?php else : ?>
					<button class="btn btn-primary" type='submit' name="submit">Enregistrer</button>
				<?php endif;?>

				<?php if(!empty($success)) : ?>
					<?= $success ?>
				<?php endif; ?>				
			</form>
		</div>
	</div>
</div>

<?php require('../partials/footer.php');?>

</body>
</html>
<?php }else{ ?>
 	<?php header('location:admin.php');?>
<?php }?>	