<?php

class ModeleAdmin
{
    public function getNombreSite() : int {
        global $login,$mdp,$base;
        $gw=new SiteGateWay(new Connection($base,$login,$mdp));
        return $gw->getNbSites();
    }

    public function trouverSites() : array {
        global $login,$mdp,$base;
        $gw=new SiteGateWay(new Connection($base,$login,$mdp));
        return $gw->findAllSites();
    }

    public function insererSite($nom,$lien,$logo,$flux) {
        global $login,$mdp,$base;
        $gw=new SiteGateWay(new Connection($base,$login,$mdp));
        $gw->insert($nom,$lien,$logo,$flux);
    }

    public function delSite($lien) {
        global $login,$mdp,$base;
        $gw=new SiteGateWay(new Connection($base,$login,$mdp));
        $gw->delete($lien);
    }

}