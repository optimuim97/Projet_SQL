
<?php
      require('partials/config.php');
      $nom =$_SESSION['nom'];
      $prenom =$_SESSION['prenom'];
      $email =$_SESSION['email'];
      $profession =$_SESSION['profession'];
    //   $commandes =$_SESSION['commandes'];
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
                <li><a href="action.php">Retour</a></li>
                </ul>
                <div class="logo">
                        <a href="home.php">AllForBuild</a>
                </div>
                <ul class="right-menu">
                </ul>
            </div>
        </div>
    </header>

<section id="formulaire">
<div align='center' style="border: 4px solid black; margin-top : 7%;margin-bottom :15% ;">
    <table>
        <div style="background-color : green;">
        <tr><td>NOM :<?=$nom ;?></td> </tr>
        <tr><td> PRENOM :<?=$prenom ;?></td></tr>
        <tr><td>PROFESSION:<?=$profession;?></td></tr>
        <tr><td>EMAIL : <?=$email ;?></td></tr>
        </div>
    </table>

</div>
</section>

<!-- footer-->
    <?php require('partials/footer.php');?>
<!-- end footer-->
</body>
</html>
<?php }else{?>
    <?php header('Location:login.php');?>
<?php } ?>