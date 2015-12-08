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
