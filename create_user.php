<!DOCTYPE html>
<html>

<head>
    <title>Create User</title>
    <?php include_once 'header.php'; ?>
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?>
    </section>
<?php
require_once 'user.php';
// $email = $_POST['email'];
// $pass = $_POST['password'];
// echo $email;
// echo $pass;
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = hash("sha256", $_POST['password']);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $newUser = new User();
    $checkUser = $newUser->checkEmailTaken($email);
    if($checkUser){
        $new_user = $newUser->storeUser($first_name, $last_name, $email, $password)
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
        ?>
        <div class="container">
            <div class="jumbotron">
                <span>User already exists!</span>
                <span>Click <a href="signin.php">here to log in</span>
            </div>
        </div>
        <?php
    }
}
?>
</body>
</html>
