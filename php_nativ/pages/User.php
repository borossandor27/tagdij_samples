<?php
class User
{
    public $azon,$nev,$szulev,$irszam,$orsz,$helyseg,$kep;
    public function __construct($azon,$nev,$szulev,$irszam,$orsz,$helyseg,$kep)
    {
        $this->azon = $azon;
        $this->nev = $nev;
        $this->szulev = $szulev;
        $this->irszam = $irszam;
        $this->orsz = $orsz;
        $this->helyseg = $helyseg;
        $this->kep = $kep;
    }
    public function __destruct() {
        
    }
    public function create($username, $password)
    {

    }

    public function exists($username, $password)
    {
        $statement = $this->dbh->prepare(
            'SELECT * from '.$this->usersTableName.' where username = :username'
        );

        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }

        $result = $statement->execute([':username' => $username]);

        if (false === $result) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if (!is_array($row)) {
            return false;
        }

        return password_verify($password, $row['password']);
    }

}
