<!DOCTYPE html>
<html>

<head>
    <title>Add To Watchlist</title>
    <?php include_once 'header.php'; ?> 
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?>
    </section>

    <div class="container">
        <div class="jumbotron">
            <h2>Add media</h2>
            <form action="user_watchlist.php" method="POST">
                <div class="form-group">
                    <label for="mediaName">Name of media</label>
                    <input type="text" class="form-control" name="title" id="media-input" placeholder="Name of Media" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add to Watchlist" >
                </div>
            </form>
        </div>
    </div>
</body>
</html>
