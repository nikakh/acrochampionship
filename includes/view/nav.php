<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?= bsc :: get_bsc('web_site_name')?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><form method="POST" action=""><input type="submit" value="Logout" name="logout"></form></li>
      <li><form method="POST" action=""><input type="submit" value="Login" name="login_url"></form></li>
    </ul>
  </div>
</nav>
