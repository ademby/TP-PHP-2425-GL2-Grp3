<?php
class Section {

    // Constructors
    public function __construct(
        public string $designation,
        public string $description,
        public int $id = -1
    ){
        if (strlen($designation) > 10) {
            throw new InvalidArgumentException("Designation must be 10 characters or less");
        }
        if (strlen($description) > 100) {
            throw new InvalidArgumentException("Description must be 40 characters or less");
        }
    }
}
?>