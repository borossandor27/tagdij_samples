<?php
require_once './pages/User.php';
class DataBase
{
    protected $connection;
    protected $resultArray;
    public $errors = TRUE;
    public $errorMessage = "";
    public $query_count = 0;

    public function __construct($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = 'tagdij', $charset = 'utf8') {
            $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            if ($this->connection->connect_error) {
                    $this->error('Failed to connect to MySQL - ' . $this->connection->connect_error);
            }
            $this->connection->set_charset($charset);
            $this->connection->query("UPDATE `ugyfel` SET `jelszo`='".password_hash('1234', PASSWORD_BCRYPT)."' WHERE 1");
            //echo 'kapcsolat ok!';
    }
    function __destruct() {
        //echo 'kapcsolat vége!';;
        $this->connection->close();
    }
    
    function select($param) {
        
    }
    function insert($param) {
        
    }
    function update($param) {
        
    }
    function delete($param) {
        
    }
    function login($username, $password) {
        $hashed_password = password_hash($password,PASSWORD_BCRYPT);
        $sql = "SELECT `azon`,`nev`,`szulev`,`irszam`,`orsz`,`jelszo`,`helyseg`, kep FROM `ugyfel` WHERE `nev`= ?;";
        $row = null;
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("s", $username);
            $result = $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($azon,$nev,$szulev,$irszam,$orsz,$jelszo,$helyseg,$kep);
            $row = $stmt->fetch(); 
            if($stmt->num_rows == 1 && password_verify($password, $jelszo)){
                $_SESSION['user'] = new User($azon,$nev,$szulev,$irszam,$orsz,$helyseg,$kep);
                $_SESSION['login'];
                header("Location: index.php");
                echo '<p>sikeres</p>';
            } else {
                echo '<p>sikertelen</p>';    
            }
            echo '<pre>';
            var_dump($row);
            echo '</pre>';
            $stmt->close();
         } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    function query_eddigi_befizetesek_mindenki() {
        $sql = "SELECT ugyfel.nev, SUM(`osszeg`) AS osszes, MAX(`datum`) AS legutobbi\n"
            . "FROM `befiz` RIGHT JOIN ugyfel USING(azon)\n"
            . "WHERE 1 GROUP BY `azon`\n"
            . "ORDER BY 1;";
        $result = $this->connection->query($sql);
        $this->resultArray = $this->resultToArray($result);
        $result->free();
        return $this->resultArray;
    }
    function query_eddigi_befizetesek_egyeni($id) {
        $sql = "SELECT `osszeg`,`datum` FROM `befiz` WHERE `azon`= $id ORDER BY befiz.datum;";
        try {
            $result = $this->connection->query($sql);
            $this->resultArray = $this->resultToArray($result);
            $result->free();
        } catch (Exception $ex) {
            $this->errors = true;
            $this->errorMessage = $this->connection->error;
        }
        return $this->resultArray;
    }
    function insert_befizetes($id, $osszeg) {
        $sql = "INSERT INTO `befiz` (`azon`, `datum`, `osszeg`) VALUES ('$id', current_timestamp(), '$osszeg');";
        try {
            if ($this->connection->query($sql) === TRUE) {
                $this->errors = false;
            }            
        } catch (Exception $ex) {
            $this->errors = true;
            $this->errorMessage = $this->connection->error;
        }
    }
    function tagok_Lista(){
        $sql = "SELECT `nev`,`azon` FROM `ugyfel` WHERE 1;";
        $result = $this->connection->query($sql);
        $this->resultArray = $this->resultToArray($result);
        $result->free();
        return $this->resultArray;
    }
    function resultToArray($result) {
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    return $rows;
}
}

?>
