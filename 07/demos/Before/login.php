<?php
  readfile('header.tmpl.html');

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