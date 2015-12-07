<?php
require_once 'connection.php';
    class MediaPost{
        private $post_output;
        private $dbConnection;
        private $addPost;
        private $recmomendation_id;

        public function __construct(){
            $this->dbConnection = new DatabaseConnection();
            $this->post_output = "";
            $this->addPost = $this->dbConnection->prepare_statement("INSERT INTO `UserRecommendation` (`from_user`, `to_user`, `media`, `rating`, `comment`, `date_created`) VALUES (?, ?, ?, ?, ?, ?)");
        }

        public function storeRecommendation($from_user, $to_user, $media, $rating, $comment, $date_created){
            $this->addPost->bind_param("ddddss", $from_user, $to_user, $media, $rating, $comment, $date_created);
            $this->addPost->execute();
            $this->recommendation_id = $this->addPost->insert_id;
            echo $this->recommendation_id;
        }

        public function getAllReviews() {
            $query_string = "SELECT * FROM `UserReview`;";
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result;
            else
                echo "horiffic failure";
        }

        public function getMediaById($media_id) {
            $query_string = "SELECT * FROM `Media` WHERE `id` = " . $media_id;
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result->fetch_object();
            else
                echo "horiffic failure";
        }

        public function getMediaIdByTitle($title) {
            $query_string = "SELECT * FROM `Media` WHERE `title` = \"" . $title . "\"";
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result->fetch_object()->id;
            else
                echo "horiffic failure";
        }

        public function getUserById($user_id) {
            $query_string = "SELECT * FROM `User` WHERE `id` = " . $user_id;
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result->fetch_object();
            else
                echo "horiffic failure";
        }

        public function getRecommendationsForUser($user_id) {
            $query_string = "SELECT * FROM `UserRecommendation` WHERE `to_user` = " . $user_id;
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result;
            else
                echo "horiffic failure";
        }
}
?>
