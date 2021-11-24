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

                    break;
                case "cliquerNews":

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
}
?>