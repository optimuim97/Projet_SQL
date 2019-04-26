<?php  
    require('../partials/config.php');
    //Selectionner
    $req = $pdo->query("SELECT * FROM commande");
    $var =$req->fetch();

    //DELETE
    if(isset($_GET['delete'])){
		$update=true;
        $id=$_GET['delete'];
		$pdo->query("DELETE FROM commande WHERE id_commande = $id");
		$suppression = '<div class="alert alert-danger">Suppression effectué avec succès
		</div>';
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
                    <li><a href="adminPersonnel.php">Admin(Pes)</a></li>
                    </ul>
            </div> 
    </div>
</header>
<!-- End header -->

<table class="table" style="margin-top :5%;margin-bottom :5%;"> 
		<thead>
			<tr>
				<th>#</th>
				<th>Produits</th>
				<th>N_Clients </th>
				<th>Quantite(en Tonne)</th>
				<th>Prix</th>
				<th>Date De La Commande</th>
				<th>Action</th>
			</tr>
		</thead>
    
	<tbody>
		<?php while($row = $req->fetch()): ?>
		<tr>
			<td><?=$row['id_commande'] ?></td>
			<td><?=$row['nom_produits'] ?></td>
			<td><?=$row['id_clients'] ?></td>
			<td><?=$row['quantite'] ?></td>
			<td><?=$row['prix'] ?></td>			
			<td><?=$row['date_commande'] ?></td>			
            <td>
				<a href="adminCommande.php?delete=<?= $row['id_commande']; ?>" class='btn btn-danger'>Suprimer</a>
			</td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
<?php require('../partials/footer.php');?>

</body>
</html>
<?php }else{ ?>
 	<?php header('location:admin.php');?>
<?php }?>	