<?php


$db_connections = new ArrayObject();  // stores all db connections

function get_db_connection() : DB | false {
    global $db_connections;

    $config = @parse_ini_file('db.ini', true);

    if($config === false) {
        return false;
    }

    $host = $config['host'];
    $user = $config['user'];
    $password = $config['password'];
    $database = $config['database'];
    $port = $config['port'];

    $key = "$host,$user,$database,$port";

    $conn = @$db_connections->$key;
    if(!$conn)
    {
        $conn = new DB($host, $user, $password, $database, $port);
        $db_connections->$key = $conn;
    }
    return $conn;
}

class DB
{

    public $dbh = null;
    public $dbname = null;

    function __construct($host, $user, $password, $database, $port)
    {
        $this->dbname = $database;
        $this->dbh = new mysqli($host, $user, $password, $database, $port);
    }

    function errorInfo(): array
    {
        return $this->dbh->errorInfo();
    }

    function start(): bool
    {
        return $this->dbh->beginTransaction();
    }

    function commit(): bool
    {
        return $this->dbh->commit();
    }

    function execute($sql, $arr = null)
    {
        // TODO rewrite to be functional and gracefully handle errors
        // XXX Make this log issues/errors in ops event log with the query and args
        // rather than just using ass(), so I can see what exactly went wrong.
        assert(is_string($sql), "sql argument isn't a string");
        $st = $this->dbh->prepare($sql);
        assert($st, "statement prep failed: $sql");
        $st->execute($arr);
        return $st;
    }

    // return first row as object
    function getObj($sql, $arr = null): array | null
    {
        $st = $this->execute($sql, $arr);
        return $st->get_result()->fetch_row();
    }

    // return all rows as objects in an array
    function getArr($sql, $arr = null): mysqli_result | bool
    {
        $st = $this->execute($sql, $arr);
        return $st->get_result();
    }

    // return value of first column in first row
    function getCol($sql, $arr = null)
    {
        $st = $this->execute($sql, $arr);
        $row = $st->fetch(PDO::FETCH_NUM);
        return $row[0];
    }
}

class User {
    private string $username = "";
    public function __construct(string $username)
    {
        $this->username = $username;
    }
    public function getUsername() : string
    {
        return $this->username;
    }
    public function setUsername($newUsername) : string
    {
        $this->username = $newUsername;
        return $this->username;
    }
}
