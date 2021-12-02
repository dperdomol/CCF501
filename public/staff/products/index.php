<?php require_once("../../../private/initialize.php"); ?>

<?php
    require_login();
    $products_set = find_all_products();

?>

<?php $page_title = "Products" ?>
<?php include( SHARED_PATH . "/staff_header.php") ?>

<div id="content">
    <h6>products - product</h6>

    <div class="actions">
        <a class="action" href="<?php echo url_for("/staff/products/new.php"); ?>">Create New Product</a>
    </div>

    <table class="table table-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php while($product = mysqli_fetch_assoc($products_set)) { ?>
            <?php $subject = find_subject_by_id($product["subject_id"]); ?>
            <tr>
                <td><?php echo h($product["id"]); ?></td>
                <td><?php echo h($subject["menu_name"]); ?></td>
                <td><?php echo h($product["position"]); ?></td>
                <td><?php echo $product["visible"] == 1 ? 'true' : 'false'; ?></td>
                <td><?php echo h($product["menu_name"]); ?></td>
                <td><a class="action" href="<?php echo url_for('/staff/products/show.php?id=' . h(u($product['id']))); ?>">View</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/products/edit.php?id=' . h(u($product['id']))); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/products/delete.php?id=' . h(u($product['id']))) ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php mysqli_free_result($products_set); ?>
</div>

<?php include( SHARED_PATH . "/staff_footer.php") ?>