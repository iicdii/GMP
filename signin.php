<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | GMP</title>
    <!-- Bootstrap css Load -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- End-->
    <link href="http://ksylvest.github.io/jquery-growl/stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/signin.css">
  </head>
 <body>   
  <?php include 'navigation.php'; ?>
    <div class="container">
    <form class="form-signin">
     <h2 class="form-signin-heading">Please sign In</h2>
      <div class="input-group">
       <label for="inputName" class="sr-only">ID</label>
       <input type="text" id="myid" class="form-control" placeholder="ID" required autofocus>
      </div>
      <div class="input-group">
       <label for="inputPassword" class="sr-only">Password</label>
       <input type="password" id="mypassword" class="form-control" placeholder="Password" required>
      </div>
       <div class="checkbox">
        <!--<label>
        <input type="checkbox" value="remember-me"> Remember me
        </label> -->
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="button" onclick="signin();">Sign In</button>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) and Bootstrap js load -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//www.parsecdn.com/js/parse-1.3.4.min.js"></script>
    <script src="http://ksylvest.github.io/jquery-growl/javascripts/jquery.growl.js" type="text/javascript"></script>
    <script>
    Parse.initialize("ARKNOchu6ZJ851F3ofbuz1HYcAm6KjBZoj5D5wUo", "A0hhrBYZA4SGFus82faRzlkEjMZqMqmK1qHmqRR0");
    var currentUser = Parse.User.current();
    if (currentUser) {
        // do stuff with the user
        location.href="manage.php";
    }
    function signin(){
      Parse.User.logIn($("#myid").val(), $("#mypassword").val(), {
      success: function(user) {
        // Do stuff after successful login.
        location.href="manage.php";
      },
      error: function(user, error) {
        // The login failed. Check error to see why.
        var errorMessage = 'Error: ' + error.code + ' ' + error.message;
        $.growl.warning({
          message: errorMessage
        });
      }
    });
    }
    </script>
    <!-- End -->
    </form>
    </div>
  </body>
</html>