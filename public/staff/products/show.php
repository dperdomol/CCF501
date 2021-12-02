<?php require_once("../../../private/initialize.php"); ?>

<?php
    require_login();
    //$id = isset($_GET['id']) ? $_GET['id'] : '1';
    $id = $_GET['id'] ?? '1'; //PHP > 7.0

    $product = find_product_by_id($id);
?>

<?php $page_title = "Show product"; ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">

    <a href="<?php echo url_for("/staff/products/index.php"); ?>">Back to List</a>

    <div class="container">
        <h1>Product: <?php echo h($product["menu_name"]); ?></h1>

        <div class="attributes">
            <?php $subject = find_subject_by_id($product["subject_id"]); ?>
            <dl>
                <dt>Subject</dt>
                <dd><?php echo h($subject["menu_name"]); ?></dd>
                <dt>Position</dt>
                <dd><?php echo h($product["position"]); ?></dd>
                <dt>Visible</dt>
                <dd><?php echo $product["visible"] == "1" ? "true" : "false"; ?></dd>
            </dl>
            <p>
                <?php echo h($product["content"]); ?>
            </p>
        </div>
    </div>

</div>


<?php include(SHARED_PATH . "/staff_footer.php"); ?>