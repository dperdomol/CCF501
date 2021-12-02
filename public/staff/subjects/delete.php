<?php require_once("../../../private/initialize.php"); ?>

<?php
    require_login();
if(!isset($_GET["id"])){
    redirect_to(url_for("/staff/subjects/index.php"));
}

$id = $_GET["id"];

if(is_post_request()){

    $result = delete_subject($id);
    $_SESSION["message"] = "The subject was deleted correctly.";
    redirect_to(url_for("/staff/subjects/index.php"));

}else{

    $subject = find_subject_by_id($id);

}

?>

<?php $page_title="Edit Subjet" ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">

    <a href="<?php echo url_for("/staff/subjects/index.php"); ?>">Back to List</a>

    <div class="subject edit">
        <h1>Delete Subject</h1>

        <p>Are you sure you want to delete this subject?</p>
        <h3><?php echo h($subject["menu_name"]); ?></h3>

        <form action="<?php echo url_for("/staff/subjects/delete.php?id=" . h(u($id))); ?>" method="post">
            <div id="operations">
                <input type="submit" value="Delete Subject">
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . "/staff_footer.php"); ?>