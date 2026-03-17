<?php
    require_once 'auth.inc.php';

    readfile('header.tmpl.html');
?>

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

<?php
    readfile('footer.tmpl.html');
?>
