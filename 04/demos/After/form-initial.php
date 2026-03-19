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

    <div id="registration-form" class="ms-3 me-3"> 
        <h1 class="mt-4">Registration</h1>
        <form action="" method="post">    <!--the "" bit returns same page.Method , how to send? Usually  post  (part of the BODY of the http request Uses  $_POST array) or get ( for retriving info and appended to url, limited  tho Uses  $_GET array )     -->
<!--   https://html.spec.whatwg.org/#states-of-the-type-attribute      list the different types of imput ,  -->
            <div class="mb-3">
                User name: <input type="text" name="name" class="form-control">  <!--  takes  user name   , as type  text    -->
            </div>
            <div class="mb-3"> 
                Password: <input type="password" name="password" class="form-control"> <!--  takes  user name   , as type  passwd    -->
            </div>
            <div class="mb-3">
                Role:
                <input type="radio" name="role" value="b" class="form-check-input"> buyer <!--  takes  role by radio input type   value b    -->
                <input type="radio" name="role" value="s" class="form-check-input"> seller <!--  takes  role by radio input typetype   value s   -->
            </div><!--  to the name part will return whichever  value is box is selected -->
            <div class="mb-3">
                Favorite color:
                <select name="color" class="form-select">
                    <option value="">Please select</option>
                    <option value="#f00">red</option>
                    <option value="#0f0">green</option>
                    <option value="#00f">blue</option> <!-- options here mean only 1 can be selected and color is retruned   -->
            </div>
            <div class="mb-3">
                Languages spoken:
                <select multiple name="languages[]"  size="3" class="form-select"><!--   is the array ( multiple values), name needs to be [],  called back with $_POST['languages']  in this example -->
                    <option value="en">English</option>
                    <option value="fr">French</option>
                    <option value="it">Italian</option> <!-- options here means multiple  selections are retruned   -->
                </select>
            </div>
            <div class="mb-3">
                Comments: <textarea name="comments" class="form-control"></textarea><!--textarea allows for multiple line as return comment value -->
            </div>
            <div class="mb-3">
                <input type="checkbox" name="tc" value="ok" class="form-check-input"> <!--  for checkbox tc set to ok  .. if selected  -->
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