<!DOCTYPE html>
<html>

<head>
    <?php
        require_once 'user.php';
            session_start();
            // $_SESSION['authenticated_user'] = $authUser->getIdByEmail($email);
            unset($_SESSION['authenticated_user']);
            session_destroy();
    ?>
    <title>Authentication</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css">
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?>
    </section>
    <div class="container">
        <div class="jumbotron">
            <span>You have been signed out!  </span>
        </div>
    </div>
</body>
</html>
