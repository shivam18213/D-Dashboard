<?php

$dbhost='localhost';
$dbname='chat';
$dbuser='root';
$dbpass='Shivam@18213';

/*try{ */
    $db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");

/*}catch(PDOException $e){
    echo $e->getMessage(); */
?>