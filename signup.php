<!DOCTYPE html>
<html>

<head>
    <title>My Posts</title>
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
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <h2>Sign Up</h2>
                <form action="create_user.php" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="email" class="form-control" id="username-input" placeholder="Email Address" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" class="form-control" id="fname-input" placeholder="First Name" name="first_name" />
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" class="form-control" id="lname-input" placeholder="Last Name" name="last_name" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password-input" placeholder="***********" name="password" />
                    </div>
                    <div class="form-group" style="text-align:center;">
                        <input type="submit" class="btn btn-success" name="submit" value="Register" >
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
