<!DOCTYPE html>
<html>

<head>
    <title>My Posts</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css">
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?> 
    </section>

    <div class="container">
        <div class="well">
            <div class="page-header">
                <h3>Black Hawk Down</h3>
                <h5>by Rich Finnicky</h5>
                <p>
                I didn't actually watch it. But I made it to the front page bros!!!!
                </p>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <a class="btn btn-danger btn-sm">Dismiss</a>
                </div>
            </div>
        </div>
        <?php
            require_once 'mediapost.php';
            $post = new MediaPost();
            $reviews = $post->getAllReviews();
            while ($review = $reviews->fetch_object()) {
                $media = $post->getMediaById($review->media);
                $user = $post->getUserById($review->user);
                ?>
                <div class="well">
                    <div class="page-header">
                        <h3><?php echo $media->title; ?></h3>
                        <h5>
                        <?php 
                        echo $user->first_name; 
                        echo " ";
                        echo $user->last_name;
                        ?>
                         </h5>
                        <p>
                        <?php echo $review->comment; ?>
                        </p>
                    </div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <a class="btn btn-danger btn-sm">Dismiss</a>
                    </div>
                </div>
                </div>

                <?php
            }
        ?>
    </div>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="text-align:center;">
                <button class="btn btn-primary btn-info">Load More Reviews</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>



</body>
</html>
