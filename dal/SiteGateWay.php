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

    public function insert(string $nom, string $lien, string $logo, string $flux){
        $query='INSERT INTO sites VALUES(:nom,:logo,:lien,:flux)';
        $this->con->executeQuery($query, array(
            ':nom' => array($nom,PDO::PARAM_STR),
            ':lien' => array($lien,PDO::PARAM_STR),
            ':logo' => array($logo,PDO::PARAM_STR),
            ':flux' => array($flux,PDO::PARAM_STR)
        ));
    }

    public function updateNom(string $lien,string $newNom){
        $query='UPDATE sites SET nom=:newNom WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newTitre' => array($newNom,PDO::PARAM_STR)
        ));
    }

    public function updateLogo(string $lien,string $newLogo){
        $query='UPDATE sites SET logo=:newLogo WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newDescription' => array($newLogo,PDO::PARAM_STR)
        ));
    }

    public function updateFlux(string $lien,string $newFlux){
        $query='UPDATE sites SET flux=:newFlux WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newFlux' => array($newFlux,PDO::PARAM_STR)
        ));
    }

    public function updateLien(string $lien,string $newLien){
        $query='UPDATE sites SET lien=:newLien WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newLien' => array($newLien,PDO::PARAM_STR)
        ));
    }

    public function findAllSites() : array{
        $query='SELECT * FROM sites';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach ($results as $row)
            $tabSite[]=new Site($row['nom'],$row['lien'],$row['logo'],$row['flux']);
        return $tabSite;
    }

    public function delete(string $lien){
        $query='DELETE FROM sites WHERE lien=:link';
        $this->con->executeQuery($query, array(
            ':link'=> array($lien,PDO::PARAM_STR)
        ));
    }


    public function getNbSites(): int{
        $query='SELECT COUNT(*) cpt FROM sites';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        return $results[0]['cpt'];
    }

    public function findNbSites(string $lien) :int{
        $query='SELECT COUNT(*) cpt FROM SITES WHERE LIEN=:link';
        $this->con->executeQuery($query, array(
            ':link'=> array($lien,PDO::PARAM_STR)
        ));
        $results=$this->con->getResults();
        return $results[0]['cpt'];
    }
}