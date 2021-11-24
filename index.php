<?php

require_once('NewsGateway.php');
$nbNewsParPage=10;
try{
    $gw=new NewsGateway(new Connection('mysql:host=localhost;dbname=dbguassailly','root',''));
    $nbNewsTotal=$gw->getNbNews();
} catch(PDOException $e)
{
    echo $e->getMessage();
}
$nbPages=ceil($nbNewsTotal/$nbNewsParPage);
$page=(isset($_GET['page'])) ? abs(intval($_GET['page'])) : 1;
$page=($page==0) ? 1 : $page;
/*
if($page>$nbPages || $page<0){
    $page=1;
}
*/
$news=$gw->findNews($page,$nbNewsParPage);
require_once('vues/vue1.php');
?>