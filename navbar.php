<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle"collapse" data-target"#navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
        <a class="navbar-brand" href="home.php">Ya Boyz Reviews</a>
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="friend_reviews.php">Read Friend Reviews</a></li>
                <li><a href="recommend.php">Recommend To Friends</a></li>
                <li><a href="public_reviews.php">Read Public Reviews</a></li>
            </ul>
            <?php
                session_start();
                if(isset($_SESSION['authenticated_user'])) {
                    echo '<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signout.php">Sign Out</a></button>';
                }
                else {
                    echo '<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signin.php">Sign In</a></button>';
                    echo '<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signup.php">Sign Up</a></button>';
                }
            ?>
        </div>
    </div>
</nav>
