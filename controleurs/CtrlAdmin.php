<?php

class CtrlAdmin
{
    public function __construct()
    {
        global $rep, $vues;
        $tVueErreur = array();


        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case "null":
                    $this->seConnecter();
                    break;
                case "accesAdmin":
                    $this->accesAdmin();
                    break;
                case "ajouterSite":
                    $this->ajouterSite();
                    break;
                case "supprimerSite":
                    $this->supprimerSite();
                    break;
            }
        } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $tVueErreur[] = "Erreur sur la Base de donnée !";
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $tVueErreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }
    }


    function seConnecter()
    {
        global $rep, $vues;
        require($rep . $vues['login']);
    }

    function accesAdmin()
    {
        global $rep, $vues, $login, $password, $base;
        $GW = new SiteGateWay(new Connection($base, $login, ''));
        if($GW->getNbSites()<=0){
            $tabSite= [];
            require($rep . $vues['admin']);
        }
        else {
            $tabSite = $GW->findAllSites();
            require($rep . $vues['admin']);
        }
    }

    function ajouterSite(){
        global $rep, $vues, $login, $password, $base;
        $nom = $_REQUEST['nom'];
        $logo = $_REQUEST['logo'];
        $lien = $_REQUEST['lien'];
        $flux = $_REQUEST['flux'];

        //VALIDATION A FAIRE

        $GW = new SiteGateWay(new Connection($base, $login, ''));
        $GW->insert($nom,$lien,$logo,$flux);
        $this->accesAdmin();
    }


    function supprimerSite(){
        global $rep, $vues, $login, $password, $base;

        //VALIDATION A FAIRE

        $selectedlien = $_POST['choixSuppr'];


        $GW = new SiteGateWay(new Connection($base, $login, ''));
        $GW->delete($selectedlien);
        $this->accesAdmin();
    }

}
