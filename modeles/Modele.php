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
    public function trouverSites(){
        global $login,$mdp,$base;
        $gw=new SiteGateWay(new Connection($base,$login,$mdp));
        return $gw->findAllSites();
    }
    public function ajouterEnBase($title,$pubDate,$description,$link,$image){
        global $login,$mdp,$base;
        $gw=new NewsGateway(new Connection($base,$login,$mdp));
        $gw->insert($title,$description,$link,$pubDate,$image);
    }
    public function existNews($lien) : bool
    {
        global $login,$mdp,$base;
        $gw=new NewsGateway(new Connection($base,$login,$mdp));
        if($gw->getNbNewsWithLink($lien)==0) {
            return false;
        }

        return true;
    }
}