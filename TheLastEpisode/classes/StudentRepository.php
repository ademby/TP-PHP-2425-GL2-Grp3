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

    public function update($id, $params)
    {
        if ( isset($params['name']) && (strlen($params['name']) > 30) ) {
            return ['errorMsg' => 'Designation must be 10 characters or less'];
        }
        
        if ( isset($params['birthday']) && (strlen($params['birthday']) > 20) ){
            return ['errorMsg' => 'Description must be 100 characters or less'];
        }

        if ( isset($params['imageURL']) && (strlen($params['imageURL']) > 100) ){
            return ['errorMsg' => 'Description must be 100 characters or less'];
        }

        if ( isset($params['section']) && (strlen($params['section']) > 10) ){
            return ['errorMsg' => 'Description must be 100 characters or less'];
        }

        return parent::update($id,$params) ;
    }
}

?>