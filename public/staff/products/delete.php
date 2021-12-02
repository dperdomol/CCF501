<?php require_once("../../../private/initialize.php"); ?>

<?php
    require_login();
    if(!isset($_GET["id"])){
        redirect_to(url_for("/staff/pages/index.php"));
    }

    $id = $_GET["id"];

    if(is_post_request()){

        $result = delete_page($id);
        if($result){
            $_SESSION["message"] = "The product was deleted correctly.";
            redirect_to(url_for("/staff/pages/index.php"));
        }

    }else{

        $page = find_page_by_id($id);

    }

?>

<?php include_once( SHARED_PATH . "/staff_header.php" ); ?>

<div id="content">

    <div class="subject edit">
        <h1>Delete Page</h1>

        <p>Are you sure you want to delete this subject?</p>
        <h3><?php echo h($page["menu_name"]); ?></h3>

        <form action="<?php echo url_for("/staff/pages/delete.php?id=" . h(u($id))); ?>" method="post">
            <div id="operations">
                <input type="submit" value="Delete Subject">
            </div>
        </form>
    </div>

</div>

<?php include_once( SHARED_PATH . "/staff_footer.php" ); ?>