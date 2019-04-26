<?php
    require('../partials/config.php');

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $pdo->query("DELETE FROM personnel WHERE id_personnel = $id");
    }
?>