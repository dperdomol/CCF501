<?php require_once("../../../private/initialize.php"); ?>

<?php
    require_login();
if(!isset($_GET["id"])){
    redirect_to("/staff/products/index.php");
}

$id = $_GET["id"];

if(is_post_request()){
    //Handle form values sent by new.php
    
    $product = [];
    $product["id"] = $id;
    $product["subject_id"] = $_POST['subject_id'] ?? "";
    $product["menu_name"] = $_POST['menu_name'] ?? "";
    $product["position"] = $_POST['position'] ?? "";
    $product["visible"] = $_POST['visible'] ?? "";
    $product["content"] = $_POST['content'] ?? "";
    
    $result = update_product($product);
    if($result === true){
        $_SESSION["message"] = "The product was updated correctly.";
        redirect_to(url_for("/staff/products/show.php?id=" . $id));
    }else{
        $errors = $result;
    }
}else{
    $product = find_product_by_id($id);    
}

$product_set = find_all_products();
$product_count = mysqli_num_rows($product_set);
mysqli_free_result($product_set);

?>

<?php $page_title="Edit product" ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<div id="content">

    <a href="<?php echo url_for("/staff/products/index.php"); ?>">Back to List</a>

    <div class="subject new">
        <h1>Edit product</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for("/staff/products/edit.php?id=" . h(u($id))); ?>" method="post">
            <div class="mb-3">
                <label class="form-label" for="menu_name">Product Name</label>
                <input class="form-control" type="text" name="menu_name" id="menu_name" value="<?php echo h($product['menu_name']) ?>">
            </div>
            <div class="mb-3">
                <h6>Subject</h6>
                <select name="subject_id">
                    <?php
                    
                        $subject_set = find_all_subjects();
                        while($subject = mysqli_fetch_assoc($subject_set)){

                            echo "<option value=\"" . h($subject["id"]) . "\"";
                            if($product["subject_id"] == $subject["id"]){
                                echo " selected";
                            }
                            echo ">" . h($subject["menu_name"]) . "</option>";

                        }
                        mysqli_free_result($subject_set);

                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="position">Position</label>
                <select name="position" id="position">
                <?php
                    
                    for ($i=1; $i <= $product_count ; $i++) { 
                        echo "<option value=\"{$i}\"";
                        if($product["position"] == $i){
                            echo " selected";
                        }
                        echo ">{$i}</option>";
                    }
                
                ?>
                </select>
            </div>
            <div class="mb-3">
                
            </div>
            <div class="mb-3">
                <label class="form-label" for="">Visible</label>
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" value="1" <?php if($product["visible"] == "1"){ echo " checked"; } ?>>
            </div>
            <div class="mb-3">
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Make a description of the product"><?php echo h($product['content']); ?></textarea>
            </div>
            <div id="operations">
                <input type="submit" value="Edit product">
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . "/staff_footer.php"); ?>