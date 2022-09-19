<?php
class DataSource
{
    
    const HOST = 'localhost';
    
    const USERNAME = 'root';
    
    const PASSWORD = 'mysql';
    
    const DATABASENAME = 'php_crud';
    
    private $connection;
    
    function __construct()
    {
        $this->connection = $this->getConnection();
    }
    
    /**
     * Returns a database MySQLi instance.
     */
    public function getConnection()
    {
        $connection = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASENAME);
        
        if (mysqli_connect_errno()) {
            trigger_error("Problem with connecting to database with MySQLi.");
        }
        
        $connection->set_charset("utf8");
        return $connection;
    }
    
    /**
     * Returns a database PDO instance.
     */
    public function getPdoConnection()
    {
        $connection = FALSE;
        try {
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DATABASENAME;
            $connection = new \PDO($dsn, self::USERNAME, self::PASSWORD);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            exit("PDO database connection error: " . $e->getMessage());
        }
        return $connection;
    }
    
    /**
     * Bind prameters and values to a sql statement.
     */
    public function bindQueryParams($statement, $paramType, $paramArray = array())
    {
        $paramValueReference = null;
        $paramValueReference[] = & $paramType;
        for ($i = 0; $i < count($paramArray); $i ++) {
            $paramValueReference[] = & $paramArray[$i];
        }
        call_user_func_array(array(
            $statement,
            'bind_param'
        ), $paramValueReference);
    }
    
    /**
     * Common entry point to execute query for all CRUD operations.
     */
    public function execute($query, $paramType = "", $paramArray = array())
    {
        $statement = $this->connection->prepare($query);
        if (! empty($paramType) && ! empty($paramArray)) {
            $this->bindQueryParams($statement, $paramType, $paramArray);
        }
        $statement->execute();
        return $statement;
    }
    
    /**
     * To read database.
     */
    public function select($query, $paramType = "", $paramArray = array())
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        $result = $statement->get_result();
        
        if ($result->num_rows > 0) {
            $resultset = null;
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
            return $resultset;
        }
    }
    
    public function insert($query, $paramType, $paramArray)
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        return $statement->insert_id;
    }
    
    public function update($query, $paramType, $paramArray)
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        $affectedRows = $statement->affected_rows;
        return $affectedRows;
    }
    
    public function delete($query, $paramType, $paramArray)
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        $affectedRows = $statement->affected_rows;
        return $affectedRows;
    }
    
    public function getRecordCount($query, $paramType = "", $paramArray = array())
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        $statement->store_result();
        return $statement->num_rows;
    }
}