<?php
try{
$pdo = new PDO ("pgsql:host=localhost;dbname=mydata","postgres","theminecs2");

} catch(PDOException $e){
    
}

?>