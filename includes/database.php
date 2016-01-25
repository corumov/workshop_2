<?php
require_once ("connection.php");



class MyDatabase
{
    public $conn;

    public function __construct()
    {
        $this->open_db_conn();
    }

    public function open_db_conn()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Polaczenie nieudane. Blad: " . $this->conn->connect_error);
        }
        echo "Polaczenie udane.";
    }
//    public function query($sql)
//    {
//        $sql_result = $this->conn->query($sql);
//        //$result = '';
//        if (!$sql_result) {
//            Die ("Query failed in query" . $this->conn->error );
//
//        } else return $sql_result;
//    }
    public function close_conn()
    {
        if (isset($this->conn)) {
            $this->conn->close();
            //$this->conn=null;
            // echo "zamykam połączenie";
        }
    }

    public function query($sql)
    {
        $result = $this->conn->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    public function escape_string($string)
    {
        // $escaped_string = mysqli_real_escape_string($this->conn, $string);
        $escaped_string = $this->conn->real_escape_string($string);
        return $escaped_string;
    }

    private function confirm_query($result)
    {
        if (!$result) {
            die("Database query failed");
        }
    }

    public function find_in_users_by_id($id)
    {
        $sql = "SELECT * FROM users WHERE user_id={$id}";
        $result = $this->query($sql);
        $found_result = $this->fetch_array_test($result);
        return $found_result;
    }

    public function find_one_record_in_users_by_value($key, $value)
    {
        $sql = "SELECT * FROM users WHERE {$key}="."\"".$this->escape_string($value)."\"";
        echo "SQL: $sql";
        $result = $this->query($sql);
        $found_result = $this->fetch_array_test($result);
        return $found_result;
    }

    public function encrypt_pass($password)
    {
        $options = ['cost' => 10, 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),];
        $hashedPas = password_hash($password, PASSWORD_BCRYPT, $options);
        return $hashedPas;
    }

    public function compare_password($typed_pass, $db_pass)
    {if (password_verify($typed_pass, $db_pass)) {
        TRUE;
        echo " Password is correct";
    }else echo "Wrong password";
        FALSE;
    }
    // HELPING FUNCTIONS
    public function fetch_array_test($result)
    {
        if ($result->num_rows > 0) {
            $found_user = $result->fetch_array();
            //var_dump($found_user);
            return $found_user;
        } else echo "No record found";
    }
}

$database = new MyDatabase();
//var_dump(get_class_methods($database->conn));
//var_dump(get_class_vars($database->conn->mysqli));
$db =& $database;
//var_dump($database->conn);
//$database->close_conn();
//var_dump($database->conn);



?>
