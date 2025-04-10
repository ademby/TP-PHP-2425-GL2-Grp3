<?php

class StudentRepository extends Repository {
    public function __construct()
    {
        parent::__construct('student');
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