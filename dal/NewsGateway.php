<?php

class NewsGateway{
    private $con;

    public function __construct(Connection $con){ 
        $this->con = $con; 
    }

    //méthodes qui font appel à la classe Connection

    /**
     * Cette fonction permet d'insérer une nouvelle news dans la base de données
     */
    public function insert(string $titre, string $description, string $lien, string $date,$image){

        $query='INSERT INTO news VALUES(:titre,:description,:lien,:date,:image)';

        $this->con->executeQuery($query, array(
            ":titre" => array($titre,PDO::PARAM_STR),
            ":description" => array($description,PDO::PARAM_STR),
            ":lien" => array($lien,PDO::PARAM_STR),
            ":date" => array($date,PDO::PARAM_STR),
            ":image" => array($image,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de mettre à jour le titre d'une news dans la base de données
     */
    public function updateTitre(string $lien,string $newTitre){
        $query='UPDATE news SET titre=:newTitre WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newTitre' => array($newTitre,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de mettre à jour la description d'une news dans la base de données
     */
    public function updateDescription(string $lien,string $newDescription){
        $query='UPDATE news SET description=:newDescription WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newDescription' => array($newDescription,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de mettre à jour la date d'une news dans la base de données
     */
    public function updateDate(string $lien,string $newDate){
        $query='UPDATE news SET date=:newDate WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newDate' => array($newDate,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de mettre à jour le lien d'une news dans la base de données
     */
    public function updateLien(string $lien,string $newLien){
        $query='UPDATE news SET lien=:newLien WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newLien' => array($newLien,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de mettre à jour l'image d'une news dans la base de données
     */
    public function updateImage(string $lien,string $newImage){
        $query='UPDATE news SET image=:newImage WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newImage' => array($newImage,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de supprimer une news dans la base de données à l'aide du lien
     */
    public function delete(string $lien){
        $query='DELETE FROM NEWS WHERE lien=:link';
        $this->con->executeQuery($query, array(
            ':link'=> array($lien,PDO::PARAM_STR)
        ));
    }
    /**
     * Cette fonction permet de trouver toutes les news dans la base de données et de les retourner sous forme de tableau (array)
     */
    public function findAllNews() : array{
        $query='SELECT * FROM news';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach ($results as $row)
            $tabNews[]=new News($row['titre'],$row['description'],$row['lien'],$row['date'],$row['image']);
        return $tabNews;
    }
    /**
     * Cette fonction permet de trouver les news correspondant à la page actuelle dans la base de données et de les retourner sous forme de tableau (array)
     */
    public function findNews($page,$nbNewsParPage) : array{
        $calc=($page-1)*$nbNewsParPage;
        $query='SELECT * from news ORDER BY date DESC LIMIT '.$calc.','.$nbNewsParPage;
        $this->con->executeQuery($query,array());
        $results=$this->con->getResults();
        foreach($results as $row) {
            if(empty($row['image'])) $img="vues/assets/img/desk.jpg"; else $img = $row['image']; //Mets une image de base
            $tabNews[] = new News($row['titre'], $row['description'], $row['lien'], $row['date'], $img);

        }
        return $tabNews;
    }
    /**
     * Cette fonction permet de trouver les 3 dernières news dans la base de données et de les retourner sous forme de tableau (array)
     * Cette fonction sera utile pour afficher ces 3 news dans le carousel présent sur le site
     */
    public function get3LastNews() : array{
        $query='SELECT * from news ORDER BY date DESC LIMIT 3';
        $this->con->executeQuery($query,array(
        ));
        $results=$this->con->getResults();
        foreach($results as $row) {
            if(empty($row['image'])) $img="vues/assets/img/desk.jpg"; else $img = $row['image']; //Mets une image de base
            $tablastNews[] = new News($row['titre'], $row['description'], $row['lien'], $row['date'], $img);

        }
        return $tablastNews;
    }
    /**
     * Cette fonction permet de trouver le nombre de news dans la base de données et de retourner ce nombre
     */
    public function getNbNews(): int{
        $query='SELECT COUNT(*) cpt FROM news';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        return $results[0]['cpt'];
    }

    public function getNbNewsWithLink($lien) {

        $query='SELECT COUNT(*) nb FROM news WHERE lien=:lien';
        $this->con->executeQuery($query, array(
            ":lien"=> array($lien,PDO::PARAM_STR)
        ));

        $results=$this->con->getResults();
        return $results[0]['nb'];
    }
}
?>