<?php require_once("../../../private/initialize.php"); ?>

<?php 
require_login();
if(is_post_request()){
    //Handle form values sent by new.php
    
    $subject = [];
    $subject["menu_name"] = $_POST['menu_name'] ?? "";
    $subject["position"] = $_POST['position'] ?? "";
    $subject["visible"] = $_POST['visible'] ?? "";

    $result = insert_subject($subject);
    if($result === true){
        $new_id = mysqli_insert_id($db);
        $_SESSION["message"] = "The subject was created correctly.";
        redirect_to(url_for("/staff/subjects/show.php?id=" . $new_id));
    }else{
        $errors = $result;
    }
    
}else{
    
}

$subjects_set = find_all_subjects();
$subject_count = mysqli_num_rows($subjects_set) + 1;
mysqli_free_result($subjects_set);

$subject = [];
$subject["position"] = $subject_count;

?>

<?php $page_title="New Subjet" ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">

    <a href="<?php echo url_for("/staff/subjects/index.php"); ?>">Back to List</a>

    <div class="subject new">
        <h1>Create Subject</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for("/staff/subjects/new.php"); ?>" method="post">
            <div class="mb-3">
                <label class="form-label" for="menu_name">Menu Name</label>
                <input class="form-control" type="text" name="menu_name" id="menu_name">
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
                <input type="checkbox" name="visible" value="1">
            </div>
            <div id="operations">
                <input type="submit" value="Create Subject">
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . "/staff_footer.php"); ?>