<?php require_once("../private/initialize.php"); ?>

<?php

if(isset($_GET["id"])){
    $product_id = $_GET["id"];
    $product = find_product_by_id($product_id, ["visible" => true]);

    if(!$product){
        redirect_to(url_for("/index.php"));
    }
} else {
    //Nothing selected yet, show homepage
}

include(SHARED_PATH . "/public_header.php");
include(SHARED_PATH . "/public_navigation.php");

?>


<div id="main">
    <?php 
    
    if(isset($product)){
        $allowed_tags = "<div><img><h1><h2><h3><h4><h5><p><br><ul><li><strong>";
        ?>
        <div class="container pt-5">
            <div class="row">
                <div class="col-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <img src="images/placeholder.png" class="card-img-top" alt="...">
                        </div>
                        <div class="col-6">
                            <img src="images/placeholder.png" class="card-img-top" alt="...">
                        </div>
                        <div class="col-6">
                            <img src="images/placeholder.png" class="card-img-top" alt="...">
                        </div>
                        <div class="col-6">
                            <img src="images/placeholder.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h1><?php echo strip_tags($product["menu_name"], $allowed_tags); ?></h1>
                    <p><?php echo strip_tags($product["content"], $allowed_tags); ?></p>
                    <input class="btn btn-primary" type="button" value="Add To Cart">
                </div>
            </div>
        </div>
        <?php

    } else {
        redirect_to(url_for("/index.php"));
    }

    ?>

</div>



<?php include_once(SHARED_PATH . "/public_footer.php"); ?>