<?php
require_once 'connection.php';
    class MediaPost{
        private $post_output;
        private $dbConnection;
        private $addPost;
        private $post_id;

        public function __construct(){
            $this->dbConnection = new DatabaseConnection();
            $this->post_output = "";
            $this->addPost = $this->dbConnection->prepare_statement("INSERT INTO `media` (`title`, `poster_id`) VALUES (?, ?)");
        }

        public function storePost($title, $poster_id){
            $this->addPost->bind_param("sd", $title, $poster_id);
            $this->addPost->execute();
            $this->post_id = $this->addPost->insert_id;
            echo $this->post_id;
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

        public function getUserById($user_id) {
            $query_string = "SELECT * FROM `User` WHERE `id` = " . $user_id;
            $result = $this->dbConnection->send_sql($query_string);
            if ($result)
                return $result->fetch_object();
            else
                echo "horiffic failure";
        }
}
?>
