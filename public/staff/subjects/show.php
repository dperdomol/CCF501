<?php require_once("../../../private/initialize.php"); ?>

<?php

    require_login();
    //$id = isset($_GET['id']) ? $_GET['id'] : '1';
    $id = $_GET['id'] ?? '1'; //PHP > 7.0

    $subject = find_subject_by_id($id);

?>

<?php $page_title = "Show Subject"; ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">

    <a href="<?php echo url_for("/staff/subjects/index.php"); ?>">Back to List</a>

    <div class="container">
        <h1>Subject: <?php echo h($subject["menu_name"]); ?></h1>

        <div class="attributes">
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($subject["position"]); ?></dd>
                <dt>Visible</dt>
                <dd><?php echo $subject["visible"] == "1" ? "true" : "false"; ?></dd>
            </dl>
        </div>
    </div>

</div>


<?php include(SHARED_PATH . "/staff_footer.php"); ?>