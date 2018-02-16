<?php

namespace UPLOADIT\Singleton;

use PDO;

class ConnectionDB {

    private static $instance = null;

    private $host;
    private $user;
    private $password;
    private $dbname;
    private $handle;

    /**
     * @return PDO
     */
    public function getHandle(): PDO
    {
        return $this->handle;
    }

    private function __construct() {

        $this->host     = 'localhost';
        $this->user     = 'root';
        $this->password = '';
        $this->dbname   = 'uploadit';
        $this->handle   = null;

        try {

            $this->handle = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            die('Echec de la connexion : ' . $e->getMessage());

        }
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {

            self::$instance = new self();
        }

        return self::$instance;
    }

}



?>