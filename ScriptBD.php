<?php
require_once ("Connection.php");
require_once ("NewsGateway.php");
require_once ("news.php");

$dsn='mysql:host=localhost;dbname=dbguassailly';
$user='root';
$password='';

try {
    $con = new Connection($dsn, $user, $password);


    $GW = new NewsGateway($con);

    //$GW->insert("TITRE2", "DESC2", "LIEN2", "18/11/21");
    $GW->updateLien('LIEN4','LIEN2');
    $GW->FindAllNews();
}
catch(PDOException $e)
{
    echo $e->getMessage();
}