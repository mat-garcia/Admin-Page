<?php
try{
$pdo = new PDO ("pgsql:host=ec2-54-160-7-200.compute-1.amazonaws.com;dbname=dl2l9b69759n2","ebmvowswhkvuqi","8920718ceeb416497dcb004debd646f871be38ce45effb4aa2ec78a2cd0a951b");

} catch(PDOException $e){
    echo ("is Done!")
}

?>
