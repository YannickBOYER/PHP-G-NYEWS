<?php

class CtrlAdmin
{
    public function __construct()
    {
        global $rep, $vues;
        $tVueErreur = array();
        //$this->chargerAdmin();

        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case "ajouterSite":
                    $this->ajouterSite($tVueErreur);
                    break;
                case "supprimerSite":
                    $this->supprimerSite($tVueErreur);
                    break;
                case "seDeconnecter":
                    $this->deconnexion($tVueErreur);
                    break;
                case "chargerAdmin" || null:
                    $this->chargerAdmin();
                    break;

            }
        } catch (PDOException $e) {
            $tVueErreur[] = "Erreur sur la Base de donnée !";
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $tVueErreur[] = "Erreur inattendue!!! ";
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

    function deconnexion(array &$tVueErreur){
        global $rep, $vues;
        session_unset();
        header("Location: index.php");
    }



}
