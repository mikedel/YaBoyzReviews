<!DOCTYPE html>
<html>

<head>
    <?php
        require_once 'user.php';
            session_start();
            unset($_SESSION['authenticated_user']);
            session_destroy();
    ?>
    <title>Authentication</title>
    <?php include_once 'header.php'; ?> 
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
