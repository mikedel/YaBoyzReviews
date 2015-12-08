<!DOCTYPE html>
<html>

<head>
    <title>Authentication</title>
    <?php include_once 'header.php'; ?>
</head>

<body>
    <section id="head-bar">
        <?php
            require_once 'user.php';
            $login_successful = false;
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $authUser = new User();
                $checkUser = $authUser->checkLoginCredentials($email, $password);
                if($checkUser){
                    $first_name = $authUser->getFirstNameByEmail($email);
                    $last_name = $authUser->getLastNameByEmail($email);
                    $_SESSION['authenticated_user'] = $authUser->getIdByEmail($email);
                    $login_successful = true;
                }
                else{
                    $login_successful = false;
                }
            }
        ?>
        <?php include_once 'navbar.php'; ?>
    </section>


    <div class="container">
        <div class="jumbotron">
        <?php
            if($login_successful) {
                ?>
                <span>Welcome <?php echo $first_name; ?>!</span>
                <?php
            }
            else {
                ?>
                <span>User not found with those credentials.</span>
                <?php
            }
        ?>
        </div>
    </div>
</body>
</html>
