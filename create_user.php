<!DOCTYPE html>
<html>

<head>
    <title>Create User</title>
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
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $newUser = new User();
    $checkUser = $newUser->checkEmailTaken($email);
    echo $checkUser;
    if($checkUser){
        echo $first_name;
        echo "\n";
        echo $last_name;
        echo "\n";
        echo $email;
        echo "\n";
        echo $password;
        echo "\n";
        $newUser->storeUser($first_name,$last_name,$email,$password);
        echo "User created";
?>

    <div class="container">
        <div class="jumbotron">
            <span>User Created!</span>
            <span>Click <a href="signin.php">here to log in</span>

        </div>
    </div>
    <?php
    }
    else{
        echo "User already exists";
    }

}
?>
</body>
</html>
