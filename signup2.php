<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up | GMP</title>
    <!-- Bootstrap css Load -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- End-->
    <link href="http://ksylvest.github.io/jquery-growl/stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />
    <link  rel="stylesheet" href="../css/signin.css">
  </head>
 <body>
  <?php include 'navigation2.php'; ?>
  <div class="container">
    <form method="POST" class="form-signin">
        <h2 class="form-signin-heading">Please sign Up</h2>
        <div class="input-group">
          <label for="inputName" class="sr-only">ID</label>
          <input type="text" id="inputID" class="form-control" placeholder="Create ID" required autofocus>
          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        </div>
        <div class="input-group">
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        </div>
        <div class="checkbox">
          <!--<label>
            <input type="checkbox" value="remember-me"> Remember me
          </label> -->
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="signup();">Sign Up</button>
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
          location.href="main2.php";
      }
      function signup(){
        var user = new Parse.User();
        user.set("username", $("#inputID").val());
        user.set("password", $("#inputPassword").val());
        user.signUp(null, {
          success: function(user) {
            // Hooray! Let them use the app now.
          location.href="main2.php";
          },
          error: function(user, error) {
            // Show the error message somewhere and let the user try again.
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
    <br/>
 </body>
</html>