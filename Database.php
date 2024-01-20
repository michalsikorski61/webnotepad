<?php

class Database
{
    protected $db_host = "localhost";
    protected $db_password = 'yYEp0HxH&Ln9zkfs';
    protected $db_user = 'serwer90089_0upper1';
    protected $db_name = 'serwer90089_0upper1';

    public function db_connection():PDO
    {
        return new PDO("mysql:dbname=$this->db_name;host=$this->db_host",$this->db_user,$this->db_password);
    }

    public function addEntry(string $nick,string $content, $createdAt,string $ip_addr ):bool
    {
        $pdo = $this->db_connection();
        $sql = "INSERT INTO guests_book (id,content,nick,created_at,ip_address) VALUES(null,?,?,?,?)";
        return $pdo->prepare($sql)->execute([$content,$nick,$createdAt,$ip_addr]);
    }

    public function getEntry(int $entryId)
    {
        $pdo = $this->db_connection();
        $sql = "SELECT * FROM guests_book WHERE id=$entryId";
        return $pdo->query($sql);
    }
    public function getEntries(int $limit=null): PDOStatement|false
    {
        $pdo = $this->db_connection();
        $sql = $limit > 0 ? "SELECT * FROM guests_book ORDER BY id DESC LIMIT $limit":"SELECT * FROM guests_book ORDER BY id DESC";
        return $pdo->query($sql);
    }

    public function removeEntry(int $entryId):int|false
    {
        $pdo = $this->db_connection();
        $sql = "DELETE FROM guests_book WHERE id = $entryId";
        return $pdo->exec($sql);
    }

    public function editEntry(int $entryId,string $content):bool{
        $pdo = $this->db_connection();
        $sql = "UPDATE guests_book SET content=? WHERE id=$entryId";
        return $pdo->prepare($sql)->execute([$content]);
    }
}