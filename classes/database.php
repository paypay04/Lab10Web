<?php
class Database {
    private $conn;

    public function __construct(
        $host = "localhost",
        $user = "root",
        $pass = "",
        $db   = "latihan1"
    ) {
        $this->conn = new mysqli($host, $user, $pass, $db);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null) {
        $sql = "SELECT * FROM $table";
        if ($where) {
            $sql .= " WHERE $where";
        }
        return $this->query($sql);
    }
}
