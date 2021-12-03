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
                    $this->accesAdmin($tVueErreur);
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

    function accesAdmin(array &$tVueErreur)
    {
        global $rep, $vues;



        $username = $_REQUEST['username'];
        $pass = $_REQUEST['pass'];
        if(Validation::validLogin($username,$pass,$tVueErreur)) {;
          $this->chargerAdmin();
        }
        else {
            $tVueErreur[] = "Username ou mot de passe non autorisé";
            require($rep . $vues['erreur']);
        }
    }

    function chargerAdmin(){
        global $rep, $vues;
        $mdlA = new ModeleAdmin();
        if ($mdlA->getNombreSite() <= 0) {
            $tabSite = [];
            require($rep . $vues['admin']);
        } else {
            $tabSite = $mdlA->trouverSites();
            require($rep . $vues['admin']);
        }

    }

    function ajouterSite(array &$tVueErreur){
        global $rep, $vues;
        $mdlA = new ModeleAdmin();
        $nom = $_REQUEST['nom'];
        $logo = $_REQUEST['logo'];
        $lien = $_REQUEST['lien'];
        $flux = $_REQUEST['flux'];

        if(Validation::validSite($nom,$logo,$lien,$flux,$tVueErreur)){
            $mdlA->insererSite($nom,$lien,$logo,$flux);
            $this->chargerAdmin();
        }
        else {
            $tVueErreur[] = "Erreur lors de la validation de l'ajout du site";
            require($rep . $vues['erreur']);
        }
    }


    function supprimerSite(array &$tVueErreur){
        global $rep, $vues;
        $mdlA = new ModeleAdmin();

        $selectedlien = $_POST['choixSuppr'];

        if(Validation::validURL($selectedlien,$tVueErreur)){
            $mdlA->delSite($selectedlien);
            $this->chargerAdmin();
        }
        else{
            $tVueErreur[] = "Erreur lors de la validation de la suppression du site";
            require($rep . $vues['erreur']);
        }

    }

}
