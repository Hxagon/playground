<?php
namespace classes;

use mysqli;

/**
 * Class Database
 * @package PageManager
 */
class Database
{
    const DB_HOST = 'localhost';
    const DB_USER = 'testing';
    const DB_PASS = '1234';
    const DB      = 'page_manager';

    /** @var mysqli */
    private $dbConnection;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->initDbConnection();
    }

    public function __destruct()
    {
        $this->quitDbConnection();
    }

    /**
     * @return mixed
     */
    public function getAllPages()
    {
        $query = 'SELECT * from `pages`';
        $result = $this->dbConnection->query($query)->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    private function initDbConnection()
    {
        $this->dbConnection = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB);

        // Verbindung überprüfen
        if (mysqli_connect_errno()) {
            printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
        }
    }

    private function quitDbConnection()
    {
        $this->dbConnection->close();
    }
}
