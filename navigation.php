<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/main.php">GMP</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="/manage.php">Manage</a></li>
        <li><a href="/find.php">Find</a></li>
        <li><a href="/contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown" id="userinfo" style="display: none;">
          <a id="drop" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span id="username"></span>&nbsp;
            <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="mygrade.php">My grade</a></li>
            <li role="presentation"><a role="menuitem" id="drop_logout" tabindex="-1" href="#">Logout</a></li>
          </ul>
        </li>
        <form class="navbar-form">
          <a href="/signin.php" id="signin" class="btn btn-default">Sign In</a>
          <a href="/signup.php" id="signup" class="btn btn-info">Sign Up</a>
        </form>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>