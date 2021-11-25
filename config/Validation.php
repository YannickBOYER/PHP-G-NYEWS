<?php

class Validation
{
    public function nettoyerString($string)
    {
        return filter_var($string,FILTER_SANITIZE_STRING);
    }
    public function validerUtilisateur($user)
    {
        $user=$this->nettoyerString($user);
        return $user=='admin';
        
    }
    public function validerMDP($password)
    {
        $password=$this->nettoyerString($password);
        return $password=='admin';
    }
}

?>