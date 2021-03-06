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
            $result = $this->dbConnection->send_sql_email($query_string);
            if ($result && $result->num_rows > 0){
                return false;
            }
            else{
                return true;
            }
        }

        public function getFullNameById($id){
            $result = $this->dbConnection->send_sql("SELECT * FROM `User` WHERE `id` = " . $id);
            if ($result){
                $result = $result->fetch_object();
                return $result->first_name . " " . $result->last_name;
            }
            else{
                return false;
            }
        }

        public function getIdByEmail($email){
            $query_string = "SELECT * FROM `User` WHERE `email` = \"" . $email . "\"";
            $result = $this->dbConnection->send_sql_email($query_string);
            if ($result && $result->num_rows != 0){
                $result = $result->fetch_object();
                return $result->id;
            }
            else{
                return false;
            }
        }

        public function getFirstNameByEmail($email){
            $result = $this->dbConnection->send_sql_email("SELECT `first_name` FROM `User` WHERE `email` = \"" . $email . "\"");
            if ($result){
                $result = $result->fetch_object()->first_name;
                return $result;
            }
            else{
                return false;
            }
        }

        public function getLastNameByEmail($email){
            $result = $this->dbConnection->send_sql_email("SELECT `last_name` FROM `User` WHERE `email` = \"" . $email . "\"");
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
            $result = $this->dbConnection->send_sql_email("SELECT * FROM `User` WHERE `email` = \"" . $email . "\" AND `password` = \"" . $password . "\"");
            if ($result && $result->num_rows > 0){
                $result = $result->fetch_object();
                return true;
            }
            return false;
        }
}
?>

