<!DOCTYPE html>
<html>

<head>
    <title>Recommendation Sent</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css">
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?>
    </section>
<?php
    require_once 'mediapost.php';
    require_once 'user.php';
    session_start();
    // $email = $_POST['email'];
    // $pass = $_POST['password'];
    // echo $email;
    // echo $pass;
    if(!empty($_POST['username']) && !empty($_POST['title']) && !empty($_POST['rating'])){
        $user = new User();
        $post = new MediaPost();
        $from_user = $_SESSION['authenticated_user'];
        $email = $_POST['username'];
        $to_user = $user->getIdByEmail($email);
        $title = $_POST['title'];
        $media = $post->getMediaIdByTitle($title);
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];
        $date_created = date("Y-m-d H:i:s");
        $post->storeRecommendation($from_user, $to_user, $media, $rating, $comment, $date_created);
?>

    <div class="container">
        <div class="jumbotron">
            <span>Recommendation Created</span>
            <span>Click <a href="recommend.php">here</a> to create anotha</span>

        </div>
    </div>
    <?php
}
?>
</body>
</html>
