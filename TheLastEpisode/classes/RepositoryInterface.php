<?php

/**
 * Inspiration : https://github.com/aymensellaouti/phprtgl2425 but w/ some modifications
 */

interface RepositoryInterface {
    public function create($params);
    public function update($id,$params);
    public function findAll();
    public function findById($id);
    public function deleteById($id);
}

?>