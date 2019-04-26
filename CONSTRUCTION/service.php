<?php
session_start();
$Prenom = $_SESSION['prenom'];

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // Rechercher dans toute les colonnes
    // Utilisation de la fonction CONCAT
    $query = "SELECT * FROM `personnel` WHERE CONCAT(`id_personnel`, `nom`, `prenom`, `profession`,`ville`,`contact`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `personnel`";
    $search_result = filterTable($query);
}

// Fonction se connecter et executer la requete
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "construction");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<?php if(isset($_SESSION['id_clients'])) { ?>
<!DOCTYPE html>
<?php require('partials/head2.php');?>
    <body>
    <header class="bg-image">
            <div class="bw-gradient"></div>
            <div class="header">
                <div class="sub-header">
                        <ul class="left-menu">
                            <li><a href="action.php">COMMANDER MATERIEL</a></li>
                            <li><a href="home.php">ACCUEIL</a></li>
                        </ul>
                         <div class="logo">
                                <a href="home.php">AllForBuild</a>
                            </div>
                        <ul class="right-menu">
                            <li><a href="profil.php"><?= $Prenom?></a></li>
                            <li><a href="logout.php">DECONNEXION</a></li>
                        </ul>
                </div>
                
            </div>
        </header>
    
        <section id="formulaire">

<div class="container" style="margin-top: 5%;margin-bottom: 5%;">
  <div class="row">
    <div class="col-sm-4"> </div>
     <div class="col-md-4">
  
        <h1 class="text-center text-success">Rechercher</h1>
        <br/>
        <div class="col-sm-12">
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="valueToSearch" class="form-control" placeholder="Trouver un professionnel">
            </div> 
            <div class="form-group text-center">
                <input type="submit" name="search" value="Filter" class='btn btn-primary'><br><br>            
            </div> 
        </form>
            <br>         
  </div>
 </div>
</div>
</div>
</div>
<div class="container">
<table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Profession</th>
                    <th>Ville</th>
                    <th>Contact</th>
                </tr>
                </thead>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tbody>
                <tr>
                    <td><?php echo $row['id_personnel'];?></td>
                    <td><?php echo $row['nom'];?></td>
                    <td><?php echo $row['prenom'];?></td>
                    <td><?php echo $row['profession'];?></td>
                    <td><?php echo $row['ville'];?></td>
                    <td><?php echo $row['contact'];?></td>
                </tr>
                </tbody>
                <?php endwhile;?>
            </table>         
</div>

</section>
            
<?php require('partials/footer.php');?>        
</body>
</html>
<?php }else{ ?>
   <?php header('Location:login.php'); ?>
<?php } ?>
