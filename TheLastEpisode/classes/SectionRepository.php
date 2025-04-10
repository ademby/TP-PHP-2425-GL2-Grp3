<?php

class SectionRepository extends Repository {
    public function __construct()
    {
        parent::__construct('section');
    }
    public function update($id, $params)
    {
        if ( isset($params['designation']) && (strlen($params['designation']) > 10) ) {
            return ['errorMsg' => 'Designation must be 10 characters or less'];
        }
        
        if ( isset($params['designation']) && (strlen($params['description']) > 100) ){
            return ['errorMsg' => 'Description must be 100 characters or less'];
        }

        return parent::update($id,$params) ;
    }
}

?>