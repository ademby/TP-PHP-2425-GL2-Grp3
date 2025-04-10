<?php
class User {

    // Constructors
    public function __construct(
        public string $username,
        public string $email,
        public string $password,
        public string $role,
        public int $id = -1
    ){
        if (strlen($username) > 30) {
            throw new InvalidArgumentException("Designation must be 10 characters or less");
        }
        if (strlen($email) > 30) {
            throw new InvalidArgumentException("Description must be 40 characters or less");
        }
        if (strlen($password) > 30) {
            throw new InvalidArgumentException("Description must be 40 characters or less");
        }
        if (strlen($role) > 30) {
            throw new InvalidArgumentException("Description must be 40 characters or less");
        }
    }
}
?>