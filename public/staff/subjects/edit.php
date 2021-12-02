<?php require_once("../../../private/initialize.php"); ?>

<?php
    require_login();
if(!isset($_GET["id"])){
    redirect_to(url_for("/staff/subjects/index.php"));
}

$id = $_GET["id"];

if(is_post_request()){
    //Handle form values sent by new.php

    $subject = [];
    $subject["id"] = $id;
    $subject["menu_name"] = $_POST['menu_name'] ?? "";
    $subject["position"] = $_POST['position'] ?? "";
    $subject["visible"] = $_POST['visible'] ?? "";

    $result = update_subject($subject);
    if($result === true){
        $_SESSION["message"] = "The subject was updated correctly.";
        redirect_to(url_for("/staff/subjects/show.php?id=" . $id));
    }else{
        $errors = $result;
        //var_dump($errors);

    }

}else{

    $subject = find_subject_by_id($id);
    
}

$subjects_set = find_all_subjects();
$subject_count = mysqli_num_rows($subjects_set);
mysqli_free_result($subjects_set);


?>

<?php $page_title="Edit Subjet" ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">

    <a href="<?php echo url_for("/staff/subjects/index.php"); ?>">Back to List</a>

    <div class="subject edit">
        <h1>Edit Subject</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for("/staff/subjects/edit.php?id=" . h(u($id))); ?>" method="post">
            <div class="mb-3">
                <label class="form-label" for="menu_name">Menu Name</label>
                <input class="form-control" type="text" name="menu_name" id="menu_name" value="<?php echo h($subject["menu_name"]); ?>">
            </div>
            <div class="mb-3">
                <label for="position">Position</label>
                <select name="position" id="position">
                    <?php
                    
                        for ($i=1; $i <= $subject_count ; $i++) { 
                            echo "<option value=\"{$i}\"";
                            if($subject["position"] == $i){
                                echo " selected";
                            }
                            echo ">{$i}</option>";
                        }
                    
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Visible</label>
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" value="1" <?php if($subject["visible"] == "1") {echo " checked";} ?>>
            </div>
            <div id="operations">
                <input type="submit" value="Edit Subject">
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . "/staff_footer.php"); ?>