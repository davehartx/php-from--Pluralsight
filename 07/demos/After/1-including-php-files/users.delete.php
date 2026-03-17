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
                            <a href="phpinfo.php" class="navbar-brand"><img src="img/logo.png" alt="Globoticket logo" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div id="delete-panel" class="ms-3 me-3 mt-4">
        <h1 class="mt-4">Delete</h1>
        <?php
            //users.delete.php?id=2
            if (isset($_GET['id'])&& ctype_digit($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                header('Location: users.list.php');
            }

            require_once 'config.inc.php';
            $db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
            $sql = "DELETE FROM users WHERE id=$id";
            mysqli_query($db, $sql);
            echo '<p>User deleted.</p>';
            mysqli_close($db);
        ?>
    </div>
    <footer class="bg-dark fixed-bottom">
        <div class="text-center text-white font-xxlarge">
            &copy; <span id="copyright-year"></span> Globoticket
        </div>
    </footer>
</body>

</html>