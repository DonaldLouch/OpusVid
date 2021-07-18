<?php
    class MySQL {
        private $serverName;
        private $username;
        private $password;
        private $dbName;
        private $charset;

        public function connect() {
            $this->serverName = "localhost"; //Usually "localhost"
            $this->username = "devlexicon_opusvid";
            $this->password = "3b65ms~Q";
            $this->dbName = "devlexicon_opusvid ";
            $this->charset = "utf8mb4"; //Usually "utf8mb4"

            try {
                $dsn = "mysql:host=".$this->serverName.";dbname=".$this->dbName.";charset=".$this->charset;

                $pdo = new PDO($dsn, $this->username, $this->password);

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $pdo;
            } catch (PDOException $e) {
                echo "<h2>Connection = Connection Failed... ".$e->getMessage()."</h2>";
            }
        }
    }