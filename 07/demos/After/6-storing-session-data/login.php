<?php
  session_start();

  readfile('header.tmpl.html');

  require_once 'config.inc.php';

  $message = '';

  if (isset($_POST['name']) && isset($_POST['password'])) {
    $db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = sprintf("SELECT * FROM users WHERE name='%s'",
                   mysqli_real_escape_string($db, $_POST['name']));
    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_assoc($result);

    if ($row !== null) {
      $hash = $row['hash'];
      if (password_verify($_POST['password'], $hash)) {
        $message = 'Login successful.';

        $_SESSION['username'] = $row['name'];
        $_SESSION['isAdmin'] = $row['isAdmin'];
      } else {
        $message = 'Login failed.';
      }
    } else {
      $message = 'Login failed.';
    }

    mysqli_close($db);
  }

  echo "<div class='text-info mt-5'>$message</div>";
?>
<form method="post" action="" class="mt-5">
  <div class="form-group">
    <label for="name">User name</label> <input type="text" class="form-control" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="password">Password</label> <input type="password" class="form-control" name="password" id="password"><br>
  </div>
  <input type="submit" value="Login" class="btn btn-primary">
</form>
</div>
</div>
<?php
  readfile('footer.tmpl.html');
?>