<?php

class FrontController
{

    public function __construct()
    {
        global $rep, $vues;
        $tVueErreur = array();


        try {
            $mdlA = new ModeleAdmin();
            $admin = $mdlA->isAdmin(); // A IMPLEMENTER
            $action = $_REQUEST['action'];
            switch ($action) {
                case "seConnecter":
                    $adminCtrl = new CtrlAdmin(); // PENSER A CHECKER SI ADMIN==NULL DANS LE CONSTRUCTEUR => renvoie à la page de login
                    $adminCtrl->seConnecter();
                case "accesAdmin":
                    $adminCtrl = new CtrlAdmin();
                    $adminCtrl->accesAdmin($tVueErreur);
                case "ajouterSite":
                    $adminCtrl = new CtrlAdmin();
                    $adminCtrl->ajouterSite($tVueErreur);
                case "supprimerSite":
                    $adminCtrl = new CtrlAdmin();
                    $adminCtrl->supprimerSite($tVueErreur);
                //Partie USER
                case "allerAArticle":
                    $userCtrl = new CtrlUser(); //
                    $userCtrl->supprimerSite($tVueErreur);
                case null:
                    if($admin==null) {
                        $userCtrl = new CtrlUser();
                        $userCtrl->init();
                    }
                    else {
                        $adminCtrl = new CtrlAdmin();
                        $adminCtrl->chargerAdmin();
                    }
            }
        }
        catch (PDOException $e) {
            $tVueErreur[] = "Erreur sur la Base de donnée !";
            require($rep . $vues['erreur']);
        }
        catch (Exception $e2) {
            $tVueErreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }
    }

}