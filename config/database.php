<?php
class Database
{
    private string $host = 'localhost';
    private string $dbName = 'student_db';
    private  string $port = '3307';
    private string $username = 'root';
    private string $password = '';

    public function connect(): PDO
    {
        try {
            $pdo = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->dbName}",
                $this->username,
                $this->password
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}
