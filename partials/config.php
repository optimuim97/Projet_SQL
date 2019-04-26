<?php 
	 $host='localhost';
	 $dbname='construction';
	 $user ='root';
	 $password ='';
	  
	 try
	 {$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);} 
	 catch(PDOExpection $e)
	 {echo $e->getMessage();}

	 session_start();