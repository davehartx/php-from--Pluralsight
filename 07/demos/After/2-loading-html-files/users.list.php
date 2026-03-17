<?php
    readfile('header.tmpl.html');
?>

    <div id="users-list" class="ms-3 me-3 mt-4">
        <h1 class="mt-4">Users</h1>
        <ul>
        <?php
            require_once 'config.inc.php';

            $db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
            $sql = 'SELECT * FROM users';
            $result = mysqli_query($db, $sql);

            foreach ($result as $row) {
                printf(
                    '<li style="color: %s">%s (%s)
                        <a href="users.update.php?id=%d">update</a>
                        <a href="users.delete.php?id=%d">delete</a>
                    </li>',
                    htmlspecialchars($row['color']),
                    htmlspecialchars($row['name']),
                    htmlspecialchars($row['role']),
                    $row['id'],
                    $row['id']
                );
            }

            mysqli_close($db);
        ?>
        </ul>
    </div>

<?php
    readfile('footer.tmpl.html');
?>
