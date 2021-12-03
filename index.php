<?php
/*
require_once('dal/NewsGateway.php');

try{
    $gw=new NewsGateway(new Connection('mysql:host=localhost;dbname=dbyaboyer','yaboyer','1234'));
    $nbNewsTotal=$gw->getNbNews();
} catch(PDOException $e)
{
    echo $e->getMessage();
}
$nbPages=ceil($nbNewsTotal/$nbNewsParPage);
$page=(isset($_GET['page'])) ? abs(intval($_GET['page'])) : 1;
$page=($page==0) ? 1 : $page;

if($page>$nbPages || $page<0){
    $page=1;
}

$news=$gw->findNews($page,$nbNewsParPage);

*/
//si controller pas objet
//  header('Location: controller/controller.php');

//si controller objet

//chargement config
require_once(__DIR__.'/config/config.php');

//chargement autoloader pour autochargement des classes
require_once(__DIR__.'/config/Autoload.php');
Autoload::charger();

//Provisoire
$contU = new CtrlUser();
$contA = new CtrlAdmin();

