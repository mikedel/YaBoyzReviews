<!DOCTYPE html>
<html>

<head>
    <title>My Posts</title>
    <?php include_once 'header.php'; ?>
</head>

<body>
    <section id="head-bar">
        <?php include_once 'navbar.php'; ?>
    </section>

    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Sign In</h2>
                    <form action="authentication.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email-input" placeholder="Email" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password-input" placeholder="***********" name="password" />
                        </div>
                        <div class="form-group" style="text-align: center;">
                            <input type="submit" class="btn btn-success" value="Login" >
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
