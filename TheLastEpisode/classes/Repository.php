<?php

/**
 * Inspiration : https://github.com/aymensellaouti/phprtgl2425 but w/ some modifications
 */

abstract class Repository implements RepositoryInterface {
    
    protected $db;

    public function __construct(protected $tableName){
        $this->db = ConnexionDB::getInstance();
    }
    
    public function create  ($params){
        $keys = array_keys($params);
        $paramsHere = array_fill(0, count($keys), '?');

        $keysString = implode(",", $keys);
        $paramsHereString = implode(",", $paramsHere);

        $request = "INSERT INTO {$this->tableName} ($keysString) VALUES ($paramsHereString);";

        $response = $this->db->prepare($request);
        try{
            $response->execute(array_values($params));
        }catch (Exception $e) {
            return [ 'errorMsg' => $e->getMessage() ];
        }
        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function findAll (){
        $query = "SELECT * from {$this->tableName}";
        try{
            $response = $this->db->query($query);
        }catch (Exception $e) {
            return [ 'errorMsg' => $e->getMessage() ];
        }
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id){
        $query = "SELECT * from {$this->tableName} where id = :id LIMIT 1";
        $response = $this->db->prepare($query);
        try{
            $response->execute(['id' => $id]);
        }catch (Exception $e) {
            return [ 'errorMsg' => $e->getMessage() ];
        }
        return $response->fetch(PDO::FETCH_ASSOC);
    }
    public function deleteById  ($id){
        $query = "delete from {$this->tableName} where id = :id";
        $response = $this->db->prepare($query);
        try{
            $response->execute(['id' => $id]);
        }catch (Exception $e) {
            return [ 'errorMsg' => $e->getMessage() ];
        }
        return NULL;
    }
    public function tableColumns(){
        try{
            return $this->db->query("DESCRIBE $this->tableName")->fetchAll(PDO::FETCH_COLUMN);
        }
        catch(Exception $e) {
            return [ 'errorMsg' => $e->getMessage() ];
        }
    }
}

?>