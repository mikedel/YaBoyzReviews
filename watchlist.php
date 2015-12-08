<?php
require_once 'connection.php';
    class Watchlist{
        private $dbConnection;
        private $addMedia;

        public function __construct(){
            $this->dbConnection = new DatabaseConnection();
            $this->addMedia = $this->dbConnection->prepare_statement("INSERT INTO `Watchlist` (`user`, `media`) VALUES (?, ?)");
        }

        public function storeListMedia($user, $media){
            $this->addMedia->bind_param("dd",$user, $media);
            $this->addMedia->execute();
            $this->user_id = $this->addMedia->insert_id;
            // echo $this->user_id;
        }

        public function getWatchlistForUser($user_id) {
            $query_string = "SELECT * FROM `Watchlist` WHERE `user` = " . $user_id;
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result;
            else
                echo "horiffic failure";
        }

        public function removeMediaFromWatchlist($user_id, $media_id) {
            $query_string = "DELETE FROM `Watchlist` WHERE `user` = " . $user_id . " AND `media` = " . $media_id;
            $result = $this->dbConnection->send_sql($query_string);
            if($result)
                return $result;
            else
                echo "horrific failure";
        }
}
?>

