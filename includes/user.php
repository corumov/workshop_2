<?php
require_once "database.php";
class User {
    private $id;
    private $email;
    private $password;

    private $db;

    public function __construct() {
       global $database;
        $this->id = null;
        $this->email = null;
        $this->password = null;
        $this->db = $database;
    }

    public function loadFromDB($email)
    {
        //global $db;
        $sql = "SELECT * FROM users WHERE user_email=" . "\"" . $this->db->escape_string($email) . "\"";
        //echo "SQL: $sql";
        $result = $this->db->query($sql);
        $found_result = $this->db->fetch_array_test($result);
        $this->id = $found_result['user_id'];
        $this->email = $found_result['user_email'];
        $this->password = $found_result['password'];
    }

    public function create() {
        // INSERT, jeśli nie było zapisane wcześniej
        // - email/login nie istnieje w bazie
        // - aktualizacja id na wartość uzyskaną z bazy (last_id)

        // zwraca true/false
    }

    public function update() {
        // UPDATE, napisanie pól w bazie danych
        // jeśli obiekt był wcześniej zapisany przez create()

        // zwraca true/false
    }

    public function getId() {
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
    }

    public function setPassword($password) {
        // zahashowanie hasła password_hash
    }


}

$test_user = new User();
