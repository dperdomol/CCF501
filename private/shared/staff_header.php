<?php
    if(!isset($page_title)){ $page_title = "Website"; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InventArt <?php echo h($page_title); ?></title>

    <!--Boosttrap Bundle-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <h1 class="navbar-brand">InventArt Staff Area</h1>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url_for('/staff/index.php'); ?>">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url_for('/staff/logout.php'); ?>">Logout</a>
                    </li>
                </ul>
                <div class="float-end mr-3">
                    <h5><?php echo $_SESSION["username"] ?? ""; ?></h5>
                </div>
            </div>
        </nav>
        <?php echo display_session_message(); ?>