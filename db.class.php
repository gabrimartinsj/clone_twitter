<?php
    class database {
        // Host
        private $host = 'localhost';

        // User
        private $user = 'root';

        // Password
        private $password = '';

        // Database
        private $database = 'twitter_clone';

        public function mysql_connect(){
            // Create connection
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);

            // Adjusts the application's communication charset with db
            mysqli_set_charset($connection, 'utf8');

            // Connection error verify
            if(mysqli_connect_errno()){
                echo 'Erro ao tentar com o banco de dados: '.mysqli_connect_error();
            }

            return $connection;
        }
    }
?>
