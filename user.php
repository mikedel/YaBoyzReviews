<?php
require_once 'connection.php';
    class User{
        private $dbConnection;
        private $addUser;
        private $user_id;
        private $userData;

        public function __construct(){
            $this->dbConnection = new DatabaseConnection();
            $this->userData = "";
            $this->addUser = $this->dbConnection->prepare_statement("INSERT INTO `User` (`first_name`, `last_name`, `email`, `password`) VALUES (?, ?, ?, ?)");
        }

        public function storeUser($first_name,$last_name,$email, $password){
            $this->addUser->bind_param("ssss", $first_name, $last_name, $email, $password);
            $this->addUser->execute();
            $this->user_id = $this->addUser->insert_id;
            // echo $this->user_id;
        }

        public function getUserId(){
            return $this->user_id;
        }

        public function checkEmailTaken($email){
            $query_string = "SELECT * FROM `User` WHERE `email` = \"" . $email . "\"";
            echo "->";
            echo $query_string;
            echo "<-";
            $result = $this->dbConnection->send_sql($query_string);
            if ($result){
                echo "Email already exists";
                return false;
            }
            else{
                // echo "Email does not exist yet";
                // $result = $result->fetch_object();
                return true;
            }
        }

        public function getIdByEmail($email){
            $result = $this->dbConnection->send_sql("SELECT `id` FROM `User` WHERE `email` = \"" . $email . "\"");
            if ($result){
                $result = $result->fetch_object()->id;
                return $result;
            }
            else{
                return false;
            }
        }

        public function getFirstNameByEmail($email){
            $result = $this->dbConnection->send_sql("SELECT `first_name` FROM `User` WHERE `email` = \"" . $email . "\"");
            if ($result){
                $result = $result->fetch_object()->first_name;
                return $result;
            }
            else{
                return false;
            }
        }

        public function getLastNameByEmail($email){
            $result = $this->dbConnection->send_sql("SELECT `last_name` FROM `User` WHERE `email` = \"" . $email . "\"");
            if ($result){
                $result = $result->fetch_object()->last_name;
                return $result;
            }
            else{
                return false;
            }
        }

        public function checkLoginCredentials($email,$password){
            $this->dbConnection = new DatabaseConnection();
            $result = $this->dbConnection->send_sql("SELECT * FROM `User` WHERE `email` = \"" . $email . "\" AND `password` = \"" . $password . "\"");
            if ($result){
                $result = $result->fetch_object();
                // return $result;
                return true;
            }
            echo "failed";
            return false;
        }
}
?>

