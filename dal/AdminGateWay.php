<?php

class AdminGateWay
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function checkAdmin(string $login, string $password) : bool {
        $query ="SELECT password FROM admin WHERE login=:login";
        $this->con->executeQuery($query, array(':login' => array($login,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        if(!empty($results)){
            var_dump($results[0]['password']);
            return password_verify($password,$results[0]['password']);
        }
        return false;
    }
}