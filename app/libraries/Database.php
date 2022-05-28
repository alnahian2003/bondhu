<?php
/*
 * PDO Database Class
 * It connects to database 
 * Creates prepared statements
 * Bind values
 * return/fetch rows and results
 */
class Database
{
    private $host = DB_HOST;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $dbname = DB_NAME;

    private $dbh; //db handler prop
    private $stmt; //statement
    private $err; //error

    public function __construct()
    {
        // Set DSN
        $dsn = "mysql:host={$this->host}; dbname={$this->dbname}";
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        // Create PDO Instance
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    // Prepare statement with query 
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind Values
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }

            $this->stmt->bindValue($param, $value, $type);
        }
    }
    // Execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Fetch result/values as array of objects
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function RowCount()
    {
        return $this->stmt->rowCount();
    }
}
