<?php
require_once 'connection.php';
    class Watchlist{
        private $dbConnection;
        private $addMedia;
        private $addFriend;
        private $addUserFriend;

        public function __construct(){
            $this->dbConnection = new DatabaseConnection();
            $this->addMedia = $this->dbConnection->prepare_statement("INSERT INTO `Watchlist` (`user`, `media`) VALUES (?, ?)");
            $this->addFriend = $this->dbConnection->prepare_statement("INSERT INTO `Friendlist` (`user`, `friend`, `date_created`) VALUES (?, ?, ?)");
            $this->addUserFriend = $this->dbConnection->prepare_statement("INSERT INTO `Friendlist` (`user`, `friend`, `date_created`) VALUES (?, ?, ?)");
        }

        public function storeListMedia($user, $media){
            $this->addMedia->bind_param("dd",$user, $media);
            $this->addMedia->execute();
            $this->user_id = $this->addMedia->insert_id;
        }

        public function addNewBoy($user_id, $friend_id, $date_created) {
            $this->addFriend->bind_param("dds", $user_id, $friend_id, $date_created);
            $this->addFriend->execute();
            $this->user_id = $this->addFriend->insert_id;
            $this->addUserFriend->bind_param("dds",$friend_id, $user_id, $date_created);
            $this->addUserFriend->execute();
            $this->user_id = $this->addUserFriend->insert_id;
        }

        public function getWatchlistForUser($user_id) {
            $user_id = mysqli_escape_string($user_id);
            $query_string = "SELECT * FROM `Watchlist` WHERE `user` = " . $user_id;
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result;
            else
                echo "horiffic failure";
        }

        public function removeMediaFromWatchlist($user_id, $media_id) {
            $user_id = mysqli_escape_string($user_id);
            $media_id = mysqli_escape_string($media_id);
            $query_string = "DELETE FROM `Watchlist` WHERE `user` = " . $user_id . " AND `media` = " . $media_id;
            $result = $this->dbConnection->send_sql($query_string);
            if($result)
                return $result;
            else
                echo "horrific failure";
        }

        public function getMyBoys($user_id) {
            $user_id = mysqli_escape_string($user_id);
            $query_string = "SELECT * FROM `Friendlist` WHERE `user` = " . $user_id;
            $result = $this->dbConnection->send_sql($query_string);
            if($result)
                return $result;
            else
                echo "horrific failure";
        }
}
?>

