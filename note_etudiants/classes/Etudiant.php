<?php 
class Etudiant {
    private $name;
    private $notes = []; 

    public function __construct($name,$notes){
        $this->name = $name;
        $this->notes = $notes;
    }
}
?>