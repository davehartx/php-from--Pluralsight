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

    <div id="search-form" class="ms-3 me-3">
        <h1 class="mt-4">Search</h1>
        <?php
            if (isset($_POST['searchterm'])) {  // checks to see if search term exist , , this does nothing other than WEED out SQL injections
                // run search
                echo 'Ha Ha Your search for \'' . htmlspecialchars($_POST['searchterm']) . '\' returned 0 results.'; // htmlspecialchars convert any nasty <br>  styple hyper text to just as it appears .
            }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                Search term: <input type="search" name="searchterm" class="form-control">
            </div>
            <div class="mb-5">
                <input type="submit" name="submit" value="Search">
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