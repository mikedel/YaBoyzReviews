<!DOCTYPE html>
<html>

<head>
    <title>My Conversation</title>
    <?php include_once 'header.php'; ?>   
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?> 
    </section>
    <div class="container">

        <?php
        if(isset($_SESSION['authenticated_user'])) {
            require_once 'message.php';            
            require_once 'user.php';
            require_once 'mediapost.php';
            $user = new User();
            $message_object = new Message();
            $mediapost = new MediaPost();
            $this_user = $_SESSION['authenticated_user'];
            $other_user = 0;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $other_user = $_POST['friend_id'];
                if(!empty($_POST['new_message'])){
                    $new_message = $_POST['new_message'];
                    $date_created = date("Y-m-d H:i:s");
                    $message_object->storeMessage($other_user,$this_user,$date_created,$new_message);
                    header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI] . "?friend_id=" . $other_user); /* Redirect browser */
                    exit();
                }
            }
            else {
                $other_user = $_GET['friend_id'];
            }
            
            $other_name = $user->getFullNameById($other_user);
            $messages = $message_object->getAllMessages($this_user, $other_user);
            $recommendations = $message_object->getAllRecommendationsForConversation($this_user, $other_user);
            echo "<h1>";
            echo $other_name;
            echo "</h1>";
            $recommendation = null;
            if($recommendations)
                $recommendation = $recommendations->fetch_object();
            if($messages) {
                while($message = $messages->fetch_object()) {
                    if ($recommendation && $recommendation->date_created < $message->date_created) {
                        do {
                            if ($recommendation->to_user === $this_user) {
                                $title = $mediapost->getMediaById($recommendation->media)->title;
                                ?>
                                <div class="well" style="text-align:left;">
                                    <h3><?php echo $title; ?></h3>
                                    <p><?php echo $recommendation->comment; ?></p>
                                    <p>
                                    <?php
                                    //show rating in stars
                                    for ($i = 0; $i < $recommendation->rating; $i++)
                                        echo '<span class="glyphicon glyphicon-star"></span>';
                                    ?>
                                    </p>
                                    <p><?php echo $recommendation->date_created ?></p>
                                </div>
                                <?php
                            }
                            else {
                                $title = $mediapost->getMediaById($recommendation->media)->title;
                                ?>
                                <div class="well" style="text-align:right;">
                                    <h3><?php echo $title; ?></h3>
                                    <p><?php echo $recommendation->comment; ?></p>
                                    <p>
                                    <?php
                                    //show rating in stars
                                    for ($i = 0; $i < $recommendation->rating; $i++)
                                        echo '<span class="glyphicon glyphicon-star"></span>';
                                    ?>
                                    </p>
                                    <p><?php echo $recommendation->date_created ?></p>
                                </div>
                                <?php
                            }
                            $recommendation = $recommendations->fetch_object();
                        } while($recommendation && $recommendation->date_created < $message->date_created);
                    }
                    if($message->to_user === $this_user){
                        ?>
                        <div class="well" style="text-align:left;">
                            <p><?php echo $message->content; ?></p>
                            <p><?php echo $message->date_created ?></p>
                        </div>
                        <?php
                    }
                    else{
                        ?>
                        <div class="well" style="text-align:right;">
                            <p><?php echo $message->content; ?></p>
                            <p><?php echo $message->date_created ?></p>
                        </div>
                        <?php
                    }
                }
            }//handle no messages but recommendations
            ?>
            <form method="POST" action="conversation.php">
                <input type="hidden" name="friend_id" value="<?php echo $other_user; ?>" />
                <div class="form-group">
                    <label for="messagebox" style="width:100%">
                        <textarea name="new_message" style="width:100%;"></textarea>
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Send" style="float:right; margin-bottom:25px;" />
                </div>
            </form>
            <?php
        ?>
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
