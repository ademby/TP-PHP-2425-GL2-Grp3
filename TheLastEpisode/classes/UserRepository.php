<?php

class UserRepository extends Repository {
    public function __construct()
    {
        parent::__construct('user');
    }
    public function confirmUser($username,$password){
        $query = "SELECT * from {$this->tableName} where username = :username AND password = :password";
        $response = $this->db->prepare($query);
        try{
            $response->execute(['username' => $username,'password' => $password]);
        }catch (Exception $e) {
            return [ 'errorMsg' => $e->getMessage() ];
        }
        if ( $response->fetch() )
            return true;
        else
            return false;
    }
    public function findAllBySection($section){
        $query = "SELECT * from {$this->tableName} where section = :section";
        $response = $this->db->prepare($query);
        try{
            $response->execute(['section' => $section]);
        }catch (Exception $e) {
            return [ 'errorMsg' => $e->getMessage() ];
        }
        return $response->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>