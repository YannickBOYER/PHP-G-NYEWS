<?php
class CtrlUser{
    public function __construct()
    {
        global $rep,$vues;
        $tVueErreur = array();

        try{
            $action=$_REQUEST['action'];
            switch($action){
                case NULL:
                    $this->init();
                    break;
                case "accesLogin":
                    $this->accesLogin($tVueErreur);
                    break;
                case "seConnecter":
                    $this->seConnecter($tVueErreur);
                    break;
                case "cliquerNews":
                    $this->allerAArticle();
                    break;
                default:
                    $tVueErreur[] =	"Propos incohérents !";
                    require ($rep.$vues['erreur']);
                    break;
            }
        }
        catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $tVueErreur[] =	"Erreur sur la Base de donnée !";
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
            {
                $tVueErreur[] =	"Erreur inattendue!!! ";
                require ($rep.$vues['erreur']);
            }

    }

    function accesLogin(array &$tVueErreur)
    {
        global $rep, $vues;
        require($rep.$vues['login']);
    }

    function seConnecter(array &$tVueErreur)
    {

        global $rep, $vues;

        $username = $_REQUEST['username'];
        $pass = $_REQUEST['pass'];
        $mdlA = new ModeleAdmin();
        if(!$mdlA->connectAdmin($username,$pass,$tVueErreur)) {
            $tVueErreur[] = "Username ou mot de passe non autorisé";
            require($rep . $vues['erreur']);
        }
        else {
            header("Location: index.php?action=chargerAdmin");
        }
    }

    /**
     * @throws Exception
     */
    function init(){
        global $rep,$vues;
        $mdl = new Modele();
        $mdlA= new ModeleAdmin();
        //Gestion des pages de news
        $nbNewsParPage = $mdlA->getNbNewsParPage(); // A globaliser
        $nbNewsTotal = $mdl->getNombreNews();

        $sitesR=$mdl->trouverSites();

        if(!empty($sitesR)) {
            foreach ($sitesR as $siteR) {
                $tabNewsRSS = new SimpleXMLElement($siteR->getFluxRSS(), 0, true, "", false);
                foreach ($tabNewsRSS->channel->item as $item) {
                    if(!$mdl->existNews($item->link)) {
                        //$image=$item.find('media\\:content, content').attr('url');
                        $image = $item->children('media', True)->content->attributes()->url;
                        if (empty($image)) {
                            $image = '';
                        }
                        var_dump($image);
                        $mdl->ajouterEnBase($item->title, $item->pubDate, $item->description, $item->link, $image);
                    }
                }
            }
        }



        if($nbNewsTotal == 0) {
            $page = 1;
            $nbPages = 1;
            $tabNews=[];
            $tabLastNews=[];
        }
        else {
            $nbPages = ceil($nbNewsTotal / $nbNewsParPage);
            $page = (isset($_GET['page'])) ? abs(intval($_GET['page'])) : 1;

            $page = ($page == 0) ? 1 : $page;
            $page = ($page > $nbPages) ? $nbPages : $page;
            $tabNews = $mdl->trouverNews($page, $nbNewsParPage);
            $tabLastNews = $mdl->trouver3DernieresNews();
        }
        require($rep . $vues['vue1']);
    }


    function allerAArticle(){
        global $rep,$vues;
        $url=$_REQUEST['url'];
        header('Location: '.$url);
    }
}
?>