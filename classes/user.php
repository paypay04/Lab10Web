<?php
// classes/user.php
include_once("database.php");

class User {
    private $db;
    private $username;
    private $password;
    private $user_id;

    public function __construct($username, $password) {
        $this->db = new Database();
        $this->username = $username;
        $this->password = $password;
    }

    public function login() {
        $result = $this->db->get("user", "username='$this->username'");

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // kalau password belum di-hash
            if ($this->password === $user['password']) {
                $this->user_id = $user['id'];
                return true;
            }
        }
        return false;
    }

    public function getUserId() {
        return $this->user_id;
    }
}
