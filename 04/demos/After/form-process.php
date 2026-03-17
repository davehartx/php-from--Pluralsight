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
        <?php
            $name = '';
            $password = '';
            $role = '';
            $color = '';
            $languages = [];
            $comments = '';
            $tc = '';

            if (isset($_POST['submit'])) {
                if (isset($_POST['name'])) {
                    $name = $_POST['name'];
                };
                if (isset($_POST['password'])) {
                    $password = $_POST['password'];
                };
                if (isset($_POST['role'])) {
                    $role = $_POST['role'];
                };
                if (isset($_POST['color'])) {
                    $color = $_POST['color'];
                };
                if (isset($_POST['languages'])) {
                    $languages = $_POST['languages'];
                };
                if (isset($_POST['comments'])) {
                    $comments = $_POST['comments'];
                };
                if (isset($_POST['tc'])) {
                    $tc = $_POST['tc'];
                };

                printf('<p>User name: %s
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
                htmlspecialchars(implode(' ', $languages)),
                htmlspecialchars($comments),
                htmlspecialchars($tc)
                );

            }
        ?>
        <h1 class="mt-4">Registration</h1>
        <form action="" method="post">
            <div class="mb-3">
                User name: <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                Password: <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                Role:
                <input type="radio" name="role" value="b" class="form-check-input"> buyer
                <input type="radio" name="role" value="s" class="form-check-input"> seller
            </div>
            <div class="mb-3">
                Favorite color:
                <select name="color" class="form-select">
                    <option value="">Please select</option>
                    <option value="#f00">red</option>
                    <option value="#0f0">green</option>
                    <option value="#00f">blue</option>
                </select>
            </div>
            <div class="mb-3">
                Languages spoken:
                <select name="languages[]" multiple size="3" class="form-select">
                    <option value="en">English</option>
                    <option value="fr">French</option>
                    <option value="it">Italian</option>
                </select>
            </div>
            <div class="mb-3">
                Comments: <textarea name="comments" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="tc" value="ok" class="form-check-input">
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