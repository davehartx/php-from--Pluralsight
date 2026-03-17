<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Globoticket</title>
</head>

<body>

    <div id="navigation">
        <nav class="navbar navbar-expand navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto ms-3 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="./phpinfo.php" class="navbar-brand"><img src="img/logo.png" alt="Globoticket logo" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div id="update-form" class="ms-3 me-3 mt-4">
        <?php
            //users.update.php?id=2
            if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                header('Location: users.list.php');
            }

            require_once 'config.inc.php';

            $name = '';
            $password = '';
            $role = '';
            $color = '';

            if (isset($_POST['submit'])) {
                $ok = true;

                if (!isset($_POST['name']) || $_POST['name'] === '') {
                    $ok = false;
                } else {
                    $name = $_POST['name'];
                };
                if (!isset($_POST['password']) || $_POST['password'] === '') {
                    $ok = false;
                } else {
                    $password = $_POST['password'];
                };
                if (!isset($_POST['role']) || $_POST['role'] === '') {
                    $ok = false;
                } else {
                    $role = $_POST['role'];
                };
                if (!isset($_POST['color']) || $_POST['color'] === '') {
                    $ok = false;
                } else {
                    $color = $_POST['color'];
                };

                if ($ok) {
                    $db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
                    $sql = sprintf(
                        "UPDATE users SET name='%s', role='%s', color='%s' WHERE id=%d",
                        mysqli_real_escape_string($db, $name),
                        mysqli_real_escape_string($db, $role),
                        mysqli_real_escape_string($db, $color),
                        $id
                    );
                    mysqli_query($db, $sql);
                    echo '<p>Update successful.</p>';
                    mysqli_close($db);
                } else {
                    echo '<p>Validation failed.</p>';
                }

            } else {
                $db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
                $sql = "SELECT * FROM users WHERE id=$id";
                $result = mysqli_query($db, $sql);
                foreach ($result as $row) {
                    $name = $row['name'];
                    $role = $row['role'];
                    $color = $row['color'];
                }
                mysqli_close($db);
            }
        ?>
        <h1 class="mt-4">User Update</h1>
        <form action="" method="post">
            <div class="mb-3">
                User name: <input type="text" name="name" class="form-control"
                                 value="<?=htmlspecialchars($name)?>">
            </div>
            <div class="mb-3">
                Password: <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                Role:
                <input type="radio" name="role" value="b" class="form-check-input"<?php 
                    if ($role === 'b') {
                        echo ' checked';
                    }
                ?>> buyer
                <input type="radio" name="role" value="s" class="form-check-input"<?php 
                    if ($role === 's') {
                        echo ' checked';
                    }
                ?>> seller
            </div>
            <div class="mb-3">
                Favorite color:
                <select name="color" class="form-select">
                    <option value="">Please select</option>
                    <option value="#f00"<?php
                        if ($color === '#f00') {
                            echo ' selected';
                        }
                    ?>>red</option>
                    <option value="#0f0"<?php
                        if ($color === '#0f0') {
                            echo ' selected';
                        }
                    ?>>green</option>
                    <option value="#00f"<?php
                        if ($color === '#00f') {
                            echo ' selected';
                        }
                    ?>>blue</option>
                </select>
            </div>
            <div class="mb-5">
                <input type="submit" name="submit" value="Update">
            </div>
        </form>
    </div>

    <footer class="bg-dark fixed-bottom">
        <div class="text-center text-white font-xxlarge">
            &copy; <span id="copyright-year"></span> Globoticket
        </div>
    </footer>
</body>

</html>