<!DOCTYPE html>
<html>

<head>
    <title>Recommendation Sent</title>
    <?php include_once 'header.php'; ?> 
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?>
    </section>
<?php
    require_once 'mediapost.php';
    require_once 'user.php';
    $error = "";
    if(!empty($_POST['title']) && !empty($_POST['rating'])){
        $user = new User();
        $post = new MediaPost();
        $from_user = $_SESSION['authenticated_user'];
        $title = $_POST['title'];
        $media = $post->getMediaIdByTitle($title);
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];
        $date_created = date("Y-m-d H:i:s");
        if($_POST['review_type'] == 'private'){
            $email = $_POST['username'];
            $to_user = $user->getIdByEmail($email);
            if ($to_user) {
                $post->storeRecommendation($from_user, $to_user, $media, $rating, $comment, $date_created);
            }
            else {
                $error = "User with email did not exist";
            }
        }
        else{
            $post->storePublicReview($from_user, $media, $rating, $comment, $date_created);
        }
    }
    if ($error === "") {
?>

    <div class="container">
        <div class="jumbotron">
            <span>Recommendation Created</span>
            <span>Click <a href="recommend.php">here</a> to create anotha</span>

        </div>
    </div>
    <?php
}
else {
    ?>
    <div class="container">
        <div class="jumbotron">
            <span><?php echo $error . "<br/>"; echo "Email attempted was: " . $_POST['username'] . "<br/>"; ?></span>
            <span>Click <a href="recommend.php">here</a> to try again</span>

        </div>
    </div>
    <?php 
}
?>
</body>
</html>
