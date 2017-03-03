<?php
use classes\PageManager;

require_once 'classes/PageManager.php';

$pageManager = new PageManager();
$pages = $pageManager->getPages();
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 5%">Id</th>
                <th>Name</th>
                <th>Title</th>
                <td style="width: 15%">Optionen</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page) : ?>
            <tr>
                <td><?=$page['id']?></td>
                <td><?=$page['page_name']?></td>
                <td><?=$page['page_title']?></td>
                <td><button>Edit</button><button>Delete</button></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
</html>
