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
                case "seConnecter":
                    $this->seConnecter();
                    break;
                case "accesAdmin":
                    $this->accesAdmin();
                    break;
                case "ajouterSite":
                    $this->ajouterSite($tVueErreur);
                    break;
                case "supprimerSite":
                    $this->supprimerSite($tVueErreur);
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

    function ajouterSite(array &$tVueErreur){
        global $rep, $vues, $login, $password, $base;
        $nom = $_REQUEST['nom'];
        $logo = $_REQUEST['logo'];
        $lien = $_REQUEST['lien'];
        $flux = $_REQUEST['flux'];

        //VALIDATION A FAIRE
        if(Validation::validSite($nom,$logo,$lien,$flux,$tVueErreur)){
            $GW = new SiteGateWay(new Connection($base, $login, ''));
            $GW->insert($nom,$lien,$logo,$flux);
            $this->accesAdmin();
        }
        else {
            $tVueErreur[] = "Erreur lors de la validation de l'ajout du site";
            require($rep . $vues['erreur']);
        }
    }


    function supprimerSite(array &$tVueErreur){
        global $rep, $vues, $login, $password, $base;

        //VALIDATION A FAIRE

        $selectedlien = $_POST['choixSuppr'];

        if(Validation::validURL($selectedlien,$tVueErreur)){
            $GW = new SiteGateWay(new Connection($base, $login, ''));
            $GW->delete($selectedlien);
            $this->accesAdmin();
        }
        else{
            $tVueErreur[] = "Erreur lors de la validation de la suppression du site";
            require($rep . $vues['erreur']);
        }

    }

}
