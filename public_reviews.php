<!DOCTYPE html>
<html>

<head>
    <title>Friend Reviews</title>
    <?php include_once 'header.php'; ?>
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?>
    </section>

    <div class="container">
        <?php
            require_once 'mediapost.php';
            require_once 'user.php';
            $user_object = new User();
            $post = new MediaPost();
            $reviews = $post->getAllReviews();
            while ($review = $reviews->fetch_object()) {
                $media = $post->getMediaById($review->media);
                $user = $post->getUserById($review->user);
                $full_user_name = $user_object->getFullNameById($review->user);
                $url_link = "conversation.php?friend_id=" . $review->user;
                ?>
                <div class="well">
                    <div class="page-header">
                        <h3><?php echo $media->title; ?></h3>
                        <h5><a href="<?php echo $url_link; ?>" >from:
                        <?php
                        echo $full_user_name;
                        ?>
                        </a></h5>
                        <h5>
                        written on:
                        <?php
                        echo $review->date_created;
                        ?>
                         </h5>
                         <?php
                         for ($i = 0; $i < $review->rating; $i++)
                            echo '<span class="glyphicon glyphicon-star"></span>';
                        ?>
                        <p>
                        <?php echo $review->comment; ?>
                        </p>
                    </div>
                </div>

                <?php
            }
        ?>
    </div>
</body>
</html>
