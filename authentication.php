<!DOCTYPE html>
<html>

<head>
    <title>Authentication</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css">
</head>

<body>
    <section id="head-bar">
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
                        <button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signin.php">Sign In</a></button>
                        <button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signup.php">Sign Up</a></button>
                    </div>
                </div>
            </nav>
    </section>
<?php
require_once 'user.php';
// $email = $_POST['email'];
// $pass = $_POST['password'];
// echo $email;
// echo $pass;
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $email;
    echo "<br />";
    echo $password;
    $authUser = new User();
    $checkUser = $authUser->checkLoginCredentials($email, $password);
    echo "<br />";
    echo "Check user:<br />";
    echo $checkUser;
    echo "<br />";
    if($checkUser){
        $first_name = $authUser->getFirstNameByEmail($email);
        $last_name = $authUser->getLastNameByEmail($email);
        session_start();
        $_SESSION['authenticated_user'] = $authUser->getIdByEmail($email);
        echo $_SESSION['authenticated_user'];
?>

    <div class="container">
        <div class="jumbotron">
            <span>Welcome <?php echo $first_name; ?>!</span>
        </div>
    </div>
    <?php
    }
    else{
        echo "User not found with these credentials";
    }

}
?>
</body>
</html>
