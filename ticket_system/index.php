<?php

// Seite ermitteln, die angezeigt werden soll
$currentPage = $_GET['page'] ?? 'index';

$pageTemplate = 'templates/' . $currentPage . '.phtml';

if (!file_exists($pageTemplate)) {
    throw new RuntimeException('Template-Datei nicht gefunden: ' . $pageTemplate);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ticket-System</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css.map" rel="stylesheet">
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/twbs/bootstrap/js/dist/dropdown.js"></script>

</head>

<body>

<nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
    <a class="navbar-brand" href="#">Ticket-System</a>
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">&raquo; <u>Tickets</u> <span class="sr-only">(current)</span></a>
        </li>
    </ul>
</nav>
<br /><br /><br />
<div class="container">
    <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
    <div class="starter-template">
        <h1>Tickets:</h1>
        <?php
            require_once $pageTemplate;
        ?>
    </div>

</div><!-- /.container -->

</body>
</html>