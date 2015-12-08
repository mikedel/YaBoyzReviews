<!DOCTYPE html>
<html>

<head>
    <title>Recommend to Friends</title>
    <?php include_once 'header.php'; ?> 
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?>
    </section>

    <div class="container">
        <div class="jumbotron">
            <h2>Recommend to Friends</h2>
            <form action="send_recommendation.php" method="POST">
                <div class="form-group">
                    <label for="mediaName">Name of media</label>
                    <input type="text" class="form-control" name="title" id="media-input" placeholder="Name of Media" />
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" value="1">1
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" value="2">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" value="3">3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" value="4">4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" value="5" checked="checked">5
                    </label>
                </div>

                <div class="form-group">
                    <label for="comment">Comment(Optional)</label>
                    <textarea class="form-control" rows="5" name="comment"></textarea>
                </div>
                <div class="form-group">
                    <label for="review_type">
                        <label class="radio-inline">
                            <input type="radio" name="review_type" id="public-input" value="public" checked="checked">Make Public Review
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="review_type" id="private-input" value="private">Private Recommendation
                        </label>
                    </label>
                </div>
                <div class="form-group" style="display:none;" id="username_container">
                    <label for="username">Friend's Username</label>
                    <input type="text" class="form-control" name="username" id="username-input" placeholder="Username of friend" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Send Recommendation" >
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    
$("#private-input").click( function() {
    $("#username_container").show();    
});
$("#public-input").click( function() {
    $("#username_container").hide();    
});

</script>
