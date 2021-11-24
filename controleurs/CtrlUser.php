<?php
class CtrlUser{
    public function __construct()
    {
        global $rep,$vues;
        session_start();

        $tVueErreur = array();

        try{
            $action=$_REQUEST['action'];
            switch($action){
                case NULL:
                    $this->init();
                    break;
                case "cliquerNews":
                    $this->afficherNews();
                    break;
            }
        }
        catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        
        }
        catch (Exception $e2)
            {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
            }
        
    }

    function init(){
        global $rep,$vues;
        require($rep.$vues['vue1']);
    }

    function afficherNews(){
        global $rep,$vues;
        $url=$_REQUEST['url'];
        //Valider URL dans classe Validation
        header('Location: '.$url);
    }
}
?>