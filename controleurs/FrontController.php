<?php

/*
 * Le FrontController s'occupe à sa construction de créer soit un controleur User, soit
 * un controleur Admin en fonction de s'il y a une connexion ou non et de si l'action demandée
 * nécessite d'être un Admin ou pas
 */
class FrontController
{

    public function checkAction($actionsPossibles,$action)
    {
        foreach($actionsPossibles['Admin'] as $value)
        {
            if($value==$action)
                return 'Admin';
        }
        foreach($actionsPossibles['User'] as $value)
        {
            if($value==$action)
                return 'User';
        }
        return false;
    }


    public function __construct()
    {
        global $rep, $vues;
        $tVueErreur = array();

        $actionsPossibles = array('Admin'=>array('ajouterSite','supprimerSite','seDeconnecter','chargerAdmin','changerNbNewsParPage'),'User'=>array('allerAArticle','seConnecter','accesLogin'));

        try {

            $action = $_REQUEST['action'];
            $actor = $this->checkAction($actionsPossibles,$action);

                if ($actor != false) {
                    $mdlA = new ModeleAdmin();
                    $admin = $mdlA->isAdmin($tVueErreur);
                    if ($admin == NULL) {
                        if($actor=='Admin')
                            require($rep.$vues['login']);
                        else
                            new CtrlUser();
                    } else {
                        new CtrlAdmin();
                    }
                } else {
                    new CtrlUser();
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