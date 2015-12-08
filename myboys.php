<!DOCTYPE html>
<html>

<head>
    <title>Ya Boyz</title>
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
            require_once 'user.php';
            $watchlist = new Watchlist();
            $post = new MediaPost();
            $user = new User();
            /*
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
            */
            $this_user = $_SESSION['authenticated_user'];
            $friends = $watchlist->getMyBoys($this_user);
            if ($friends) {
                while($friend = $friends->fetch_object()) {
                    $friend_watchlist = $watchlist->getWatchlistForUser($friend->friend);
                    ?>
                    <div class="well">
                        <div class="page-header">
                            <h3><?php echo $user->getFullNameById($friend->friend);?></h3>
                        </div>
                    </div>
                    <?php
                }
            }
            /*
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
            */
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <input id="add_friend_text" type="text" name="friend_email" placeholder="Ya Boyz Email"/>
                <input id="add_friend_button" class="btn btn-success" type="submit" name="submit" value="Add a Boy" />
            </div>
        </form>
    </div>


</body>
</html>
