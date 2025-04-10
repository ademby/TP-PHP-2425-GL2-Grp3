<?php
class Student {

    // Constructors
    public function __construct(
        public string $name,
        public DateTime $birthday,
        public string $imageURL,
        public string $section,
        public int $id = -1
    ){
        if (strlen($name) > 30) {
            throw new InvalidArgumentException("Designation must be 10 characters or less");
        }
        if (strlen($imageURL) > 100) {
            throw new InvalidArgumentException("Description must be 40 characters or less");
        }
        if (strlen($section) > 10) {
            throw new InvalidArgumentException("Description must be 40 characters or less");
        }
    }
}
?>