<?php
    readfile('header.tmpl.html');
?>

    <div id="registration-form" class="ms-3 me-3 mt-4">
        <?php
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
                    require_once 'config.inc.php';

                    $hash = password_hash($password, PASSWORD_DEFAULT);

                    $db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
                    $sql = sprintf(
                        "INSERT INTO users (name, role, color, hash) VALUES ('%s', '%s', '%s', '%s')",
                        mysqli_real_escape_string($db, $name),
                        mysqli_real_escape_string($db, $role),
                        mysqli_real_escape_string($db, $color),
                        mysqli_real_escape_string($db, $hash)
                    );
                    mysqli_query($db, $sql);
                    echo '<p>Registration successful.</p>';
                    mysqli_close($db);
                } else {
                    echo '<p>Validation failed.</p>';
                }

            }
        ?>
        <h1 class="mt-4">Registration</h1>
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
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>

<?php
    readfile('footer.tmpl.html');
?>
