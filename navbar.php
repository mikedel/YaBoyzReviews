<nav class="navbar navbar-inverse" id="ya-boys-navbar">
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
                <li><a href="public_reviews.php">Public Reviews</a></li>
                <li><a href="friend_reviews.php">Personal Recommendations</a></li>
                <li><a href="user_watchlist.php">Watchlist</a></li>
                <li><a href="recommend.php">Make Review</a></li>
                <li><a href="myboys.php">Ya Boyz</a></li>
            </ul>
            <?php
                if(isset($_SESSION['authenticated_user'])) {
                    require_once 'user.php';
                    $auth_user = $_SESSION['authenticated_user'];
                    $nav_user = new User();
                    $user_name = $nav_user->getFullNameById($auth_user);
                    echo '<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signout.php">Sign Out</a></button>';
                    echo '<p class="navbar-text navbar-right" style="margin-right:10px;">' . $user_name . '</p>';
                }
                else {
                    echo '<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signin.php">Sign In</a></button>';
                    echo '<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signup.php">Sign Up</a></button>';
                }
            ?>
        </div>
    </div>
</nav>
<div id="ankle_container">
<a href="recommend.php"><span data-toggle="tooltip" title="Recommend Now!" id="ankle_icon" class="glyphicon glyphicon-film"></span></a>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
