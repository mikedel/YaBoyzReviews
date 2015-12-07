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
                <h3>The Incredible Hulk</h3>
                <h5>from Mike Del</h5>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <p>You're going to love this green monstrosity! Whatever problems it has as a story, at least Hulk tried, honestly and desperately, to push the comic book move into new places emotionally and stylistically.
                </p>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <a class="btn btn-success btn-sm">Reply</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>
        <?php
            require_once 'mediapost.php';
            session_start();
            $post = new MediaPost();
            $recommendations = $post->getRecommendationsForUser($_SESSION['authenticated_user']);
            if ($recommendations) {
                while ($recommendation = $recommendations->fetch_object()) {
                    echo '<div class="well"><div class="page-header"><h3>';
                    $media = $post->getMediaById($recommendation->media);
                    echo $media->title;
                    echo "</h3><h5>";
                    $user = $post->getUserById($recommendation->from_user);
                    echo $user->first_name;
                    echo " ";
                    echo $user->last_name;
                    echo "</h5>";
                    for ($i = 0; $i < $recommendation->rating; $i++)
                        echo '<span class="glyphicon glyphicon-star"></span>';
                    echo "<p>";
                    echo $recommendation->comment;
                    echo "</p>";

                    echo "</div></div>";
                }
            }
        ?>
    </div>


</body>
</html>
