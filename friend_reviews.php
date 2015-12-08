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
            $post = new MediaPost();
            $user_object = new User();
            $recommendations = $post->getRecommendationsForUser($_SESSION['authenticated_user']);
            if ($recommendations && $recommendations->num_rows > 0) {
                while ($recommendation = $recommendations->fetch_object()) {
                    $full_user_name = $user_object->getFullNameById($recommendation->from_user);
                    $url_link = "conversation.php?friend_id=" . $recommendation->from_user;
                    $media = $post->getMediaById($recommendation->media);
                    $user = $post->getUserById($recommendation->from_user);
                    ?>

                    <div class="well">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-8">
                                <h3><?php echo $media->title; ?></h3>
                                <h5><a href="<?php echo $url_link; ?>" >Ya Boy:
                                <?php
                                echo $full_user_name;
                                ?>
                                </a>
                                (
                                <?php
                                echo $user->email;
                                ?>
                                )
                                </h5>
                                <h5>
                                written on:
                                <?php
                                echo $recommendation->date_created;
                                ?>
                                </h5>
                                <?php
                                 for ($i = 0; $i < $recommendation->rating; $i++)
                                    echo '<span class="glyphicon glyphicon-star"></span>';
                                ?>
                                <p>
                                <?php echo $recommendation->comment; ?>
                                </p>
                                </div>
                                <div class="col-md-4">
                                    <form action="recommend.php" method="POST">
                                    <div class="form-group">
                                        <label for="recommend-back">
                                            <input type="hidden" name="holla_id" value="<?php echo $user->email; ?>">
                                            <input type="submit" class="btn btn-success btn-lg" style="margin-top:10%;" value="Holla Back" />
                                        </label>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            else {
                ?>
                <div class="well">
                    <div class="page-header">
                        <h3>No personal recommendaions yet.  Tell your boys to hit you up!</h3>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>


</body>
</html>
