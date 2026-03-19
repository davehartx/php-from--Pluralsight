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

    <div id="registration-form" class="ms-3 me-3 mt-4">
        <?php   //  so this will check if vales are set , and reurn if they ALL are
            $name = '';   // set variables to nothing at the start
            $password = '';
            $role = '';
            $color = '';
            $languages = [];
            $comments = '';
            $tc = '';   // end of  ..set variables to nothing at the start

            if (isset($_POST['submit'])) {   // so run through all and goes false if any a still unset 
                $ok = true;

                if (!isset($_POST['name']) || $_POST['name'] === '') {  // !isset  ( is not isset ) || ===  is blank ?  then falses
                    $ok = false;
                } else {
                    $name = $_POST['name'];           //  otherwise   $_POST['name'  set  $name , for later
                };
                if (!isset($_POST['password']) || $_POST['password'] === '') { //same  as 40
                    $ok = false;
                } else {
                    $password = $_POST['password'];
                };
                if (!isset($_POST['role']) || $_POST['role'] === '') {  //same  as 40
                    $ok = false;
                } else {
                    $role = $_POST['role'];
                };
                if (!isset($_POST['color']) || $_POST['color'] === '') { //same  as 40
                    $ok = false;
                } else {
                    $color = $_POST['color'];
                };
                if (!isset($_POST['languages']) || !is_array($_POST['languages']) ||  // !isset , not set and not is_array or counts in array is 0
                    count($_POST['languages']) === 0) {
                    $ok = false;
                } else {
                    $languages = $_POST['languages'];
                }
                if (!isset($_POST['comments']) || $_POST['comments'] === '') {
                    $ok = false;
                } else {
                    $comments = $_POST['comments'];
                };
                if (!isset($_POST['tc']) || $_POST['tc'] === '') {
                    $ok = false;
                } else {
                    $tc = $_POST['tc'];
                };
// so if the is true  then  ..
 
                if ($ok) {
                    printf('<p>User name: %s  /* the values from line 88 are strings each added here */ 
                    <br>Password: %s
                    <br>Role: %s
                    <br>Color: %s
                    <br>Language(s): %s
                    <br>Comments: %s
                    <br>T&amp;C: %s</p>',
                    htmlspecialchars($name),
                    htmlspecialchars($password),
                    htmlspecialchars($role),
                    htmlspecialchars($color),
                    htmlspecialchars(implode(' ', $languages)),/*  this is a arrange and  just $languages barfs   */
                    htmlspecialchars($comments),/* */
                    htmlspecialchars($tc)
                    );
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
            <div class="mb-3">
                Languages spoken:
                <select name="languages[]" multiple size="3" class="form-select">
                    <option value="en"<?php
                        if (in_array('en', $languages)) {
                            echo ' selected';
                        }
                    ?>>English</option>
                    <option value="fr"<?php
                        if (in_array('fr', $languages)) {
                            echo ' selected';
                        }
                    ?>>French</option>
                    <option value="it"<?php
                        if (in_array('it', $languages)) {
                            echo ' selected';
                        }
                    ?>>Italian</option>
                </select>
            </div>
            <div class="mb-3">
                Comments: <textarea name="comments" class="form-control"><?=htmlspecialchars($comments)?></textarea>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="tc" value="ok" class="form-check-input"<?php 
                    if ($tc === 'ok') {
                        echo ' checked';
                    }
                ?>>
                I accept the T&amp;C
            </div>
            <div class="mb-5">
                <input type="submit" name="submit" value="Register">
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