<!DOCTYPE html>
<html>

<head>
    <title>My Watchlist</title>
    <?php include_once 'header.php'; ?>   
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?> 
    </section>
    <div class="container">

        <?php
            require_once 'watchlist.php';
            require_once 'mediapost.php';            
            $watchlist = new Watchlist();
            $post = new MediaPost();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(!empty($_POST['title'])){
                    $media_id = $post->getMediaIdByTitle($_POST['title']);
                    $watchlist->storeListMedia($_SESSION['authenticated_user'], $media_id);
                }
            }
            else if($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (!empty($_GET['remove_media'])) {
                    $media_id = $_GET['remove_media'];
                    $watchlist->removeMediaFromWatchlist($_SESSION['authenticated_user'], $media_id);
                }
            }
            $list_items = $watchlist->getWatchlistForUser($_SESSION['authenticated_user']);
            if ($list_items) {
                while ($list_item = $list_items->fetch_object()) {
                    echo '<div class="well"><div class="page-header"><h3>';
                    $media = $post->getMediaById($list_item->media);
                    echo $media->title;
                    echo "</h3>";
                    echo "<a class='btn btn-danger btn-sm' href='user_watchlist.php?remove_media=";
                    echo $media->id;

                    echo "'>Remove from Watchlist</a>";
                    echo "</div></div>";
                }
            }
            if($list_items->num_rows === 0)
            {
                ?>
                    <div class="well">
                        <div class="page-header">
                            <h3>No Items in Watchlist</h3>
                        </div>
                    </div>
                    <?php
            }
            ?>
        <a href="add_to_watchlist.php" class="btn btn-success">Add to Watchlist</a>
    </div>
    

</body>
</html>
