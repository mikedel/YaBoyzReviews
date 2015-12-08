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
        if(isset($_SESSION['authenticated_user'])) {
            require_once 'watchlist.php';
            require_once 'mediapost.php';
            require_once 'user.php';
            $watchlist = new Watchlist();
            $post = new MediaPost();
            $user = new User();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(!empty($_POST['friend_email'])){
                    $new_friend_id = $user->getIdByEmail($_POST['friend_email']);
                    if (!$new_friend_id) {
                        echo "<h2 style='color: white; background-color: #d61616;'>User not found with email address " . $_POST['friend_email'] . ". Try again.</h2>";
                    }
                    else {
                        $date_created = date("Y-m-d H:i:s");
                        $watchlist->addNewBoy($_SESSION['authenticated_user'], $new_friend_id, $date_created);
                    }
                }
            }
            $this_user = $_SESSION['authenticated_user'];
            $friends = $watchlist->getMyBoys($this_user);
            if ($friends) {
                while($friend = $friends->fetch_object()) {
                    $friend_watchlist = $watchlist->getWatchlistForUser($friend->friend);
                    $url_string = "conversation.php?friend_id=" . $friend->friend;
                    $user_email = $post->getUserById($friend->friend)->email;
                    ?>
                    <div class="well">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="<?php echo $url_string; ?>">
                                        <h3><?php echo $user->getFullNameById($friend->friend);?></h3>
                                    </a>
                                    <ul>
                                    <?php
                                    if($friend_watchlist){
                                        while ($list_item = $friend_watchlist->fetch_object()) {
                                            echo "<li>";
                                            $media = $post->getMediaById($list_item->media);
                                            echo $media->title;
                                            echo "</li>";
                                        }
                                    }
                                    if($friend_watchlist->num_rows === 0){
                                    ?>
                                                <h5>No Items in Watchlist</h5>
                                    <?php
                                    }
                                    ?>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <form action="recommend.php" method="POST">
                                    <div class="form-group">
                                        <label for="recommend-back">
                                            <input type="hidden" name="holla_id" value="<?php echo $user_email; ?>">
                                            <input type="submit" class="btn btn-success btn-lg" style="margin-top:10%;" value="Holla" />
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
        ?>
        <form action="myboys.php" method="POST">
            <div class="form-group">
                <input id="add_friend_text" type="text" name="friend_email" placeholder="Ya Boyz Email"/>
                <input id="add_friend_button" class="btn btn-success" type="submit" name="submit" value="Add a Boy" />
            </div>
        </form>
    <?php
    }
    else{
        ?>
        <div class="page-header">
            <span><strong>You must <a href="signin.php">sign in </a>to view this content</strong></span>
        </div>
        <?php
    }
    ?>
    </div>


</body>
</html>
