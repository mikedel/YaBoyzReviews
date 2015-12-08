<?php
require_once 'connection.php';
    class MediaPost{
        private $post_output;
        private $dbConnection;
        private $addPost;
        private $addPublicPost;
        private $recommendation_id;
        private $review_id;
        private $media_id;

        public function __construct(){
            $this->dbConnection = new DatabaseConnection();
            $this->post_output = "";
            $this->addPost = $this->dbConnection->prepare_statement("INSERT INTO `UserRecommendation` (`from_user`, `to_user`, `media`, `rating`, `comment`, `date_created`) VALUES (?, ?, ?, ?, ?, ?)");
            $this->addPublicPost = $this->dbConnection->prepare_statement("INSERT INTO `UserReview` (`user`, `media`, `rating`, `comment`, `date_created`) VALUES (?, ?, ?, ?, ?)");
            $this->addMedia = $this->dbConnection->prepare_statement("INSERT INTO `Media` (`title`) VALUES (?)");
        }

        public function storeRecommendation($from_user, $to_user, $media, $rating, $comment, $date_created){
            $this->addPost->bind_param("ddddss", $from_user, $to_user, $media, $rating, $comment, $date_created);
            $this->addPost->execute();
            $this->recommendation_id = $this->addPost->insert_id;
        }

        public function storePublicReview($user, $media, $rating, $comment, $date_created){
            $this->addPublicPost->bind_param("dddss", $user, $media, $rating, $comment, $date_created);
            $this->addPublicPost->execute();
            $this->review_id = $this->addPublicPost->insert_id;
        }

        public function storeMedia($title) {
            $this->addMedia->bind_param("s", $title);
            $this->addMedia->execute();
            $this->media_id = $this->addMedia->insert_id;
            return $this->media_id;
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
            $result = $this->dbConnection->send_sql_email($query_string);
            if ($result && $result->num_rows != 0)
                return $result->fetch_object()->id;
            else
                return false;
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
