<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo url_for("/index.php"); ?>">
                <img src="<?php echo url_for("/images/logo_inventart.png"); ?>" alt="Logo InventArt">
            </a>
            <?php $nav_subjects = find_all_subjects(); ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php while($nav_subject = mysqli_fetch_assoc($nav_subjects)) {?>
                <?php if(!$nav_subject["visible"]){ continue;} ?>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="<?php echo url_for("index.php?id=" . h(u($nav_subject['id']))); ?>">
                        <?php echo h($nav_subject["menu_name"]); ?>
                    </a>
                </li>
                <?php } //Close the while ?>
            </ul>
            <?php mysqli_free_result($nav_subjects); ?>
        </div>
    </nav>
</header>

