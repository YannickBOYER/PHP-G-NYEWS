<?php

class ModeleAdmin
{

    public function isAdmin(array &$tVueErreur){
        $loginA=$_SESSION['loginA'];
        $role=$_SESSION['role'];
        if (!empty($loginA) && !empty($role)) {

            if (Validation::validString($loginA,$tVueErreur) && Validation::validString($role,$tVueErreur)) {

                return new Admin($loginA, $role);
            }
            else
                return null;
        }
        return null;
    }

    public function connectAdmin(string $loginA, string $pass, array &$tVueErreur):bool
    {
        global $base,$login,$mdp;
        if(Validation::validLogin($loginA,$pass,$tVueErreur)){
            $GW = new AdminGateWay(new Connection($base,$login,$mdp));
            if($GW->checkAdmin($loginA,$pass))
            {
                $_SESSION['role']='admin';
                $_SESSION['loginA']=$loginA;
                return true;
            }
            else return false;
        }
        else return false;
    }

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