<!DOCTYPE html>
<html>

<head>
    <title>My Posts</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css">
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
                            <label for="email">Username</label>
                            <input type="text" class="form-control" id="email-input" placeholder="Email" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password-input" placeholder="***********" name="password" />
                        </div>
                        <div class="form-group" style="text-align: center;">
                            <input type="submit" class="btn btn-success" value="Login" >
                        </div>
                    </form>
                    <div style="text-align: center;">
                        <h2>Or</h2>
                        <img src="facebook.png" width="50%" />
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
