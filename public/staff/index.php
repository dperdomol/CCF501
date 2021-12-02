<?php require_once("../../private/initialize.php"); 

require_login();
?>

<?php $page_title = "Staff"; ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">
    <div>
        <h5>Main Menu</h5>
        <ul>
            <li>
                <a href="<?php echo url_for('/staff/subjects/index.php') ?> ">Subjects</a>
            </li>
            <li>
                <a href="<?php echo url_for('/staff/products/index.php') ?> ">Products</a>
            </li>
        </ul>
    </div>
    <div>
        <h6>Staff - Page</h6>
    </div>
</div>

<?php include(SHARED_PATH . "/staff_footer.php"); ?>
    
