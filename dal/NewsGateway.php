<?php
require_once('Connection.php');
require_once('news.php');
class NewsGateway{
    private $con;

    public function __construct(Connection $con){ 
        $this->con = $con; 
    } //méthodes qui font appel à la classe Connection

    public function insert(string $titre, string $description, string $lien, string $date){
        $query='INSERT INTO NEWS VALUES(:titre,:description,:lien,:date)';
        $this->con->executeQuery($query, array(
            ':titre' => array($titre,PDO::PARAM_STR),
            ':description' => array($description,PDO::PARAM_STR),
            ':lien' => array($lien,PDO::PARAM_STR),
            ':date' => array($date,PDO::PARAM_STR)
        ));
    }

    public function updateTitre(string $lien,string $newTitre){
        $query='UPDATE news SET titre=:newTitre WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newTitre' => array($newTitre,PDO::PARAM_STR)
        ));
    }

    public function updateDescription(string $lien,string $newDescription){
        $query='UPDATE news SET description=:newDescription WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newDescription' => array($newDescription,PDO::PARAM_STR)
        ));
    }

    public function updateDate(string $lien,string $newDate){
        $query='UPDATE news SET date=:newDate WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newDate' => array($newDate,PDO::PARAM_STR)
        ));
    }

    public function updateLien(string $lien,string $newLien){
        $query='UPDATE news SET lien=:newLien WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newLien' => array($newLien,PDO::PARAM_STR)
        ));
    }

    public function updateImage(string $lien,string $newImage){
        $query='UPDATE news SET image=:newImage WHERE lien=:lien';
        $this->con->executeQuery($query,array(
            ':lien'=> array($lien,PDO::PARAM_STR),
            ':newImage' => array($newImage,PDO::PARAM_STR)
        ));
    }

    public function delete(string $lien){
        $query='DELETE FROM NEWS WHERE lien=:link';
        $this->con->executeQuery($query, array(
            ':link'=> array($lien,PDO::PARAM_STR)
        ));
    }

    public function findAllNews() : array{
        $query='SELECT * FROM news';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach ($results as $row)
            $tabNews[]=new News($row['titre'],$row['description'],$row['lien'],$row['date'],$row['image']);
        return $tabNews;
    }

    public function findNews($page,$nbNewsParPage) : array{
        $calc=($page-1)*$nbNewsParPage;
        $query='SELECT * from news ORDER BY date DESC LIMIT '.$calc.','.$nbNewsParPage;
        $this->con->executeQuery($query,array(
        ));
        $results=$this->con->getResults();
        foreach($results as $row) {
            if(empty($row['image'])) $img="vues/assets/img/desk.jpg"; else $img = $row['image']; //Mets une image de base
            $tabNews[] = new News($row['titre'], $row['description'], $row['lien'], $row['date'], $img);

        }
        return $tabNews;
    }

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

    public function getNbNews(): int{
        $query='SELECT COUNT(*) cpt FROM news';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        return $results[0]['cpt'];
    }
}
?>