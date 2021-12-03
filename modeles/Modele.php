<?php

class Modele
{
    public function getNombreNews() :int{
        global $login,$mdp,$base;
        $gw=new NewsGateway(new Connection($base,$login,$mdp));
        return $gw->getNbNews();
    }
    public function trouverNews($page,$nbNewsParPage){
        global $login,$mdp,$base;
        $gw=new NewsGateway(new Connection($base,$login,$mdp));
        return $gw->findNews($page,$nbNewsParPage);
    }
    public function trouver3DernieresNews() {
        global $login,$mdp,$base;
        $gw=new NewsGateway(new Connection($base,$login,$mdp));
        return $gw->get3LastNews();
    }
}