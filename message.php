<?php
require_once 'connection.php';
    class Message{
        private $dbConnection;
        private $message_id;
        private $addMessage;

        public function __construct(){
            $this->dbConnection = new DatabaseConnection();
            $this->addMessage = $this->dbConnection->prepare_statement("INSERT INTO `Message` (`to_user`, `from_user`, `date_created`, `content`) VALUES (?, ?, ?, ?)");
        }

        public function storeMessage($to_user, $from_user, $date_created, $content){
            $this->addMessage->bind_param("ddss", $to_user, $from_user, $date_created, $content);
            $this->addMessage->execute();
            $this->message_id = $this->addMessage->insert_id;
            // echo $this->message_id;
        }

        public function getAllMessages($this_user, $other_user) {
            $where_clause = "WHERE (`to_user` = " . $this_user . " AND `from_user` = " . $other_user . ") OR (`to_user` = " . $other_user . " AND `from_user` = " . $this_user . ")";
            $query_string = "SELECT * FROM `Message` " . $where_clause . " ORDER BY `date_created`";
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result;
            else
                echo "horiffic failure";
        }

        public function getAllRecommendationsForConversation($this_user, $other_user) {
            $where_clause = "WHERE (`to_user` = " . $this_user . " AND `from_user` = " . $other_user . ") OR (`to_user` = " . $other_user . " AND `from_user` = " . $this_user . ")";
            $query_string = "SELECT * FROM `UserRecommendation` " . $where_clause . " ORDER BY `date_created`";
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result;
            else
                echo "horiffic failure";
        }
}
?>
