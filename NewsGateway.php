<?php
require_once('Connection.php');
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
    public function update(string $lien, array $parameters){
        $query='UPDATE NEWS SET  WHERE lien=:link';
        $con->executeQuery($query, array(
            ':link'=> $parameters
        ));
    }
    public function delete(string $lien){
        $query='DELETE FROM NEWS WHERE lien=:link';
        $con->executeQuery($query, array(
            ':link'=> array($lien,PDO::PARAM_STR)
        ));
    }
    public function FindAllNews(){
        $query='SELECT * FROM NEWS';
        $con->executeQuery($query, array());
        $results=$con->getResults();
        foreach($results as $row) 
            print $row['lien']."</br>";
    }
}
?>