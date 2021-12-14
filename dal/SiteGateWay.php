<?php


class SiteGateWay
{
    private $con;

    /**
     * @param $con
     */
    public function __construct($con)
    {
        $this->con = $con;
    }


    /**
     * Cette fonction permet d'insérer un nouveau site dans la base de données
     */
    public function insert(string $nom, string $lien, string $logo, string $flux){
        $query='INSERT INTO sites VALUES(:nom,:logo,:lien,:flux)';
        $this->con->executeQuery($query, array(
            ':nom' => array($nom,PDO::PARAM_STR),
            ':lien' => array($lien,PDO::PARAM_STR),
            ':logo' => array($logo,PDO::PARAM_STR),
            ':flux' => array($flux,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de mettre à jour le nom d'un site dans la base de données
     */
    public function updateNom(string $flux,string $newNom){
        $query='UPDATE sites SET nom=:newNom WHERE flux=:flux';
        $this->con->executeQuery($query,array(
            ':flux'=> array($flux,PDO::PARAM_STR),
            ':newTitre' => array($newNom,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de mettre à jour le logo d'un site dans la base de données
     */
    public function updateLogo(string $flux,string $newLogo){
        $query='UPDATE sites SET logo=:newLogo WHERE flux=:flux';
        $this->con->executeQuery($query,array(
            ':flux'=> array($flux,PDO::PARAM_STR),
            ':newDescription' => array($newLogo,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de mettre à jour le flux RSS d'un site dans la base de données
     */
    public function updateFlux(string $flux,string $newFlux){
        $query='UPDATE sites SET flux=:newFlux WHERE flux=:flux';
        $this->con->executeQuery($query,array(
            ':flux'=> array($flux,PDO::PARAM_STR),
            ':newFlux' => array($newFlux,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de mettre à jour le lien d'un site dans la base de données
     */
    public function updateLien(string $flux,string $newLien){
        $query='UPDATE sites SET lien=:newLien WHERE flux=:flux';
        $this->con->executeQuery($query,array(
            ':flux'=> array($flux,PDO::PARAM_STR),
            ':newLien' => array($newLien,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de trouver tous les sites dans la base de données et de les retourner sous forme de tableau (array)
     */
    public function findAllSites() {
        $query='SELECT * FROM sites';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach ($results as $row)
            $tabSite[]=new Site($row['nom'],$row['lien'],$row['logo'],$row['flux']);
        return $tabSite;
    }
    /**
     * Cette fonction permet de supprimer un site dans la base de données à l'aide du lien
     */
    public function delete(string $flux){
        $query='DELETE FROM sites WHERE flux=:flux';
        $this->con->executeQuery($query, array(
            ':flux'=> array($flux,PDO::PARAM_STR)
        ));
    }

    /**
     * Cette fonction permet de trouver le nombre de site dans la base de données et de retourner ce nombre
     */
    public function getNbSites(): int{
        $query='SELECT COUNT(*) cpt FROM sites';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        return $results[0]['cpt'];
    }
    /**
     * Cette fonction permet de trouver le nombre de news dans la base de données en fonction d'un flux,
     * cette fonction nous permettra de vérifier l'existence et l'unicité d'un site
     */
    public function findNbSites(string $flux) :int{
        $query='SELECT COUNT(*) cpt FROM SITES WHERE flux=:flux';
        $this->con->executeQuery($query, array(
            ':flux'=> array($flux,PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return $results[0]['cpt'];
    }
}