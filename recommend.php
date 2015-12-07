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
            <h2>Recommend to Friends</h2>
            <form>
                <div class="form-group">
                    <label for="username">Friend's Username</label>
                    <input type="text" class="form-control" id="username-input" placeholder="Username of friend" />
                </div>
                <div class="form-group">
                    <label for="mediaType">Media Type</label>
                    <select class="form-control">
                        <option value>Select Media Type </option>
                        <option>Movie</option>
                        <option>TV Series</option>
                        <option>Documentary</option>
                        <option>Sporting Event</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mediaName">Name of media</label>
                    <input type="text" class="form-control" id="username-input" placeholder="Name of Media" />
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" value="op1">1
                    </label>  
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" value="op2">2
                    </label>            
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" value="op3">3
                    </label>            
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" value="op4">4
                    </label>            
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" value="op5">5
                    </label>                              
                </div>

                <div class="form-group">
                    <label for="comment">Comment(Optional)</label>
                    <textarea class="form-control" rows="5" name="comment"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Send" >
                </div>
            </form>
        </div>
    </div>
</body>
</html>
