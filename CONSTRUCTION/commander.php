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
            echo "bien fait";
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
        }

        header('location:action.php');