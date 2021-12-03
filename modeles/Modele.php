<?php

class Modele
{
    public function getNombreNews() :int{
        global $dsn,$login,$mdp,$base;
        $gw=new NewsGateway(new Connection($base,$login,$mdp));
        return $gw->getNbNews();
    }
    public function trouverNews($page,$nbNewsParPage){
        global $dsn,$login,$mdp,$base;
        $gw=new NewsGateway(new Connection($base,$login,$mdp));
        return $gw->findNews($page,$nbNewsParPage);
    }
    public function trouver3DernieresNews(){
        global $dsn,$login,$mdp,$base;
        $gw=new NewsGateway(new Connection($base,$login,$mdp));
        return $gw->get3LastNews();
    }
}